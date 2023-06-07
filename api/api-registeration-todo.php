<?php
// Start the session
session_start();
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"));

// if ($data->submit) {
//     $res = "Hello it worked!";

//     $response = array(
//         'message' => $res,
//         'result' => $data
//     );

//     echo json_encode($response);
// }

// connect to database
include('../configure/db_connect.php');
$username = $email_address = $password = $passwordRepeat = "";
// error array
$errors = array('usernameEr' => '', 'email_addressEr' => '', 'passwordEr' => '', 'passwordRepeatEr' => '', 'failed_register' => '');
$success  = array('usernamesu' => '', 'email_addresssu' => '', 'passwordsu' => '', 'passwordRepeatsu' => '', 'success_register' => '');
// $success"] = array('success_register' => '');
if ($data->submit) {

    // email var
    $email_sanitize = filter_var($data->email, FILTER_SANITIZE_EMAIL);
    $email_validate = $data->email;

    // hash password
    // $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $password_hash = sha1($data->password);

    if (empty($data->username)) {
        $errors["usernameEr"] = "Enter your username ";
    } else {
        // $username = $data->username;
        $success["usernamesu"] = "Username is valid";
    }


    // email validation
    if (empty($data->email)) {
        $errors["email_addressEr"] = "Enter your email address";
    } else if (!filter_var($email_sanitize, FILTER_VALIDATE_EMAIL)) {
        $errors["email_addressEr"] = "Enter a valid email address format";
    } else {
        $email_address = $email_sanitize;
        $success["email_addresssu"] = "Email address is valid";
    }


    // to prevent replication of email
    // convert characters to string
    $sql_repeat = "SELECT * FROM users WHERE email = '$email_validate'";
    $result_repeat = mysqli_query($conn, $sql_repeat);
    $rowCount = mysqli_num_rows($result_repeat);
    if ($rowCount > 0) {
        $errors['email_addressEr'] = "Email already exists !";
        // echo json_encode($errors);
    }


    // password validation
    if (strlen($data->password) < 8) {
        $errors["passwordEr"] = "Password must be more than 8 character";
    } else if (empty($data->password)) {
        $errors["passwordEr"] = "Enter your password";
    } else {
        $password = $data->password;
        $success["passwordsu"] = "Password is valid";
    }


    // confirm password
    if ($data->password !== $data->confirmpassword) {
        $errors["passwordRepeatEr"] = "Password does not match";
    } else if (empty($data->confirmpassword)) {

        $errors["passwordRepeatEr"] = "Confirm your password";
    } else {
        $passwordRepeat = $data->confirmpassword;
        $success["passwordRepeatsu"] = "Password is valid";
    }

    if ($errors['usernameEr'] != "" || $errors['email_addressEr'] != "" || $errors['passwordEr'] != "" || $errors['passwordRepeatEr'] != "") {
        $errors['failed_register'] = 'registeration failed';
        $data = array(
            'status' => 422,
            'message' => $errors['failed_register'],
            'errors' => $errors


        );
        echo json_encode($data);
    } else {
        if ($success['usernamesu'] != "" || $success['email_addresssu'] != "" || $success['passwordsu'] != "" || $success['passwordRepeatsu'] != "") {
            $success['success_register'] = 'registeration successful';
            $datasuccess = array(
                'status' => 422,
                'message' => $success['success_register'],
                'success' => $success


            );
            echo json_encode($datasuccess);
            $usernameFromFront = $data->username;
            $username_to_db = mysqli_real_escape_string($conn, $usernameFromFront);
            $email_to_db = mysqli_real_escape_string($conn, $email_sanitize);

            // initialize statement to return object suitable for mysqli prepare
            $sql_reg = "INSERT INTO users(username,email,password) VALUES('$username_to_db','$email_to_db','$password_hash')";
            // prepare the statement for execution

            if (mysqli_query($conn, $sql_reg)) {
                // $_SESSION['success']['success_register'] = "Registration successful";

                // header("Location:../../authentication/login.php");

                $response = array(
                    'message' => 'it worked!',
                    'result' => $data
                );

                // die();
            } else {
                echo "<script>alert('registration failed')</script>" . mysqli_error($conn);
                // echo ;
                // die();
            }
        }
        // echo json_encode($success);
        // insert data from the form into the database
        // to string$data->username
       
    }
}
