
<?php
// Start the session
session_start();


// connect to database
include('../configure/db_connect.php');
$_SESSION["username"] = $_SESSION["email_address"] = $_SESSION["password"] = $_SESSION["passwordRepeat"] = "";
// error array
$_SESSION["errors"] = array('usernameEr' => '', 'email_addressEr' => '', 'passwordEr' => '', 'passwordRepeatEr' => '', 'failed_register' => '');
$_SESSION["success"] = array('usernamesu' => '', 'email_addresssu' => '', 'passwordsu' => '', 'passwordRepeatsu' => '', 'success_register' => '');
// $_SESSION["success"] = array('success_register' => '');
if (isset($_POST['submit'])) {

    // email var
    $email_sanitize = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $email_validate = $_POST["email"];

    // hash password
    // $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $password_hash = sha1($_POST["password"]);

    if (empty($_POST['username'])) {
        $_SESSION["errors"]["usernameEr"] = "Enter your username";
        header('Location:../../authentication/register.php');
    } else {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["success"]["usernamesu"] = "Username is valid";
    }


    // email validation
    if (empty($_POST["email"])) {
        $_SESSION["errors"]["email_addressEr"] = "Enter your email address";
        header('Location:../../authentication/register.php');
    } else if (!filter_var($email_sanitize, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["errors"]["email_addressEr"] = "Enter a valid email address format";
        header('Location:../../authentication/register.php');
    } else {
        $_SESSION["email_address"] = $email_sanitize;
        $_SESSION["success"]["email_addresssu"] = "Email address is valid";
    }


    // password validation
    if (strlen($_POST["password"]) < 8) {
        $_SESSION["errors"]["passwordEr"] = "Password must be more than 8 character";
        header('Location:../../authentication/register.php');
    } else if (empty($_POST["password"])) {
        $_SESSION["errors"]["passwordEr"] = "Enter your password";
        header('Location:../../authentication/register.php');
    } else {
        $_SESSION["password"] = $_POST["password"];
        $_SESSION["success"]["passwordsu"] = "Password is valid";
    }


    // confirm password
    if ($_POST["password"] !== $_POST["confirmPassword"]) {
        $_SESSION["errors"]["passwordRepeatEr"] = "Password does not match";
        header('Location:../../authentication/register.php');
    } else if (empty($_POST["confirmPassword"])) {

        $_SESSION["errors"]["passwordRepeatEr"] = "Confirm your password";
        header('Location:../../authentication/register.php');
    } else {
        $_SESSION["passwordRepeat"] = $_POST["confirmPassword"];
        $_SESSION["success"]["passwordRepeatsu"] = "Password is valid";
    }

    // to prevent replication of email
    // convert characters to string

    $sql_repeat = "SELECT * FROM users WHERE email = '$email_validate'";
    $result_repeat = mysqli_query($conn, $sql_repeat);
    $rowCount = mysqli_num_rows($result_repeat);
    if ($rowCount > 0) {
        $_SESSION['errors']['email_addressEr'] = "Email already exists !";
        header('Location:../../authentication/register.php');
    }

    if (array_filter($_SESSION["errors"])) {
    } else {
        // insert data from the form into the database
        // to string
        $username_to_db = mysqli_real_escape_string($conn, $_POST["username"]);
        $email_to_db = mysqli_real_escape_string($conn, $email_sanitize);

        // initialize statement to return object suitable for mysqli prepare
        $sql_reg = "INSERT INTO users(username,email,password) VALUES('$username_to_db','$email_to_db','$password_hash')";
        // prepare the statement for execution

        if (mysqli_query($conn, $sql_reg)) {
            // $_SESSION['success']['success_register'] = "Registration successful";
           
            header("Location:../../authentication/login.php");


            // die();
        } else {
            echo "<script>alert('registration failed')</script>" . mysqli_error($conn);
            // echo ;
            // die();
        }
    }
}
