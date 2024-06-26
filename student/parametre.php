<?php
    include("../config/config.php");
    session_start();

// if(isset($_SESSION['id_user'])) {
//     $id_user = $_SESSION['id_user'];
    
// } else {
//     header("Location: ../index.php");
//     exit();
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../teacher/parametre.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../teacher/parametre.css">
    <title>9rayti-setting teacher</title>
</head>
<body>   
       
    <!--NAV BAR--> 
        <?php
        include("../config/config.php");
        ?>

        <nav>   
            <div class="nav__content">
                <div class="logo">  
                    <a href="#">9rayti.</a>        
                </div>
                
            </div>
        </nav>


    <div class="sidebar">
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="indx_std.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>   
                    </li>
                    <li class="nav-link">
                        <a href="homlist.php">
                            <i class="bx bx-book-open icon"></i>
                            <span class="text nav-text">List of homeworks</span>
                        </a>   
                    </li>
                    <li class="nav-link">
                        <a href="submithom.php">
                            <i class='bx bx-list-check icon'></i>
                            <span class="text nav-text text">Submitted homework</span>
                        </a>   
                    </li>
                </ul>
            </div>


            <div class="bottom-content">
                <hr class="h">
                <li class="nav-link">
                    <a href="parametre.php"  class="active">
                        <i class="bx bx-cog icon-active"></i>
                        <span class="text nav-text text-active">Settings</span>
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
    <!-- NAV BAR -->

    <?php

    include("../config/config.php");
    
    $id_user = $_SESSION['id_user'];
    $sql = "SELECT * FROM students, users WHERE students.id_user = users.id_user";
    $result = $conn->query($sql);
    if (!$result) {
        echo "An error occurred while executing the query";
    } else {
        $row = $result->fetch_assoc();
        $firstname = $row['firstname_std'];
        $lastname = $row['lastname_std'];
        $birth = $row['db_std']; 
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $new_firstname = $_POST['firstname'];
        $new_lastname = $_POST['lastname'];
        $new_birth = $_POST['birth'];
    
        $update_query = "UPDATE students SET firstname_std = '$new_firstname', lastname_std = '$new_lastname', db_std = '$new_birth' WHERE id_user = $id_user";
    
        $update_result = $conn->query($update_query);
    
        if ($update_result) {
            echo "Information updated successfully";
        } else {
            echo "An error occurred while updating information";
        }
    }
    ?>
    <h2>Edit Personal Information</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="field input">
          <label for="firstname">First Name:</label><br>
          <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>"><br>
        </div>
        <div class="field input">
          <label for="lastname">Last Name:</label><br>
          <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>"><br>
        </div>
        <div class="field input">
          <label for="birth">Birth Date:</label><br>
          <input type="text" id="birth" name="birth" value="<?php echo $birth; ?>"><br>
        </div>
        <input type="submit" class="btn" value="Save Changes">
    </form>
</body>
</html>
