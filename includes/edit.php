<?php 
//FETCHING THE DATA FROM DATABASE AND DISPLAYING THEM FIRST BEFORE EDITING  
function fetch() {
    $conn = getDb();
    $sql = "SELECT * FROM contacts where id = ".$_GET['id'];
    $results=mysqli_query($conn, $sql);
    if($results==false){
        echo mysqli_error($conn);
    }
    else{
        $contact = mysqli_fetch_assoc($results);
    }
    return $contact;
}
?>

<?php

// if ($_SERVER['REQUEST_METHOD']=="POST") {
    
//     $name = $contact['name'];
//     $email = $contact['email'];
//     $phone = $contact['phone'];
//     $address = $contact['address'];

//     // $sql = "UPDATE contacts SET name='?', email='?', phone='?', address='?' WHERE id=".$_GET['id'];
//     // $stmt = mysqli_prepare($conn, $sql);

//     // if($stmt==false) {
//     //     echo mysqli_error($conn);
//     // }
//     // else {
//     //     mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $address);
//     //     if(mysqli_stmt_execute($stmt)) {
//     //         $success = "Contact updated successfully!";
//     //     }
//     // }

//     $sql = "UPDATE contacts SET name='{$name}', email='{$email}', phone='{$phone}', address='{$address}' WHERE id=".$_GET['id'];
//     $result = mysqli_query($conn, $sql);

//     if($result) {
//         $success = "Contact updated successfully!";
//     }
// }
?>