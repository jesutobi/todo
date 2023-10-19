<?php
// connect to database
include('../configure/db_connect.php');
include('../api/token/token.php');

$data_content = json_decode(file_get_contents("php://input"));
$user_id = $data_content->userId;
// echo $user_id ;


$header = apache_request_headers();
$token = explode(' ', $header['Authorization']);
$token = $token[1];
$deleteToken =  remove_token($conn, $token);
// sql statements

if ($deleteToken) {
    // echo $todo_conv_result ;
    $userdata = array(
        'status' => 200,
        // 'token' => $token,
        'message' => 'logged out succesfully',
        // 'data' => $user,
        // 'id' => $user_from_db_id
    );
    echo json_encode($userdata);
}
