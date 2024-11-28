<?php
        // vars for filters
        $age_filter = "";
        $size_filter = "";
        $gender_filter ="";
        $category = isset($_GET['category']) ? $_GET['category']: '';

        //check if apply is clicked
        if (isset($_POST["apply"])){
            // if dropdowns not empty set filter to be as set in dropdown
            if (!empty($_POST["age"])){
                $age_filter = $_POST["age"];
            }
            if (!empty($_POST["gender"])){
                $gender_filter = $_POST["gender"];
            }
            if (!empty($_POST["size"])){
                $size_filter = $_POST["size"];
            }
        }

        $query = "SELECT * FROM rescues";

        // if there are filters add them to the query
        $filters = [];
        if($age_filter){
            $filters[] = "age = '$age_filter'";
        }
        if($size_filter){
            $filters[] = "size = '$size_filter'";
        }
        if($gender_filter){
            $filters[] = "gender = '$gender_filter'";
        }
        if($category){
            $filters[] = "category = '$category'";
        }

        if(!empty($filters)){
            $query .= " WHERE " .implode(" AND ", $filters);
        }

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $id = $row["rescue_id"];
                $name = $row["name"];
                $age = $row["age"];
                $breed = $row["breed"];
                $size = $row["size"];
                $gender = $row["gender"];
                $description = $row["description"];
                $file = $row["file_name"];

                $img_url = "Images/Rescues/".$file;

                echo "<img class='pet_pf' src='$img_url' id='$id' data-name='$name' data-age='$age' data-breed='$breed' data-size='$size' data-gender='$gender' data-desc='$description'>";

            }
        } else{
            echo "<h5>There are no pets that fit the criteria!</h5> <img style='width:200px; height:200px' src='GIFs/magnifying-glass.gif'>";
        }
        ?>