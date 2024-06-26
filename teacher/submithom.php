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
                        <a href="hometch.php">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
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
                        <a href="submithom.php"  class="active">
                            <i class="bx bx-book-open icon icon-active"></i>
                            <span class="text nav-text  text-active">Submitted homeworks</span>
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

    <?php
        include("../config/config.php");
        $sql = "SELECT id_hom FROM homeworks";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idhom = $row['id_hom']; 
        }
        ?>

    <div class="mytable">
        <div class="row">
            <div class="col-md-12">
            <div class="stl">
                <h1>Submitted homeworks</h1>
            </div>

            <br>


            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Date of submitted</th>
                            <th>Student firstname</th>
                            <th>Student lastname</th>
                            <th>Actions</th>
                            <th>Evalute /100</th>

                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        include("../config/config.php");

                        $sql = "SELECT submittedhomeworks.id_sub, submittedhomeworks.id_std,
                                submittedhomeworks.sub_date, submittedhomeworks.attachment,submittedhomeworks.grade,
                                students.firstname_std, students.lastname_std
                                FROM submittedhomeworks
                                INNER JOIN students ON submittedhomeworks.id_std = students.id_std";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>Task " . $row["id_sub"] . "</td>"; 
                                echo "<td>" . $row["sub_date"] . "</td>"; 
                                echo "<td>" . $row["firstname_std"] . "</td>";  
                                echo "<td>" . $row["lastname_std"] . "</td>";  
                                echo "<td>";

                                $attachment = $row["attachment"];
                                if ($attachment !== "File not found") {
                                    $file_path = "../uploads/" . $attachment;
                                    echo "<a href='" . $file_path . "'><button type='button' class='btn btn-outline-primary' download='" . $attachment . "'>See</button></a>";
                                }

                                echo "</td>";

                                // Add the form inside the table row
                                echo "<td>";
                                echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "'>";
                                echo "<input type='number' name='grade' min='0' max='100'>";
                                echo "<input type='hidden' name='id_sub' value='" . $row["id_sub"] . "'>";
                                echo "<input class='btn' type='submit' value='Submit'>";
                                echo "</form>";
                                echo "</td>";

                                echo "</tr>";
                            }

                            // Handle form submission
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $grade = $_POST["grade"] ?? null;
                                $id_sub = $_POST["id_sub"] ?? null;

                                if ($grade !== null && $id_sub !== null) {
                                    $update_query = "UPDATE submittedhomeworks 
                                                    SET grade = '$grade' 
                                                    WHERE id_sub = $id_sub";

                                    if ($conn->query($update_query) === TRUE) {
                                        echo '<div class="alert alert-success">';
                                        echo '<strong>Evaluated</strong> ';
                                        echo '</div>';
                                    } else {
                                        echo "Error: " . $update_query . "<br>" . $conn->error;
                                    }
                                }
                            }
                        }
                        ?>
                        <script>
                        function submitForm(button) {
                            button.parentElement.style.display = 'none';
                            button.parentElement.nextElementSibling.innerHTML = "<div class='alert alert-success'><strong>Evaluated</strong></div>";
                        }
                        </script>




                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>