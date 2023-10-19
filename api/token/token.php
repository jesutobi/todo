<?php


function set_token($conn, $user_from_db_id, $token)
{

    // initialize statement to return object suitable for mysqli prepare
    $sql_reg = "INSERT INTO token_table(user_id,token) VALUES('$user_from_db_id','$token')";
    // prepare the statement for execution

    if (mysqli_query($conn, $sql_reg)) {
        return  true;
    } else {
        return false;
    }
}

function get_token($conn, $token)
{
    // SELECT TOKEN
    // select from database
    $sql_token_get = "SELECT * FROM token_table WHERE token = '$token'";
    if (mysqli_query($conn, $sql_token_get)) {
        return  true;
    } else {
        return false;
    }
}

function remove_token($conn, $token)
{
    // DELETE TOKEN
    // SELECT TOKEN
    // select from database
    $sql_token_get = "DELETE FROM token_table WHERE token = '$token'";
    if (mysqli_query($conn, $sql_token_get)) {
        return  true;
    } else {
        return false;
    }
}
