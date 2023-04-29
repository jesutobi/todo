<?php
// Start the session
session_start();
// connect to database
include('../configure/db_connect.php');
// error array
$_SESSION["errors"] = array('email_addressEr_login' => '', 'passwordEr_login' => '',);
if (isset($_POST['login'])) {
    $email_login = $_POST['email'];
    $_SESSION['loggedin'] = $_POST['email'];
    $password_login = $_POST['password'];
    // select from database

    $sql_login = "SELECT * FROM users WHERE email = '$email_login'";
    $result_login = mysqli_query($conn, $sql_login);
    // convert result from database to an array
    $user = mysqli_fetch_array($result_login, MYSQLI_ASSOC);
    $_SESSION['todo_user'] = $user['username'];
    $_SESSION['todo_email'] = $user['email'];

    // validate
    if ($user) {

        // if (password_verify($password_login, $user["password"])) {
        if (sha1($password_login) == $user["password"]) {
            // session_start();
            $_SESSION["user"] = "logged in";
            $_SESSION["user_id"] = $user['id'];
            header("Location:../../index.php");
            
            die();
        } else {
            $_SESSION["errors"]["passwordEr_login"] = "Wrong password";
            header('Location:../../authentication/login.php');
        }
    }
    if ($user["email"] !== $email_login) {
        $_SESSION["errors"]["email_addressEr_login"] = "Wrong email address";
        header('Location:../../authentication/login.php');
    }
    // else{
    //      $_SESSION["user"] = "logged in";
    // }
}
