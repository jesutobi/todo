<?php
session_start();
// connect to database

include('configure/db_connect.php');
if (isset($_GET['id'])) {
    // escape special characters
    $todo_details = mysqli_real_escape_string($conn, $_GET['id']);
    // construct the query
    $sql_todo_details = "SELECT * FROM todolist WHERE id = $todo_details ";
    // get query result
    $sql_todo_details_result = mysqli_query($conn, $sql_todo_details);
    // convert result to array
    $sql_todo_details_array = mysqli_fetch_assoc($sql_todo_details_result);
   if(isset($sql_todo_details_array)){
    $_SESSION['todo_array'] =  $sql_todo_details_array ;
   }
} 
?>