<?php

include('connect.php');

if(isset($_POST['add_pet'])){
    $desc = $_POST['desc'];
    $name = $_POST['pet-name'];
    $breed = $_POST['pet-breed'];
    $type = $_POST['pet-type'];
    $gender = $_POST['pet-gender'];
    $age = $_POST['pet-age'];
    $size = $_POST['pet-size'];

    $img = $_FILES['pet-pic'];
    $file_size= $_FILES['pet-pic']['size'];

    if(empty($desc)||empty($name)||empty($breed)||empty($type)||empty($gender)||empty($age)||empty($size)){
        header("location:../AdminPet.php?message=InfoMissing");
        exit();
    }

    if($file_size > 0){
        $file_name = $_FILES['pet-pic']['name'];
        $file_temp = $_FILES['pet-pic']['tmp_name'];

        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));
    
        // create unique img name
        $new_file_name = uniqid('',true).".".$file_actual_ext;

        $query = "INSERT INTO rescues (name, age, breed, size, gender, description, file_name, category) VALUES ('$name', '$age', '$breed', '$size', '$gender', '$desc', '$new_file_name', '$type')";


        $results = mysqli_query($conn, $query);

        if ($results){
            $file_destination = '../Images/Rescues/'.$new_file_name;

            move_uploaded_file($file_temp, $file_destination);

            header("location:../AdminPet.php?message=Success");
        }
    } else{
        header("location:../AdminPet.php?message=FileMissing");
    }

    


    
}

?>