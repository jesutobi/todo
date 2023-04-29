<?php
// Start the session
session_start();
// connect to database
include('configure/db_connect.php');

// delete to do
if (isset($_GET['id'])) {
    $_SESSION['delete_id'] = $_GET['id'];
    // convert characters to string
    $conv_to_string = mysqli_real_escape_string($conn, $_SESSION['delete_id']);
    // construct the query
    $delete_todo = "DELETE FROM todolist WHERE id = $conv_to_string ";
    // GET THE Query result
    if (mysqli_query($conn, $_SESSION['delete_todo'])) {

        header('Location:index.php');
    } else {
        echo 'query error:' . mysqli_error($conn);
    }
}
