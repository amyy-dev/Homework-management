<?php 
session_start();
include("../config/config.php");

$userId = $_SESSION['id_user']; 

$sql = "SELECT username FROM users";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userName = $row['username']; 
}

$id_hom = $_GET['id_hom']; 

// Prepare and bind the parameter to prevent SQL injection
$stmt = $conn->prepare("SELECT id_hom, description, filename FROM homeworks WHERE id_hom = ?");
$stmt->bind_param("i", $id_hom);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_hom = $row['id_hom'];
    $description = $row['description'];
    $filename = $row['filename'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->
    
    <title>9rayti.</title>

    <script src="ckeditor/ckeditor.js"></script>

</head>
<body>   
   
    <!--NAV BAR--> 

        <nav>   
            <div class="nav__content">
                <div class="logo">  
                    <a href="#">9rayti.</a>        
                </div>
                <span class="user-name">Teacher</span>
                <i class='profil-icon bx bxs-user-circle'></i>
            </div>
        </nav>

    <div class="sidebar">
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="testi.php" >
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">List of students</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="desc.php" class="active">
                            <i class="bx bx-book-open icon icon-active"></i>
                            <span class="text nav-text text-active">List of homeworks</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="submithom.php">
                            <i class="bx bx-book-open icon"></i>
                            <span class="text nav-text">Submitted homeworks</span>
                        </a>   
                    </li>
                </ul>
            </div>


            <div class="bottom-content">
                <hr class="h">
                <li class="nav-link">
                    <a href="parametre.php">
                        <i class="bx bx-cog icon"></i>
                        <span class="text nav-text">Settings</span>
                    </a>   
                </li>

                <li class="">
                    <a href="../config/logout.php" class="log">
                        <i class="bx bx-log-out icon-log"></i>
                        <span class="text-log">Log out</span>
                    </a>   
                </li>
            </div>

        </div>
    </div>

    <div class="mytable">
        <div class="row">
            <div class="col-md-12">
                <h1>Homework</h1>
                <div class="stl">
                    <h1> Task : <?php echo $id_hom; ?></h1>
                </div>
                <br>
                <div class="homdesc">
                    <h1>Homework description :</h1>
                </div>   
                <br> 
                <div class="desc">
                    <div class="content">
                        <p><?php 

                        $id_hom = $_GET['id_hom']; 

                        // Prepare and bind the parameter to prevent SQL injection
                        $stmt = $conn->prepare("SELECT id_hom, description, filename FROM homeworks WHERE id_hom = ?");
                        $stmt->bind_param("i", $id_hom);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result && $result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $id_hom = $row['id_hom'];
                            $description = $row['description'];
                            $filename = $row['filename'];}


                        if (isset($description)) {
                            echo "<p>$description</p>";
                        }
                        ?></p>

                    </div>
                </div> 
                
                <br>

                <div class="filenames">
                    <div class="col-md-2"> 
                        <h1>Homework file </h1>
                    </div>

                    <div class="col-md-10"> 
                    <?php  
                        if ($filename !== "File not found") {
                            $file_path = "../uploads/" . $filename;
                        ?>
                            <a href="<?php echo $file_path; ?>" class="btn btn-primary" download="<?php echo $filename; ?>">Download</a>
                        <?php
                        } else {
                            echo "This homework does not contain a supported file";
                        }
                        ?>
                    </div>
                </div>


                
            </div>
        </div>
    </div>

</body>
</html>
