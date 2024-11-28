<?php

include('PHP/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styling/Style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
    <title>Whiskers & Wags - Admin Edit Pets</title>
    <script src="https://kit.fontawesome.com/a3bd937370.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="admin_nav"></div>

    <div class="title_card">
        <h1>RESCUE DETAILS</h1>
    </div>

    <br>

    <?php
                    
        if (isset($_GET['message'])){
            $msg = $_GET['message'];
            if ($msg == 'FileMissing'){
                echo '<p style="color:red;font-size:20px; text-align:center;">You need to upload a file</p>';
            } elseif ($msg == 'Success'){
                echo '<p style="color:green;font-size:20px; text-align:center;">Upload Successful!</p>';
            } elseif ($msg == 'DeleteSuccess'){
                echo '<p style="color:green;font-size:20px; text-align:center;">Delete Successful!</p>';
            } elseif ($msg == 'InfoMissing'){
                echo '<p style="color:red;font-size:20px; text-align:center;">You need to fill in all fields!</p>';
            } elseif ($msg == 'UpdateSuccess'){
                echo '<p style="color:green;font-size:20px; text-align:center;">Pet detials updated successfully!</p>';
            } elseif ($msg == 'UpdateFail'){
                echo '<p style="color:red;font-size:20px; text-align:center;">Pet detials could not update</p>';
            }
        }
                    
    ?>

    <div class="admin-add-form">

        <form method="post" enctype="multipart/form-data" action='PHP/add_rescue.php'>

            <h1>Add a pet</h1>

            <label for="pet-pic">Upload Picture</label>
            <input type="file" id="pet-pic" name="pet-pic">

            <label for="pet-name">Enter Pet name</label>
            <input type="text" id="pet-name" name="pet-name">

            <label for="pet-name">Enter Pet breed</label>
            <input type="text" id="pet-breed" name="pet-breed">

            <div class="form-together-content">

                <label for="pet-type">Enter Pet Type</label>
                <select id="pet-type" name="pet-type">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Small-pet">Small Pet</option>
                </select>

                <label for="pet-gender">Gender</label>
                <select id="pet-gender" name="pet-gender">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            </div>

            <div class="form-together-content">

                <label for="pet-age">Enter Pet Age</label>
                <select id="pet-age" name="pet-age">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Juvenile">Juvenile</option>
                    <option value="Adult">Adult</option>
                    <option value="Senior">Senior</option>
                </select>

                <label for="pet-size">Enter Pet Size</label>
                <select id="pet-size" name="pet-size">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>

            </div>

            <label for="pet-discription">Discription</label>
            <textarea rows="4" cols="50" name="desc" id="desc" maxlength="300"></textarea>

            <div class="admin-home-buttons">
                <button class="add" name="add_pet">Add Animal</button>
            </div>
        </form>
    </div>

    <div class="admin-home-table">
        <table>
            <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Breed</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>

            <?php
                $query = "SELECT * FROM rescues";

                $result = mysqli_query($conn,$query);

                if (!$result){
                     die('Query Failed');
                    } else{
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['rescue_id'];
                            $img_url = 'Images/Rescues/'.$row['file_name'];
            ?>
                    <tr>
                        <td><?php echo "<img class='gal_admin_img' id='$id' src='$img_url'>"?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['age']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><?php echo $row['breed']?></td>
                        <td><a class="btn bg-warning text-white" href="update_rescue.php?pet_id=<?php echo $id?>">Edit</a></td>
                        <td><a class="btn bg-danger text-white" href="PHP/delete_rescue.php?pet_id=<?php echo $id?>">Delete</a></td>
                                    
                    </tr>
                                
            <?php
                    }
                }
            ?>

            </tbody>
        </table>
    </div>

    <div id="admin_footer"></div>

    <script src="JS/loadAdminHeaderFooter.js"></script>

</body>
</html>