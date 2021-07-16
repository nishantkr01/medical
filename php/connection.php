<?php
    $server_name="localhost";
    $user_name="root";
    $password="root";
    $db_name="medical";

    $conn = mysqli_connect($server_name,$user_name,$password,$db_name);
    if(!$conn)
    {
        echo "Error";
    }
    else{
       
    }

?>