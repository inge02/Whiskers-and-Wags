<?php

include('PHP/connect.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styling/Style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a3bd937370.js" crossorigin="anonymous"></script>
    <script src="JS/loadAdminHeaderFooter.js"></script>
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
    <title>Whiskers & Wags - Admin Login</title>
    
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="index.html"><img src="Images/whiskers_&_wags_logo.png"></a>
        </div>
    </nav>

    <div class="title_card">
        <h1>ADMIN LOGIN</h1>
    </div>

    <div class="content">
        <div class="admin_pfp">
            <div class="circle">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>

        <div class="admin_form">
            <form method="post">
                <label for="admin_name">Enter Name</label><br>
                <input type="text" name="admin_name" id="admin_name" placeholder="Enter your name"><br>

                <label for="admin_password">Enter Password</label><br>
                <input type="password" name="admin_password" id="admin_password" placeholder="Enter your password"><br>
                <?php

                if (isset($_POST['login'])){
                    $password = $_POST['admin_password'];
                    $name = $_POST['admin_name'];

                    if((!$password) || (!$name)){
                        echo '<p style="color:red;font-size:20px; text-align:center;">Fill in all fields</p>';
                    } else{
                        $sanitized_name = mysqli_real_escape_string($conn,$name);
                        $sanitized_pass = mysqli_real_escape_string($conn,$password);

                        $query = "SELECT username, password FROM admins where username = '". $sanitized_name."'";
                        $results = mysqli_query($conn, $query);

                        if (mysqli_num_rows($results) > 0){
                            $row = mysqli_fetch_assoc($results);

                            if(password_verify($sanitized_pass,$row['password'])){
                                echo "<script type='text/javascript'> window.location.href='AdminIndex.html'</script>";
                            } else{
                                echo '<p style="color:red;font-size:20px; text-align:center;">Invalid Credentials</p>';
                            }

                        } else{
                            echo '<p style="color:red;font-size:20px; text-align:center;">Invalid Credentials</p>';
                        }
                    }
                }

                if (isset($_POST['back'])){
                    echo "<script type='text/javascript'> window.location.href='index.html'</script>";
                }

            ?>
            <br>
                <div><button id="login_btn" name="login" class="admin_btn">Login</button></div>
                <br>
                <div><button id="login_back_btn" name="back" class="admin_btn">Back</button></div>
            </form>
            <br>

            

            <div class="admin_links evenly_distribute_children">
                <a href="adminForgotPassword.php">Forgot Password?</a>
                <a href="">Help?</a>
            </div>
        </div>
    </div>

    <!-- replaced with footer -->
    <div id="admin_footer"></div>

</body>
</html>