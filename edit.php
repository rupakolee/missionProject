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
<html>
<head>
    <title>Edit Details</title>
    <link rel="stylesheet" href="styles/edit.css">
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
                <button class="button button-save" type="submit" name="save">Save</button>
                <button class="button button-cancel" type="button" onclick="window.location.href='home.php'">Cancel</button>
            </div>
            <?php endif; ?>
        </form>
    </div>

    <!-- Update section -->

    <?php 
if(!empty($contact)) {
    if(isset($_POST['save'])) {

        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['number'];
        $address=$_POST['address'];

        $sql = "UPDATE contacts SET name='$name',email='$email', phone='$phone', address='$address' WHERE id =".$_GET['id'];
        $result = mysqli_query($conn, $sql);
        if($result)
        header("Location: home.php");
    }
}
?>

</body>
</html>

