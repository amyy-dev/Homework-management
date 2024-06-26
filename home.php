<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
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
    <nav>   
        <div class="nav__content">
            <div class="logo">  
                <a href="#">9rayti.</a>
                <!--<div class="nav-icon">
                    <i class="bx bx-power-off"></i>
                </div>-->            
            </div>
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
                        <a href="#">
                            <i class='bx bx-list-ul icon'></i>
                            <span class="text nav-text">List of students</span>
                        </a>   
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-book-open icon'></i>
                            <span class="text nav-text">List of homeworks</span>
                        </a>   
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">


    </div>

</body>
</html>



