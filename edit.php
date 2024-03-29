<?php
require 'includes/database.php';
    $conn = getDb();
    $sql = "SELECT * FROM contacts where id = ".$_GET['id'];
    $results=mysqli_query($conn, $sql);
if($results==false){
   echo mysqli_error($conn);
}
else{
    $contact = mysqli_fetch_assoc($results);
}
?>

<!DOCTYPE html>
<head>
    <title>Edit Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .edit-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
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
            background-color: #66cc66;
            color: #ffffff;
        }
        .button-save:hover{
            background-color: #55a855;
        }
        .button-cancel {
            cursor: pointer;
            background-color: #ff6666;
            color: #ffffff;
        }
        .button-cancel:hover{
            background-color: #c64f4f;
        }
        .button:active{
            background-color: lightslategray;
        }
        .return{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <h1>Edit Details</h1>
        <form method="POST">
            <?php if(empty($contact)): ?>
                <p>Nothing found</p>
                <?php else: ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?= $contact['name']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $contact['email']; ?>">
            </div>
            <div class="form-group">
                <label for="text">Phone Number:</label>
                <input type="phone" id="number" name="number" value="<?= $contact['phone']; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?= $contact['address']; ?>">
            </div>
            <div class="button-container">
                <button class="button button-save" type="submit">Save</button>
                <button class="button button-cancel" type="button" onclick="window.location.href='home.php'">Cancel</button>
            </div>
            <h5 style="color:#66cc66";>
                <?php if(isset($success)): ?>
                    <?=$success;?>
                </h5>
                <div class="return">
                    <button class="button button-cancel" type="button" onclick="window.location.href='home.php'">Return to home</button>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
    
    <?php

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        
        $name = $contact['name'];
        $email = $contact['email'];
        $phone = $contact['phone'];
        $address = $contact['address'];

        // $sql = "UPDATE contacts SET name='?', email='?', phone='?', address='?' WHERE id=".$_GET['id'];
        // $stmt = mysqli_prepare($conn, $sql);

        // if($stmt==false) {
        //     echo mysqli_error($conn);
        // }
        // else {
        //     mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $address);
        //     if(mysqli_stmt_execute($stmt)) {
        //         $success = "Contact updated successfully!";
        //     }
        // }

        $sql = "UPDATE contacts SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}' WHERE id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);

        if($result) {
            $success = "Contact updated successfully!";
        }
    }
?>
</body>
</html>

