<?php
$errors[]="";
$name="";
$address="";
$email="";
$phone="";
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $conn = getDb();
    $name=$_POST['name'];
    $address=$_POST['address']; 
    $email=$_POST['email'];
    $phone=$_POST['phone'];   

    $sql = "INSERT INTO contacts (name, address, phone, email)
    VALUES (?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt==false) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $address, $phone, $email);
        if (mysqli_stmt_execute($stmt)) {
           echo "New contact successfully added.";
        }
    }

    if (empty($name)) {
        $errors[] = "Please enter your name!";
    }
    if (empty($address)) {
        $errors[] = "Please enter your address!";
    }
    if (empty($phone)) {
        $errors[] = "Please enter your phone number!";
    }
    if (empty($email)) {
        $errors[] = "Please enter your email!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new contact</title>
</head>
<body>
    <h2>Add new contact</h2>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>
        <label for="address">Address</label>
        <input type="text" name="address" id="address"><br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email"><br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone"><br>
        <input type="submit" name="submit" value="Add">
        <button>Cancel</button>
    </form>
</body>
</html>