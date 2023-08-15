<?php

    if ($_SERVER['REQUEST_METHOD']=="POST") {
        $conn = getDb();

        $sql = "DELETE FROM contacts WHERE id=".$_GET['id'];
        $result = mysqli_query($conn, $sql);

        if($result==false){
            echo mysqli_error($conn);
        }

        else{
            $success = "Contact deleted successfully!";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .button-container {
            display: flex;
        }
        .button {
            margin: 4px;
            padding: 0px 2px;
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
            <div class="button-container">
                <button type="submit" class="button button-yes">+</button>
                <button type="button" class="button button-no" onclick="window.location.href='home.php'">-</button>
            </div>
        </form>

                </div>
    </div>
</body>
</html>


