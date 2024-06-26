<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>9rayti.</title>
</head>

<body>
    <nav>   
        <div class="nav__content">
            <div class="logo"><a href="#">9rayti.</a></div>
        </div>
    </nav>

    <section class="section">
        <div class="section__container">
            <div class="content">
                <h1 class="title">
                 A <span>Homework management<br/></span> Web site
                </h1>
                <p class="description">
                Planner web site supports rotation schedules,
                as well as traditional weekly schedules. 
                <b>9rayti</b> allows you to enter your school subjects, 
                organize your workload, and enter information 
                about your classes–all so you can effortlessly 
                keep on track of your school calendar.
                </p>
            </div>

        <div class="container">
            <div class="box form-box">
                <?php 
                include("config/config.php");

                if(isset($_POST['submit'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $firstname_std = $_POST['firstname_std'];
                    $lastname_std = $_POST['lastname_std'];
                    $db_std = $_POST['db_std'];
                    $placebd_std = $_POST['placebd_std'];

                    $verify_query = mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");

                    if(mysqli_num_rows($verify_query) !=0 ){
                        echo "<div class='message'>
                                <p>This username is used! Try another one, please!</p>
                            </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        $query = "INSERT INTO users (username, password, type) VALUES ('$username', '$password', 'S')";
                        mysqli_query($conn, $query);
                        $id_user = mysqli_insert_id($conn); 

                        $query_student = "INSERT INTO students (id_user, firstname_std, lastname_std, db_std, placebd_std,status) 
                                        VALUES ('$id_user', '$firstname_std', '$lastname_std', '$db_std','$placebd_std','0')";
                        mysqli_query($conn, $query_student);

                        echo "<div class='message'>
                                <p>Registration successful!</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Login Now</button>";
                    }
                } else {
                ?>
                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="firstname_std">Firstname</label>
                        <input type="text" name="firstname_std" id="firstname_std" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="lastname_std">Lastname</label>
                        <input type="text" name="lastname_std" id="lastname_std" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="datebd_std">Date of birth</label>
                        <input type="date" name="db_std" id="datebd_std" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="placebd_std">Place of birth</label>
                        <input type="text" name="placebd_std" id="placebd_std" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="index.php">Sign In</a>
                    </div>
                </form>
            </div>
            <?php } ?>
            </div>
        </div>
    </section>
</body>
</html>
