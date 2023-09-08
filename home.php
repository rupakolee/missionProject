<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/home.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact management system</title>
</head>
<body>
    <div id="header">
        <div class="logo"> <img src='NIST.png'> </div> <h5></h5>
        <div class="menu">
            <div class="background background--light">
                <form method="post">
                <button class="logoutButton logoutButton--dark" type="submit">
                  <svg class="doorway" viewBox="0 0 100 100">
                    <path d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z" />
                    <path class="bang" d="M40.5 43.7L26.6 31.4l-2.5 6.7zM41.9 50.4l-19.5-4-1.4 6.3zM40 57.4l-17.7 3.9 3.9 5.7z" />
                  </svg>
                  <svg class="figure" viewBox="0 0 100 100">
                    <circle cx="52.1" cy="32.4" r="6.4" />
                    <path d="M50.7 62.8c-1.2 2.5-3.6 5-7.2 4-3.2-.9-4.9-3.5-4-7.8.7-3.4 3.1-13.8 4.1-15.8 1.7-3.4 1.6-4.6 7-3.7 4.3.7 4.6 2.5 4.3 5.4-.4 3.7-2.8 15.1-4.2 17.9z" />
                    <g class="arm1">
                      <path d="M55.5 56.5l-6-9.5c-1-1.5-.6-3.5.9-4.4 1.5-1 3.7-1.1 4.6.4l6.1 10c1 1.5.3 3.5-1.1 4.4-1.5.9-3.5.5-4.5-.9z" />
                      <path class="wrist1" d="M69.4 59.9L58.1 58c-1.7-.3-2.9-1.9-2.6-3.7.3-1.7 1.9-2.9 3.7-2.6l11.4 1.9c1.7.3 2.9 1.9 2.6 3.7-.4 1.7-2 2.9-3.8 2.6z" />
                    </g>
                    <g class="arm2">
                      <path d="M34.2 43.6L45 40.3c1.7-.6 3.5.3 4 2 .6 1.7-.3 4-2 4.5l-10.8 2.8c-1.7.6-3.5-.3-4-2-.6-1.6.3-3.4 2-4z" />
                      <path class="wrist2" d="M27.1 56.2L32 45.7c.7-1.6 2.6-2.3 4.2-1.6 1.6.7 2.3 2.6 1.6 4.2L33 58.8c-.7 1.6-2.6 2.3-4.2 1.6-1.7-.7-2.4-2.6-1.7-4.2z" />
                    </g>
                    <g class="leg1">
                      <path d="M52.1 73.2s-7-5.7-7.9-6.5c-.9-.9-1.2-3.5-.1-4.9 1.1-1.4 3.8-1.9 5.2-.9l7.9 7c1.4 1.1 1.7 3.5.7 4.9-1.1 1.4-4.4 1.5-5.8.4z" />
                      <path class="calf1" d="M52.6 84.4l-1-12.8c-.1-1.9 1.5-3.6 3.5-3.7 2-.1 3.7 1.4 3.8 3.4l1 12.8c.1 1.9-1.5 3.6-3.5 3.7-2 0-3.7-1.5-3.8-3.4z" />
                    </g>
                    <g class="leg2">
                      <path d="M37.8 72.7s1.3-10.2 1.6-11.4 2.4-2.8 4.1-2.6c1.7.2 3.6 2.3 3.4 4l-1.8 11.1c-.2 1.7-1.7 3.3-3.4 3.1-1.8-.2-4.1-2.4-3.9-4.2z" />
                      <path class="calf2" d="M29.5 82.3l9.6-10.9c1.3-1.4 3.6-1.5 5.1-.1 1.5 1.4.4 4.9-.9 6.3l-8.5 9.6c-1.3 1.4-3.6 1.5-5.1.1-1.4-1.3-1.5-3.5-.2-5z" />
                    </g>
                  </svg>
                  <svg class="door" viewBox="0 0 100 100">
                    <path d="M93.4 86.3H58.6c-1.9 0-3.4-1.5-3.4-3.4V17.1c0-1.9 1.5-3.4 3.4-3.4h34.8c1.9 0 3.4 1.5 3.4 3.4v65.8c0 1.9-1.5 3.4-3.4 3.4z" />
                    <circle cx="66" cy="50" r="3.7" />
                  </svg>
                  <span class="button-text">Log Out</span>
                </button>
                </form>
                
<?php 
    if($_SERVER['REQUEST_METHOD']=="POST") {
        session_destroy();
        header("Location: login.php");
        
    }
?>
              </div>
              
        </div>
    </div>

    <div class="table">
        <div class="table_header">
            <div> <p>Details</p>
                </div>

            <div class="search_bar">
                <input type="text" placeholder="Search">
                <button type="search"> <ion-icon name="search-outline"></ion-icon></button><br>
               
                <a href="#"> 
                <i class="fas fa-search"></i>
                </a>
                
            </div>
        </div>
        <a href="add.php"><button class="add_new">Add New <b>+</b></button></a>
        <div class="table_section">
            <table>

            <?php 
                require 'includes/database.php';

                    $conn = getDb();
                    $sql = "SELECT * FROM contacts";

                    $results = mysqli_query($conn, $sql);
                    if($results==false) {
                        echo mysqli_error($conn);
                    }
                    else {
                        $contacts = mysqli_fetch_all($results, MYSQLI_ASSOC);
                    }
            ?>
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                    <tr>
                        <td><?= $contact['id']; ?></td>
                        <td><?= $contact['name']; ?></td>
                        <td><?= $contact['phone']; ?></td>
                        <td><?= $contact['email']; ?></td>
                        <td><?= $contact['address']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $contact['id']; ?>"><button><ion-icon name="create-outline"></ion-icon></button></a>
                            <a href="del.php?id=<?= $contact['id']; ?>"><button><ion-icon name="trash-outline"></ion-icon></button></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            
            </table>

        </div>

    </div>
    <script src="scripts/logout.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
