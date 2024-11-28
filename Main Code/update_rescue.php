<?php

include('PHP/connect.php');


if(isset($_GET['pet_id'])){
    $id = $_GET['pet_id'];

    $query = "SELECT * FROM rescues WHERE rescue_id = '".$id."'";
    $results = mysqli_query($conn, $query);

    if($results){
        $row = mysqli_fetch_assoc($results);
        $desc = $row['description'];
        $name = $row['name'];
        $breed = $row['breed'];
        $type = $row['category'];
        $gender = $row['gender'];
        $age = $row['age'];
        $size = $row['size'];
        $old_file_name = $row['file_name'];

        $old_file_path= 'Images/Rescues/'.$old_file_name;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Whiskers & Wags - Admin Update Rescue</title>
    <script src="https://kit.fontawesome.com/a3bd937370.js" crossorigin="anonymous"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
</head>
<body>

    <div id="admin_nav"></div>

    <div class="title_card">
        <h1>UPDATE RESCUE DETAILS</h1>
        <p></p>
    </div>

    <br>

    <div class="admin-add-form">
        <form method="post" enctype="multipart/form-data">
            <h1>Add a pet</h1>

            <label>Current Image</label>
            <img src="<?php echo $old_file_path?>">

            <label for="pet-pic">Upload Picture</label>
            <input type="file" id="pet-pic" name="pet-pic">

            <label for="pet-name">Enter Pet name</label>
            <input type="text" id="pet-name" name="pet-name" value="<?php echo $row['name']?>">

            <label for="pet-name">Enter Pet breed</label>
            <input type="text" id="pet-breed" name="pet-breed" value="<?php echo $row['breed']?>">

            <div class="form-together-content">

                <label for="pet-type">Enter Pet Type</label>
                <select id="pet-type" name="pet-type">
                    <option value="<?php echo $row['category']?>"  selected hidden><?php echo $row['category']?></option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Small-pet">Small Pet</option>
                </select>

                <label for="pet-gender">Gender</label>
                <select id="pet-gender" name="pet-gender">
                    <option value="<?php echo $row['gender']?>"  selected hidden><?php echo $row['gender']?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            </div>

            <div class="form-together-content">

                <label for="pet-age">Enter Pet Age</label>
                <select id="pet-age" name="pet-age">
                    <option value="<?php echo $row['age']?>"  selected hidden><?php echo $row['age']?></option>
                    <option value="Juvenile">Juvenile</option>
                    <option value="Adult">Adult</option>
                    <option value="Senior">Senior</option>
                </select>

                <label for="pet-size">Enter Pet Size</label>
                <select id="pet-size" name="pet-size">
                    <option value="<?php echo $row['size']?>"  selected hidden><?php echo $row['size']?></option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>

            </div>

            <label for="pet-discription">Description</label>
            <textarea rows="4" cols="50" name="desc" id="desc" maxlength="300"><?php echo $row['description']?></textarea>

            <div class="admin-home-buttons">
                <button class="add" name="update_pet">Update Animal</button>
            </div>

        </form>
    </div>

    <br>

    <div id="admin_footer"></div>

    <?php
    
    if(isset($_POST['update_pet'])){
        $desc = $_POST['desc'];
        $name = $_POST['pet-name'];
        $breed = $_POST['pet-breed'];
        $type = $_POST['pet-type'];
        $gender = $_POST['pet-gender'];
        $age = $_POST['pet-age'];
        $size = $_POST['pet-size'];

        $img = $_FILES['pet-pic'];
        $file_size= $_FILES['pet-pic']['size'];
    

        if($file_size > 0){
            $file_name = $_FILES['pet-pic']['name'];
            $file_temp = $_FILES['pet-pic']['tmp_name'];
    
            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext));
        
            // create unique img name
            $new_file_name = uniqid('',true).".".$file_actual_ext;
    
            $query = "UPDATE rescues SET name ='".$name."', age='".$age."', breed='".$breed."', size='".$size."', gender='".$gender."', description='".$desc."', file_name='".$new_file_name."', category='".$type."' WHERE rescue_id='".$id."'";
            $results = mysqli_query($conn, $query);
    
            if ($results){
                $file_destination = 'Images/Rescues/'.$new_file_name;
    
                move_uploaded_file($file_temp, $file_destination);

                try{
                    if (file_exists($old_file_path)){
                        if (unlink($old_file_path) && $results){
                            header("location:AdminPet.php?message=UpdateSuccess");
                        }
                    }
                } catch (Exception $e){
                    header("location:AdminPet.php?message=UpdateFail");
                }
            }

        } elseif($file_size == 0){
            $query = "UPDATE rescues SET name ='".$name."', age='".$age."', breed='".$breed."', size='".$size."', gender='".$gender."', description='".$desc."', category='".$type."' WHERE rescue_id='".$id."'";
    
            $results = mysqli_query($conn, $query);
    
            if ($results){
                header("location:AdminPet.php?message=UpdateSuccess");
            } else{
                header("location:AdminPet.php?message=UpdateFail");
            }     
        }
    }
    
    ?>

<script src="JS/loadAdminHeaderFooter.js"></script>

</body>
</html>