<?php 
// connect to database
$conn =mysqli_connect("localhost","tobi","jesutobi","todo");
if(!$conn){
    echo 'connection failed' . mysqli_connect_error();
}else{
    // echo 'successful';

}
