<?php 
    require "includes/add.php"; 
    add($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add contact</title>
    <link rel="stylesheet" href="styles/add.css">
</head>
<body>
    <div class="add-container">
        <h1>Add a Contact</h1>
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
                <input type="text" id="address" name="address">
            </div>
            <div class="button-container">
                <button class="button button-save" type="submit">Save</button>
                <button class="button button-cancel" type="button" id="cancel">Cancel</button>
            </div>
                
        </form>
    </div>
    <script src="scripts/add.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>


