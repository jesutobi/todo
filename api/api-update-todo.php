<?php
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// connect to database
include('../configure/db_connect.php');
include('../api/token/token.php');

$data = json_decode(file_get_contents("php://input"));
// $task = $data->task;
// $descriptions = $data->descriptions;

$todo_id = $data->todoId;


// $user_id = $data_content->userID;
// echo $user_id ;

$header = apache_request_headers();
$token = explode(' ', $header['Authorization']);
$token = $token[1];
$verify_token = get_token($conn, $token);
if ($verify_token && $data->fetchContent == true) {
    // if ($verify_token) {
    // escape special characters
    $todo_details = mysqli_real_escape_string($conn, $todo_id);
    // construct the query
    $sql_todo_details = "SELECT * FROM todolist WHERE id = $todo_details ";
    // get query result
    $sql_todo_details_result = mysqli_query($conn, $sql_todo_details);
    // convert result to array
    $sql_todo_details_array = mysqli_fetch_assoc($sql_todo_details_result);
    // echo $sql_todo_details_array;
    if ($sql_todo_details_result) {
        $response = array(
            'data' => $sql_todo_details_array,
            // 'test' => $task,
            'message' => 'data successfully fetched'
        );
        echo json_encode($response);
    }


    // $task_to_db = mysqli_real_escape_string($conn, $task);
    // $description_to_db = mysqli_real_escape_string($conn, $description);
    // // sql statement
    // $update_save_todo = "UPDATE todolist SET id=$todo_id,task='$task',descriptions='$description' WHERE id=$todo_id ";
    // // go to page
    // $sql_result = mysqli_query($conn, $update_save_todo);
    // if ($sql_result) {
    //     $response = array(
    //         'message' => 'successfully uploaded',
    //         'status' => 200,
    //     );
    //     echo json_encode($response);
    // } else {
    //     echo 'query error:' . mysqli_error($conn);
    // }

    // if ($data_content->userID) {

    //     // save to db

    // }
}

