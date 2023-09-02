<?php 
//FETCHING THE DATA FROM DATABASE AND DISPLAYING THEM FIRST BEFORE EDITING  
    require "database.php";
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

