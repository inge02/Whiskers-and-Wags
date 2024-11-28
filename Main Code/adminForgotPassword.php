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
    <title>Whiskers & Wags - Admin Forgot Password</title>
</head>
<body>
    <nav>
        <div class="nav_logo">
            <a href="index.html"><img src="Images/whiskers_&_wags_logo.png"></a>
        </div>
    </nav>

    <div class="title_card">
        <h1>FORGOT PASSWORD</h1>
    </div>

    <div class="content">
        <div class="admin_pfp">
            <div class="circle">
                <i class="fa-solid fa-user"></i>
            </div>
        </div>

        <div class="admin_form">
            <form method="post">
                <label for="admin_work_id">Enter Work ID</label><br>
                <input type="text" name="admin_work_id" id="admin_work_id" placeholder="Enter your work ID"><br>

                <label for="admin_email">Enter Email</label><br>
                <input type="text" name="admin_email" id="admin_email" placeholder="Enter your email"><br>

                <label for="admin_new_password">Enter New Password</label><br>
                <input type="password" name="admin_new_password" id="admin_new_password" placeholder="Enter your new password"><br>

                <label for="admin_confirm_password">Confrim New Password</label><br>
                <input type="password" name="admin_confirm_password" id="admin_confirm_password" placeholder="Confirm your new password"><br>

                <?php
                
                if (isset($_POST['next'])){
                    $email = $_POST["admin_email"];
                    $workID = $_POST["admin_work_id"];
                    $new_password = $_POST["admin_new_password"];
                    $pass_confirm = $_POST["admin_confirm_password"];
                    

                    if((!$email)||(!$workID)||(!$new_password)||(!$pass_confirm)){
                        echo '<p style="color:red;font-size:20px; text-align:center;">Fill in all fields</p> <br>'; 
                    } elseif ($new_password !== $pass_confirm) {
                        echo '<p style="color:red;font-size:20px; text-align:center;">Passwords do not match</p> <br>'; 
                    } else {
                        $sanitized_email = mysqli_real_escape_string($conn,$email);
                        $sanitized_workID = mysqli_real_escape_string($conn,$workID);

                        $query = "SELECT email, work_id FROM admins WHERE email = '".$sanitized_email."' AND work_id ='".$sanitized_workID."'";
                        $results = mysqli_query($conn, $query);
                        

                        if (mysqli_num_rows($results) > 0){
                            $row = mysqli_fetch_assoc($results);
                            echo $row["email"];
                            $sanitized_pass = mysqli_real_escape_string($conn,$new_password);
                            $sanitized_conf_pass = mysqli_real_escape_string($conn,$pass_confirm);
                        
                            $pass_hash = password_hash($sanitized_conf_pass, PASSWORD_DEFAULT);
                            $query = "UPDATE admins SET password ='".$pass_hash."' WHERE work_id ='".$sanitized_workID."'";

                            if ($conn->query($query)){
                                echo '<p style="color:green;font-size:20px; text-align:center;">Password Changed</p> <br>'; 
                            } else{
                                echo '<p style="color:red;font-size:20px; text-align:center;">Could not update the password</p> <br>'; 
                            }

                            } else{
                            echo '<p style="color:red;font-size:20px; text-align:center;">Invalid credentials</p> <br>'; 
                        }
                    }
                    
                }
                
                ?>

                <div><button id="next_btn" name="next" class="admin_btn">Next</button></div><br>
            </form>

            <div>
                <button id="back_btn" class="admin_btn" onclick="window.location.href='adminLogin.php'">Back</button>
            </div>

            <div class="admin_links">
                <a href="">Help?</a>
            </div>
        </div>
    </div>

    <div id="admin_footer"></div>
    
</body>
</html>