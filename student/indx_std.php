<?php
        include("../config/config.php");

        session_start(); 
        $id_user = $_SESSION['id_user'];

        $sql = "SELECT username FROM users";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userName = $row['username']; 
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <title>9rayti.</title>
</head>
<body>
    <!--TABLE SCRIPT-->  
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            });
        </script>
        
        <!--NAV BAR--> 
        <?php
        include("../config/config.php");
        ?>

        <nav>   
            <div class="nav__content">
                <div class="logo">  
                    <a href="#">9rayti.</a>        
                </div>
                <span class="user-name">Student</span>
                <i class='profil-icon bx bxs-user-circle'></i>
            </div>
        </nav>



    <div class="sidebar">
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="indx_std.php" class="active">
                            <i class="bx bx-home-alt icon-active"></i>
                            <span class="text nav-text text-active">Dashboard</span>
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
                            <span class="text nav-text">Submitted homework</span>
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
    <!-- NAV BAR -->

    <div class="mytable">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard</h1>     
            </div>
        </div>
        <br>

        <div class="desc">
                    <div class="content">
                        <p>
                    Welcome to our 9rayti platform, designed to streamline educational management. Here, students have the power to register, update personal details, access homework instructions, submit assignments with ease, review their submissions, and track homework evaluations. Join us in the journey of seamless learning!
                    </p>
                </div>
                </div> 
    </div>

</body>
</html>
