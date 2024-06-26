<?php
include("../config/config.php");

$statusMsg = '';
$id_hom = isset($_POST['id_hom']) ? $_POST['id_hom'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle file upload
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "../uploads/"; 
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");

        if (!in_array($file_type, $allowed_types)) {
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, and PDF files are allowed.";
        } else {
            if (file_exists($target_file)) {
                $attachment = uniqid() . "_" . $_FILES["file"]["name"];
            } else {
                $attachment = $_FILES["file"]["name"];
            }

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir . $attachment)) {
                $sub_date = date("Y-m-d H:i:s");
                $status = "Submitted";

                // Insert filename, sub_date, status, and id_hom into the database
                $sql = "INSERT INTO submittedhomeworks (id_hom, sub_date, attachment, status) VALUES ('$id_hom', '$sub_date', '$attachment', '$status')";
                
                if ($conn->query($sql) === TRUE) {
                    $statusMsg = "File uploaded successfully.";
                    header("Location: show.php?id_hom=" . $id_hom);
                    exit; // Add an exit statement to stop executing further code

                } else {
                    $statusMsg = "Error inserting file data into the database: " . $conn->error;
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $statusMsg = "No file was uploaded.";
    }
}

// Output the status message
echo $statusMsg;
?>
