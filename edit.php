<?php
require 'includes/database.php';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $conn = getDb();
    $sql = "SELECT * FROM contacts";
    $results=mysqli_query($conn, $sql);
if($results==false){
   echo mysqli_error($conn);
}
else{
    $contacts = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
}
?>

<!DOCTYPE html>
<html>
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
    </style>
</head>
<body>
    <div class="edit-container">
        <h1>Edit Details</h1>
        <form method="POST">
            <?php if(empty($contacts)): ?>
                <p>Nothing found</p>
                <?php else: ?>
            <div class="form-group">
                <label for="name">Name:</label>
                <?php foreach($contacts as $contact): ?>
                <input type="text" id="name" name="name" value="<?= $contact['name']; ?>">
                <?php endforeach; ?>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="">
            </div>
            <div class="form-group">
                <label for="Number">Phone Number:</label>
                <input type="num" id="number" name="number" value="">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address"></textarea>
            </div>
            <div class="button-container">
                <button class="button button-save" type="submit">Save</button>
                <button class="button button-cancel" type="button" onclick="window.location.href='home.php'">Cancel</button>
            </div>
            <?php endif; ?>
        </form>
    </div>
    
</body>
</html>

