<?php
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