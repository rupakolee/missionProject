<!DOCTYPE html>
<html>
<head>
    <title>Delete Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .delete-container {
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
        .message {
            text-align: center;
            margin-bottom: 20px;
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        .button {
            margin: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:active{
            background-color: darkslategray;
        }
        .button-yes:hover {
            background-color: #55a855;
        }
        .button-no {
            background-color: #ff6666;
            color: #ffffff;
        }
        .button-no:hover {
            background-color: #c64f4f;
        }
        .button-yes {
            background-color: #66cc66;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="delete-container">
        <form method="post">
            <h1>Delete Confirmation</h1>
            <p class="message">Are you sure you want to delete?</p>
            <div class="button-container">
                <button type="submit" class="button button-yes">Yes</button>
                <button class="button button-no" type="button" onclick="window.location.href='home.php'">No</button>
            </div>
        </form>
     </div>
</body>
</html>


<?php
    require 'includes/database.php';

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $conn = getDb();

        $sql = "DELETE FROM contacts where id=".$_GET['id'];

        $result=mysqli_query($conn, $sql);
        if ($result==false) {
            echo mysqli_error($conn);
        }
        else{
            header("Location: home.php");
        }
    }
?>