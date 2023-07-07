<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$data = json_decode(file_get_contents("php://input"));


// connect to database
include('../configure/db_connect.php');
include('../api/token/token.php');

// error array
$errorsLogin = array('email_addressEr_login' => '', 'passwordEr_login' => '',);
$successLogin = array('email_addressSu_login' => '', 'passwordSu_login' => '',);
$user_from_db_password = '';

if ($data->login) {
    $email_login = $data->email;
    $password_login = $data->password;
    $emailPattern = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

    // validation email
    if (empty($email_login) || preg_match($emailPattern, $email_login) == 0) {
        $errorsLogin['email_addressEr_login'] =  "Email is invalid";
        $successLogin['email_addressSu_login'] = '';
    } else if ($email_login !== "" && preg_match($emailPattern, $email_login) == 1) {
        $successLogin['email_addressSu_login'] = "Email valid";
        $errorsLogin['email_addressEr_login'] = '';
    }

    // validation password
    if (empty($password_login)) {
        $errorsLogin['passwordEr_login'] =  "Enter your password";
        $successLogin['passwordEr_login'] = '';
    } else if ($password_login !== "") {
        $successLogin['passwordSu_login'] = "Password valid";
        $errorsLogin['passwordSu_login'] = '';
    }

    if ($errorsLogin['email_addressEr_login'] != "" || $errorsLogin['passwordEr_login'] != "") {
        $dataLoginError = array(
            'status' => 422,
            'message' => 'login failed',
            'errors' => $errorsLogin,
            'success' => $successLogin
        );
        echo json_encode($dataLoginError);
        // } else if ($errorsLogin['email_addressEr_login'] = "" || $errorsLogin['passwordEr_login'] = "") {
    } else if ($successLogin['email_addressSu_login'] != "" || $successLogin['passwordSu_login'] != "") {
        // select from database
        $sql_login = "SELECT * FROM users WHERE email = '$email_login'";
        $result_login = mysqli_query($conn, $sql_login);
        // convert result from database to an array
        $user = mysqli_fetch_array($result_login, MYSQLI_ASSOC);
        // $user_from_db_password = $user["password"];
        if ($user) {
            $user_from_db_password = $user["password"];
            $user_from_db_email = $user["email"];
            $user_from_db_id = $user["id"];
            $user_from_db_username = $user["username"];

            if (sha1($password_login) == $user_from_db_password && $email_login == $user_from_db_email) {
                // Create token header as a JSON string
                $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

                // Create token payload as a JSON string
                $payload = json_encode(['user_id' => $user_from_db_id]);

                // / Encode Header to Base64Url String
                $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

                // Encode Payload to Base64Url String
                $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

                // Create Signature Hash
                $signature = hash_hmac(
                    'sha256',
                    $base64UrlHeader . "." . $base64UrlPayload,
                    '**19972023',
                    true
                );

                // Encode Signature to Base64Url String
                $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

                // Create JWT
                $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

                // $raw = "ABCDEFGHIJKLMNOPQRSTUVW0987654321]";

                $token =  $jwt;
                // insert token in token table
                $user_id = $user["id"];
                $isToken =  set_token($conn, $user_from_db_id, $token);
                if ($isToken) {
                    $userdata = array(
                        'status' => 200,
                        'token' => $token,
                        'message' => 'successfully fetch user data',
                        'data' => $user,
                        'username' => $user_from_db_username,
                        'email' => $user_from_db_email,
                        'id' => $user_from_db_id,
                        'success' => $successLogin

                    );
                    echo json_encode($userdata);
                }
            }
        }
    }
}
