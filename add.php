<?php

require 'includes/database.php';
$name='';
$email='';
$phone='';
$address='';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $address = $_POST['address'];

    $nameErr='';
    $phoneErr='';

    if (empty($name)) {
        $nameErr = "Please enter name!";
    }
    if(empty($phone)){
        $phoneErr = "Please enter Phone number!";
    }
    if(!is_numeric($phone)) {
        $phoneErr = "Phone number must be numeric!";
    }
    if ($phone>9999999999 || $phone<1000000000) {
        $phoneErr = "Number length invalid!";
    }

    if (empty($nameErr) && empty($phoneErr)) {
    $conn = getDb();

    $sql = "INSERT INTO contacts (name, email, phone, address)
    VALUES (?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    if($stmt==false) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $address);
        if(mysqli_stmt_execute($stmt)){
            $success = "Contact added successfully!";
        }
    }

}
}
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add contact</title>
    <link rel="stylesheet" href="styles/add.css">
</head>
<body>
    <div class="add-container">
        <h1>Add Contact</h1>
        <form method="POST">
            
            <div class="form-group">
                <label for="name" class="required">Name:</label>
                <?php if(!empty($nameErr) || !empty($phoneErr)): ?>
                <p class="error"><?= $nameErr ?></p>
                <?php endif; ?>
                <input type="text" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="number" class="required">Phone:</label>
                <?php if(!empty($nameErr) || !empty($phoneErr)): ?>
                <p class="error"><?= $phoneErr ?></p>
                <?php endif; ?>
                <input type="tel" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea>
            </div>
            <div class="button-container">
                <button class="button button-save" type="submit">Save</button>
                <button class="button button-cancel" type="button" onclick="window.location.href='home.php'">Cancel</button>
            </div>
            <h5><?php 
            if (isset($success)) {
                echo $success;
            }
            ?></h5>
        </form>
    </div>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>


