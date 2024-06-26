<?php
include("../config/config.php");

$statusMsg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "../uploads/"; // Change this to the desired directory for uploaded files
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (you can modify this to allow specific file types)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");

        if (!in_array($file_type, $allowed_types)) {
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            // Check for filename collisions and handle accordingly
            if (file_exists($target_file)) {
                $filename = uniqid() . "_" . $_FILES["file"]["name"];
            } else {
                $filename = $_FILES["file"]["name"];
            }

            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $filename)) {
                // Handle homework submission
                $editorContent = $_POST['homework'];
                $description = mysqli_real_escape_string($conn, $editorContent);
                $created = date("Y-m-d H:i:s");

                // Insert filename, description, and created date into the database
                $sql = "INSERT INTO homeworks (filename, description, created) VALUES ('$filename', '$description', '$created')";
                
                if ($conn->query($sql) === TRUE) {
                    $statusMsg = "The file '$filename' and description content have been inserted successfully.";
                } else {
                    $statusMsg = "Error inserting file and description content into the database: " . $conn->error;
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $statusMsg = "No file was uploaded.";
    }
}

// Redirect with status message
header("Location: desc.php?status=$statusMsg");
?>
