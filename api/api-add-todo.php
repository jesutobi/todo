<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// data received from todo form

$data_todo_form = json_decode(file_get_contents("php://input"));

// connect to database
include('../configure/db_connect.php');
include('../api/token/token.php');

$header = apache_request_headers();
$token = explode(' ', $header['Authorization']);
$token = $token[1];
$verify_token = get_token($conn, $token);

// initializing variable
$task = $description = '';
// errors array
$errors = array('task' => '', 'description' => '');

if ($verify_token) {
    if ($data_todo_form->submitTodo) {
        $todo_title = $data_todo_form->title_todo;
        $todo_description = $data_todo_form->description_todo;
        $todo_user_id = $data_todo_form->userID;


        // validation
        if (empty($todo_title)) {
            $errors['task'] = 'Enter the task title';
        }
        if (empty($todo_description)) {
            $errors['description'] = 'Enter the task description';
        }

        // if there is an error in the error array , what to do
        if ($errors['task'] != "" || $errors['description'] != "") {
            $todoError = array(
                'status' => 422,
                'message' => 'submission failed',
                'errors' => $errors,
                'errors1' =>  $todo_user_id
            );
            echo json_encode($todoError);
        } else {

            // // select from token table to get user id
            // $select_user_id = "SELECT * FROM token_table WHERE token = '$token'";
            // // result of selection
            // $result = mysqli_query($conn, $select_user_id);
            // // convert result from database to an array
            // $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // $user_id = $user['user_id'];


            // insert todo in todolist database

            $task_to_db = mysqli_real_escape_string($conn, $todo_title);
            $description_to_db = mysqli_real_escape_string(
                $conn,
                $todo_description
            );

            // sql statement
            $sql_save_todo = "INSERT INTO todolist(user_id,task,descriptions) VALUES('$todo_user_id',' $task_to_db',' $description_to_db') ";
            // go to page
            if (mysqli_query($conn, $sql_save_todo)) {
                $response = array(
                    'message' => 'successfully uploaded',
                    'status' => 200,
                );
                echo json_encode($response);
            } else {
                echo 'query error:' . mysqli_error($conn);
            }
        }
    }
}





// if (isset($_GET['id'])) {
//     // convert characters to string
//     $prefill_to_string = mysqli_real_escape_string($conn, $_GET['id']);
//     // prefill form
//     $prefill_todo_form = "SELECT * FROM todolist WHERE id = $prefill_to_string  ";
//     // get query result
//     $prefill_todo_form_result = mysqli_query($conn, $prefill_todo_form);
//     // convert result to array
//     $prefill_todo_forms_array = mysqli_fetch_assoc($prefill_todo_form_result);
//     $task = $prefill_todo_forms_array['task'];
//     $description = $prefill_todo_forms_array['descriptions'];
//     // construct the query
//     // $update_to_do = "UPDATE todolist SET task, descriptions WHERE id = $Updateconv_to_string ";
//     // GET THE Query result
//     // if (mysqli_query($conn, $update_to_do)) {
//     //     echo 'Update successfully';
//     //     header('Location:index.php');
//     // } else {
//     //     echo 'query error:' . mysqli_error($conn);
//     // }
// }
