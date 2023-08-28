<?php

$name='';
$email='';
$phone='';
$address='';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $name = $_POST['name'];
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $address = $_POST['address'];

    $nameErr='';
    $phoneErr='';

    if (empty($name)) {
        $nameErr = "Please enter name!";
    }
    if(empty($phone)){
        $phoneErr = "Please enter Phone number!";
    }
    if(!is_numeric($phone)) {
        $phoneErr = "Phone number must be numeric!";
    }
    if ($phone>9999999999 || $phone<1000000000) {
        $phoneErr = "Number length invalid!";
    }

    //VALIDATION ENDS HERE

    if (empty($nameErr) && empty($phoneErr)) {
    $conn = getDb();

    $sql = "INSERT INTO contacts (name, email, phone, address)
    VALUES (?,?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    if($stmt==false) {
        echo mysqli_error($conn);
    }
    else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $address);
        if(mysqli_stmt_execute($stmt)){
            $success = "Contact added successfully!";
        }
    }

}
}
    
?>