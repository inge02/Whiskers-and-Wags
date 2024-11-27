<?php

include('connect.php');

$query = "SELECT * FROM gallery";

$results = mysqli_query($conn,$query);

if(mysqli_num_rows($results)> 0){
    while ($row=mysqli_fetch_array($results)){
        $id = $row['img_id'];
        $file_name = $row['file_name'];
        $desc = $row['img_desc'];

        $img_url = "Images/Gallery/".$file_name;

        echo "<img class='gal_img' src='$img_url' id='$id' data-desc='$desc'>";
    }
}

?>