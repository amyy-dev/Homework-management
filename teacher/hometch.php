<?php

include("../config/config.php");

session_start();
$id_user = $_SESSION['id_user'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <title>9rayti.</title>
</head>
<body>   
    
    <!--NAV BAR--> 
        <?php
        include("../config/config.php");

        session_start(); 

        $id_user = $_SESSION['id_user']; 
        ?>

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
                        <a href="hometch.php" class="active">
                            <i class="bx bx-home-alt icon icon-active"></i>
                            <span class="text nav-text  text-active">Dashboard</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="testi.php">
                            <i class="bx bx-list-ul icon"></i>
                            <span class="text nav-text">List of students</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="desc.php">
                            <i class="bx bx-book-open icon"></i>
                            <span class="text nav-text">List of homeworks</span>
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
                <h1>Dashboard</h1>     
            </div>
        </div>

        <div class="desc">
                    <div class="content">
                        <p>Welcome! to our educational platform, where teachers enjoy streamlined academic management. <br> With our user-friendly interface, teachers can effortlessly accept new students, view comprehensive student lists, set detailed homework descriptions, access submitted homework, and provide timely evaluations. </p>

                    </div>
                </div> 
    </div>

</body>
</html>
