<?php
// Start the session
session_start();
// connect to database
include('../configure/db_connect.php');
$_SESSION["task"] = $_SESSION["description"] = '';
$_SESSION["errors"] = array('task' => '', 'description' => '');
if (isset($_POST['submit'])) {
    if (empty($_POST['task'])) {
        $_SESSION["errors"]['task'] = 'enter task title';
        header('Location:../index.php');
    } else {
        $_SESSION["task"] = $_POST['task'];
    }
    if (empty($_POST['description'])) {
        $_SESSION["errors"]['description'] = 'enter description ';
        header('Location:../index.php');
    } else {
        $_SESSION["description"]  = $_POST['description'];
    }
    // add to db
    if (array_filter($_SESSION["errors"])) {
    } else {
        // save to db
        $task_to_db = mysqli_real_escape_string($conn, $_POST['task']);
        $description_to_db = mysqli_real_escape_string($conn, $_POST['description']);
        $user_db = $_SESSION["user_id"];

        // sql statement
        $sql_save_todo = "INSERT INTO todolist(user_id,task,descriptions) VALUES('$user_db',' $task_to_db',' $description_to_db') ";
        // go to page
        if (mysqli_query($conn, $sql_save_todo)) {
            header('Location:../index.php');
        } else {
            echo 'query error:' . mysqli_error($conn);
        }
    }
}
if (isset($_GET['id'])) {
    // convert characters to string
    $prefill_to_string = mysqli_real_escape_string($conn, $_GET['id']);
    // prefill form
    $prefill_todo_form = "SELECT * FROM todolist WHERE id = $prefill_to_string  ";
    // get query result
    $prefill_todo_form_result = mysqli_query($conn, $prefill_todo_form);
    // convert result to array
    $prefill_todo_forms_array = mysqli_fetch_assoc($prefill_todo_form_result);
    $task = $prefill_todo_forms_array['task'];
    $description = $prefill_todo_forms_array['descriptions'];
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
