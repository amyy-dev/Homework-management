<?php 
session_start();
include("../config/config.php");


// Get the submitted homework ID from the URL
$id_sub = isset($_GET['id_sub']) ? $_GET['id_sub'] : null;

// Fetch submitted homework details
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $id_sub !== null) {
    $sql = "SELECT * FROM submittedhomeworks WHERE id_sub = $id_sub"; // تحديد قيمة $id_sub
    $result = $conn->query($sql);

    if (!$result) {
        echo "An error occurred while executing the query";
    } else {
        $row = $result->fetch_assoc();
        $attachment = $row['attachment'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تحديد قيمة $id_sub في حالة إرسال البيانات عبر POST
    $id_sub = isset($_POST['id_sub']) ? $_POST['id_sub'] : null;
    $new_attachment = $_POST['new_attachment'];

    $update_query = "UPDATE submittedhomeworks SET attachment = '$new_attachment' WHERE id_sub = $id_sub"; // تحديد قيمة $id_sub
    $update_result = $conn->query($update_query);

    if ($update_result) {
        header("Location: HWsubmited.php");
        exit();
    } else {
        echo "An error occurred while updating information";
    }
}
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
    <title>9rayti.</title>

<script src="ckeditor/ckeditor.js"></script>

</head>
<body>   

<!--NAV BAR--> 

    <nav>   
        <div class="nav__content">
            <div class="logo">  
                <a href="#">9rayti.</a>        
            </div>
            <!-- <span class="user-name"><?php echo $userName; ?></span> -->
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
                        <a href="HWsubmited.php" class="active">
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
        <h1>Edit Homework</h1>
    </div> 
</div>

<div class="row white-background">
    <div class="col-md-12"> 
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id_sub" value="<?php echo $id_sub; ?>">
            <div class="row">
                <div class="col-md-2">
                    <label for="file" class="form-label">Select file here</label>
                </div>
                <div class="col-md-10">
                    <input type="file" name="new_attachment" id="new_attachment">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
            </div>
        </form>  
    </div> 
</div>
<!-- <div class="row">
  <div class="col-md-12">
    <h1>Edit Homework</h1>
  </div>
  <div class="col-md-2">
    <label for="file" class="form-label">Select file here</label>
  </div>
  <div class="col-md-10">
    <input type="file" name="new_attachment" id="new_attachment" class="form-control">
  </div>
  <div class="col-md-12 mt-3">
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
</div> -->
</div>

</body>
</html>
