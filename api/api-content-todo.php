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
$verify_token = get_token($conn, $token);
//  sql statements

if ($verify_token) {
    $sql = "SELECT task,task_date,id FROM todolist WHERE user_id = $user_id ORDER BY task_date ";
    //  SQL RESULT
    $sql_result = mysqli_query($conn, $sql);
    // fetch the result as an array
    $todo_conv_result = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
    // echo $todo_conv_result ;
    if ($sql_result) {
        $response = array(
            'data' => $todo_conv_result,
            'message' => 'data successfully fetched'
        );
        echo json_encode($response);
    }
}





// username that uploaded the content

// // FREE MEMORY
// mysqli_free_result($sql_result);
// // close connection
// mysqli_close($conn);
