<?php
    include("../config/config.php");

    if(isset($_GET['id'])) {
        $studentID = $_GET['id'];

        $sql = "UPDATE students SET status = 1 WHERE id_std = $studentID";
        if ($conn->query($sql) === TRUE) {
            header("Location: testi.php");
            exit(); 
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Student ID not provided.";
    }
?>
