<?php

include('connect.php');

if ($_GET['pet_id']){
    $id = $_GET['pet_id'];

    $query = "SELECT file_name FROM rescues WHERE rescue_id = '".$id."'";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);
        $file_path = "../Images/Rescues/".$row['file_name'];

        echo $file_path;

        $query = "DELETE FROM rescues WHERE rescue_id = '".$id."'";
        $result = mysqli_query($conn,$query);

        try{
            if (file_exists($file_path)){
                if (unlink($file_path) && $result){
                    header("location:../AdminPet.php?message=DeleteSuccess");
                }
            }
        } catch (Exception $e){
            header("location:../adminGallery.php?message=DeleteFail");
        }

    }

}

?>