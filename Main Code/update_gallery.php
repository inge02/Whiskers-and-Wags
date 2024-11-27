<?php

include('PHP/connect.php');


if(isset($_GET['img_id'])){
    $id = $_GET['img_id'];

    $query = "SELECT * FROM gallery WHERE img_id = '".$id."'";
    $results = mysqli_query($conn, $query);

    if($results){
        $row = mysqli_fetch_assoc($results);
        $desc = $row['img_desc'];
        $old_file_name = $row['file_name'];

        $old_file_path= 'Images/Gallery/'.$old_file_name;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a3bd937370.js" crossorigin="anonymous"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <script src="JS/loadAdminHeaderFooter.js"></script>
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
</head>
<body>

    <div id="admin_nav"></div>

    <div class="title_card">
        <h1>UPDATE GALLERY IMAGE</h1>
        <p></p>
    </div>

    <div class='content'>
    <div class='admin_add_form'>
            <h2>Change Gallery Image Information</h2>
            <div class='add_gallery_form'>
                <form method='post' enctype="multipart/form-data">
                    <label>Current Image</label>
                    <img src='<?php echo $old_file_path?>'> <br>
                
                    <label for='file'>Change Image</label><br>
                    <input id='file' name='file' type='file' accept="image/*"><br>

                    <label for='desc'>Image Description</label><br>
                    <textarea id='desc' name='desc' maxlength="300"><?php echo $row['img_desc']?></textarea>

                    <div style='text-align:center;'>
                        <button class='add_img_btn' name='update_img'>Update Image</button>
                    </div>
                    

                </form>
            </div>



        </div>
        <br>


    </div>

    <div id="admin_footer"></div>

    <?php
    
    if(isset($_POST['update_img'])){
        $desc = $_POST['desc'];
        $img = $_FILES['file'];
        $file_size= $_FILES['file']['size'];

        if($file_size > 0){
            $file_name = $_FILES['file']['name'];
            $file_temp = $_FILES['file']['tmp_name'];
    
            $file_ext = explode('.', $file_name);
            $file_actual_ext = strtolower(end($file_ext));
        
            // create unique img name
            $new_file_name = uniqid('',true).".".$file_actual_ext;
    
            $query = "UPDATE gallery SET img_desc ='".$desc."', file_name ='".$new_file_name."' WHERE img_id='".$id."' ";
    
            $results = mysqli_query($conn, $query);
    
            if ($results){
                $file_destination = 'Images/Gallery/'.$new_file_name;
    
                move_uploaded_file($file_temp, $file_destination);

                try{
                    if (file_exists($old_file_path)){
                        if (unlink($old_file_path) && $results){
                            header("location:adminGallery.php?message=UpdateSuccess");
                        }
                    }
                } catch (Exception $e){
                    header("location:adminGallery.php?message=UpdateFail");
                }
            }
        } elseif($file_size == 0){
            $query = "UPDATE gallery SET img_desc ='".$desc."' WHERE img_id='".$id."' ";
    
            $results = mysqli_query($conn, $query);
    
            if ($results){
                header("location:adminGallery.php?message=UpdateSuccess");
            } else{
                header("location:adminGallery.php?message=IpdateFail");
            }
                    
                }
            }
    
    ?>
    
</body>
</html>