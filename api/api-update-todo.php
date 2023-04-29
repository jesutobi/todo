<?php
session_start();
// connect to database
include('configure/db_connect.php');
$id = $_GET['id'];
if (isset($id)) {
    // convert characters to string
    $prefill_to_string = mysqli_real_escape_string($conn, $id);
    // prefill form
    $prefill_todo_form = "SELECT * FROM todolist WHERE id = $prefill_to_string  ";
    // get query result
    $prefill_todo_form_result = mysqli_query($conn, $prefill_todo_form);
    // convert result to array
    $prefill_todo_forms_array = mysqli_fetch_assoc($prefill_todo_form_result);
    $_SESSION['task'] = $prefill_todo_forms_array['task'];
    $_SESSION['description'] = $prefill_todo_forms_array['descriptions'];
    // construct the query
    // $update_to_do = "UPDATE todolist SET task, descriptions WHERE id = $Updateconv_to_string ";
    // GET THE Query result
    // if (mysqli_query($conn, $update_to_do)) {
    //     echo 'Update successfully';
    //     header('Location:index.php');
    // } else {
    //     echo 'query error:' . mysqli_error($conn);
    // }
}

if (isset($_POST['submit'])) {
    $task = $_POST['task'];
    $description = $_POST['description'];
    // save to db
    $task_to_db = mysqli_real_escape_string($conn, $task);
    $description_to_db = mysqli_real_escape_string($conn, $description);
    // sql statement
    $update_save_todo = "UPDATE todolist SET id=$id,task='$task',descriptions='$description' WHERE id=$id ";
    // go to page
    if (mysqli_query($conn, $update_save_todo)) {
        header('Location:index.php');
    } else {
        echo 'query error:' . mysqli_error($conn);
    }
}
?>