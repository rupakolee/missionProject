<?php
    require './includes/edit.php';      
?>

<!DOCTYPE html>
<head>
    <title>Edit Details</title>
    <link rel="stylesheet" href="styles/edit.css">
</head>
<body>
    <div class="edit-container">
        <h1>Edit Details</h1>
        <form method="POST">
            <?php
            if(empty($contact)): ?>
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
                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
    
</body>
</html>

