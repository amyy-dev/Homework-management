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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->
    
    <title>9rayti.</title>

</head>
<body>   
   
    <!--NAV BAR--> 
    <?php
        include("../config/config.php");

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
                <span class="user-name">Student</span>
                <i class='profil-icon bx bxs-user-circle'></i>
            </div>
        </nav>


        <div class="sidebar">
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-link">
                    <li class="nav-link">
                        <a href="indx_std.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text text">Dashboard</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="homlist.php">
                            <i class="bx bx-book-open icon"></i>
                            <span class="text nav-text">List of homeworks</span>
                        </a>   
                    </li>
                    <li class="nav-link">
                        <a href="submithom.php" class="active">
                            <i class='bx bx-list-check icon-active'></i>
                            <span class="text nav-text text-active">Submitted homework</span>
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
            <div class="stl">
                <h1>List of homeworks</h1>
            </div>

            <br>

            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Homeworks</th>
                            <th>Date of created</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../config/config.php");

                            $sql = "SELECT students.id_std,submittedhomeworks.id_std, id_sub, sub_date,attachment,submittedhomeworks.grade FROM students ,submittedhomeworks WHERE students.id_std= submittedhomeworks.id_std";
                            $result = $conn->query($sql);

                            
                            // if ($row["attachment"] !== "File not found") {
                            //     $file_path = "../uploads/" . $row["attachment"];
                            //     echo "<a href='" . $file_path . "'><button type='button' class='btn btn-outline-primary' download='" . $row["attachment"] . "'>See</button></a>";
                            // }

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["attachment"] . "</td>"; 
                                    echo "<td>" . $row["sub_date"] . "</td>"; 
                                    echo "<td>" . $row["grade"] . "</td>"; 

                                    echo "<td>";
                                    echo "<a href='edit_hw.php?id_sub=" . $row["id_sub"] . "'><button type='button' class='btn btn-outline-primary'>Edit</button></a>";
                                    $file_path = "../uploads/" . $row["attachment"];
                                    echo "<a href='" . $file_path . "'><button type='button' class='btn btn-outline-primary' download='" . $row["attachment"] . "'>See</button></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</html>
