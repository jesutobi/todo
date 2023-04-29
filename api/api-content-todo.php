<?php
// Start the session
session_start();
// connect to database
include('configure/db_connect.php');
//  sql statements

$user_id = $_SESSION['user_id'];
$sql = "SELECT task,task_date,id FROM todolist WHERE user_id = $user_id ORDER BY task_date ";
//  SQL RESULT
$sql_result = mysqli_query($conn, $sql);
// fetch the result as an array
$_SESSION['todo_conv_result'] = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);

// username that uploaded the content

// FREE MEMORY
mysqli_free_result($sql_result);
// close connection
mysqli_close($conn);

?>
