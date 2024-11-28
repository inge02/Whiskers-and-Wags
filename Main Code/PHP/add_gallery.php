<?php

include('connect.php');

if(isset($_POST['add_img'])){
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

        $query = "INSERT INTO gallery (img_desc, file_name) VALUES ('".$desc."', '".$new_file_name."' )";

        $results = mysqli_query($conn, $query);

        if ($results){
            $file_destination = '../Images/Gallery/'.$new_file_name;

            move_uploaded_file($file_temp, $file_destination);

            header("location:../adminGallery.php?message=Success");
        }
    } else{
        header("location:../adminGallery.php?message=FileMissing");
    }

    


    
}

?>