<?php

function getDb() {

    $db_host="localhost";
    $db_user="root";
    $db_password="";
    $db_name="cms";
    
    $conn=mysqli_connect($db_host,$db_user,$db_password,$db_name); 
    if($conn){
        // echo "PS:- You're connected to database.<br>";
        return $conn;
    }

}
?>