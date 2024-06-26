
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

        session_start(); 

        $userId = $_SESSION['id_user']; 

        
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
            <div class="stl">
                <h1>List of homeworks</h1>
                <button type="button" class="btn" onclick="toggleForm()">Add new homework</button>
            </div>
            <form method="post" action="submit.php" id="homeworkForm" style="display: none;" enctype="multipart/form-data">
                <br>
                <textarea name="homework" id="homework" rows="5" cols="124" placeholder="Set homework description here"></textarea>
                <div class="row">
                    <div class="col-md-2"><label for="file" class="form-label">Select file here</label></div>
                    <div class="col-md-10"><input type="file" class="form-control" name="file" id="file"></div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>

            <script>
                function toggleForm() {
                    var form = document.getElementById("homeworkForm");
                    if (form.style.display === "none") {
                        form.style.display = "block";
                    } else {
                        form.style.display = "none";
                    }
                }
            </script>

            <?php 
                include("../config/config.php");
            ?>
            <br>


            <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Homeworks</th>
                            <th>Date of created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../config/config.php");

                            $sql = "SELECT id_hom, created FROM homeworks";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>Task " . $row["id_hom"] . "</td>"; 
                                    echo "<td>" . $row["created"] . "</td>"; 
                                    echo "<td>";
                                    echo "<a href='show.php?id_hom=" . $row["id_hom"] . "'><button type='button' class='btn btn-outline-primary'>Show</button></a>";
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
