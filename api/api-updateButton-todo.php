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
$task = $data->titleValue;
$descriptions = $data->description;

$todo_id = $data->todoId;


// $user_id = $data_content->userID;
// echo $user_id ;

$header = apache_request_headers();
$token = explode(' ', $header['Authorization']);
$token = $token[1];
$verify_token = get_token($conn, $token);
if ($verify_token && $data->updateContent == true) {
    $task_to_db = mysqli_real_escape_string($conn, $task);
    $description_to_db = mysqli_real_escape_string($conn, $descriptions);
    // sql statement
    $update_save_todo = "UPDATE todolist SET id=$todo_id,task='$task',descriptions='$descriptions' WHERE id=$todo_id ";
    // go to page
    $sql_result = mysqli_query($conn, $update_save_todo);
    if ($sql_result) {
        $response = array(
            'message' => 'successfully uploaded',
            'status' => 200,
        );
        echo json_encode($response);
    } else {
        echo 'query error:' . mysqli_error($conn);
    }
    # code...
}
