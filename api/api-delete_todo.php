<?php
// connect to database
include('../configure/db_connect.php');
include('../api/token/token.php');

$data_content = json_decode(file_get_contents("php://input"));
$todo_id = $data_content->todoId;
// echo $user_id ;

$header = apache_request_headers();
$token = explode(' ', $header['Authorization']);
$token = $token[1];
$verify_token = get_token($conn, $token);
// delete to do
if ($verify_token) {
    // escape special characters
    $todo_details = mysqli_real_escape_string($conn, $todo_id);

    // construct the query
    $delete_todo = "DELETE FROM todolist WHERE id = $todo_details ";
    // get query result
    $sql_todo_delete_result = mysqli_query($conn, $delete_todo);
    // convert result to array
    // $sql_todo_details_array = mysqli_fetch_assoc($sql_todo_details_result);
    // echo $sql_todo_details_array;
    if ($sql_todo_delete_result) {
        $response = array(
            // 'data' => $sql_todo_details_array,
            'message' => 'deleted successfully '
        );
        echo json_encode($response);
    }
}
