<?php  
    $email = '';
    $password='';
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors[] = '';
}
?>

