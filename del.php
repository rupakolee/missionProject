<!DOCTYPE html>
<html>
<head>
    <title>Delete Page</title>
    <link rel="stylesheet" href="styles/del.css">
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