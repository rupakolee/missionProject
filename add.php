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
        if ($phone>999999999 && $phone<10000000000) {
            $phoneErr = "Number length invalid!";
        }
        if(!is_numeric($phone)) {
            $phoneErr = "Phone number must be numeric!";
        }
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
    }

}
}
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .add-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        button {
            cursor: pointer;

        }
        ion-icon{
            cursor: pointer;
            padding: 5px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #dddddd;
            border-radius: 5px;
            resize: none;
        }
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #66cc66;
            color: #ffffff;
        }
        .button-save {
            cursor: pointer;
            background-color: #54cb3f;
            color: #ffffff;
        }
        .button-cancel {
            cursor: pointer;
            background-color: #ea0e0e;
            color: #ffffff;
        }
        .required::before {
            content: '* ';
            color: red;
        }
        .error {
            color: red;
            font-style: italic;
            font-size: 12px;
        }
        h5 {
            text-align: center;
            color:#66cc66;
        }
      
    </style>
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
            if ($_SERVER['REQUEST_METHOD']=="POST") {
                if(mysqli_stmt_execute($stmt)){
                    echo "Contact added successfully!";
                }
        }
        ?></h5>
        </form>
    </div>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>


