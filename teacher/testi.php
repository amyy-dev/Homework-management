<?php 
    // session_start();
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

        $userId = $_SESSION['id_user']; 

        $sql = "SELECT username FROM users";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userName = $row['username']; 
        }
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
                        <a href="hometch.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="testi.php" class="active">
                            <i class="bx bx-list-ul icon icon-active"></i>
                            <span class="text nav-text text-active">List of students</span>
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
            <h1>Activate student account</h1>

            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../config/config.php");

                            $sql = "SELECT id_std, lastname_std, firstname_std, db_std, placebd_std FROM students WHERE status = 0";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["lastname_std"] . "</td>";
                                    echo "<td>" . $row["firstname_std"] . "</td>";
                                    echo "<td>" . $row["db_std"] . "</td>";
                                    echo "<td>" . $row["placebd_std"] . "</td>";
                                    echo "<td>";
                                    echo "<a href='activate_account.php?id=" . $row["id_std"] . "'><button type='button' class='btn btn-outline-primary'>Activate</button></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No data found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>


                <h1>Students list</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../config/config.php");

                            $sql = "SELECT lastname_std, firstname_std, db_std, placebd_std FROM students WHERE status = 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["lastname_std"] . "</td>";
                                    echo "<td>" . $row["firstname_std"] . "</td>";
                                    echo "<td>" . $row["db_std"] . "</td>";
                                    echo "<td>" . $row["placebd_std"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No data found</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
