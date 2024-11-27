<?php

include('connect.php');

if ($_GET['img_id']){
    $id = $_GET['img_id'];
    $query = "DELETE FROM gallery WHERE img_id = '".$id."'";
    $result = mysqli_query($conn,$query);

    if($result){
        header("location:../adminGallery.php?message=DeleteSuccess");
    }

}

?>