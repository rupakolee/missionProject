<?php

session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="login.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact management system</title>
</head>
<body>

    <?php require 'credentials.php'; ?>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="POST">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="email" id="email" required>
                        <label for="email">Email / Username</label>
                    </div>


                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="password">Password</label>
                    </div>
                    
                    <button>Login</button>

                    
                    <?php 
                        if ($email == "deepaksir@gmail.com" || $email == "deepak123") {
                            if ($password == "deepak123") {
                                header("Location: home.php");
                            }
                        }
                        ?>

                        <p style="color:white;
                                    text-align:center;
                                    margin-top: 16px;">
                        <?php
                        if (!empty($email) && ($email != "deepaksir@gmail.com" || $email != "deepak123")) {
                            if (!empty($password) && $password != "deepak123"){
                                echo "Incorrect Credentials!";
                            }
                        }
                    ?>
                    </p>
                   

                    </div>
                </form>

            </div>

        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
