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
                    A <sphpework management<br/></span> Web site
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
                $username = mysqli_real_escape_string($conn,$_POST['username']);
                $password = mysqli_real_escape_string($conn,$_POST['password']);
                //$type = $_POST['type'];

                $result = mysqli_query($conn,"SELECT u.username, u.password, u.type, s.status
                              FROM users u
                              LEFT JOIN students s ON u.id_user = s.id_user
                              WHERE u.username='$username' AND u.password='$password'") or die("Error!");


                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);

                    if($row['type'] == 'T'){
                        $_SESSION['valid'] = $row['username'];
                        $_SESSION['id_user'] = $row['id_user'];
                        header('location:teacher/hometch.php');
                        exit;
                    } 
                    
                    elseif($row['type'] == 'S') {
                        if($row['status'] == 1){
                            $_SESSION['valid'] = $row['username'];
                            $_SESSION['id_user'] = $row['id_user'];
                            header('location:student/indx_std.php');
                            exit;
                        } 
                        elseif($row['status'] == 0) {
                            echo "<div class='message'>
                                    <p>Wait until your account is approved</p>
                                </div> <br>";
                                echo "<a href='index.php'><button class='btn'>Go Back</button>";
                                exit;
                        }
                    }
                } else {
                    echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                        </div> <br>";
                }
            }
            ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="links">
                    You are a new student ? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
      </div>
    </section>
</body>
</html>