<?php

include('PHP/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/loadAdminHeaderFooter.js"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <title>Admin Home Page</title>
</head>
<body>
    <div id="admin_nav"></div>
    <div class="admin-home-image">
        <img src="Images/placeholder_image.png">
    </div>
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

            <?php
                    
                        if (isset($_GET['message'])){
                            $msg = $_GET['message'];
                            if ($msg == 'FileMissing'){
                                echo '<p style="color:red;font-size:20px; text-align:center;">You need to upload a file</p>';
                            } elseif ($msg == 'Success'){
                                echo '<p style="color:green;font-size:20px; text-align:center;">Upload Successful!</p>';
                            } elseif ($msg == 'DeleteSuccess'){
                                echo '<p style="color:green;font-size:20px; text-align:center;">Delete Successful!</p>';
                            }
                            elseif ($msg == 'InfoMissing'){
                                echo '<p style="color:red;font-size:20px; text-align:center;">You need to fill in all fields!</p>';
                            }
                        }
                    
                    ?>

            <div class="admin-home-buttons">
                <button class="add" name="add_pet">Add Animal</button>
                <!-- <input class="add" type="button" value="Add Animal" name="add_pet"> -->
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
                                    <td><a class="btn bg-warning text-white" href="update_rescue.php?img_id=<?php echo $id?>">Edit</a></td>
                                    <td><a class="btn bg-danger text-white" href="PHP/delete_rescue.php?img_id=<?php echo $id?>">Delete</a></td>
                                    
                                </tr>
                                

                                <?php
                            }

                        }

                        ?>
            </tbody>

            <!-- <tr>
                <td><img src="Images/placeholder_image.png"></td>
                <td>Roxy</td>
                <td>Dog</td>
                <td>Female</td>
                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Voluptatibus maiores deleniti sed debitis architecto, officiis esse minima ut at praesentium quae expedita 
                    dignissimos eligendi eum labore iure veniam atque enim?</td>
                <td>
                    <input class="update" type="button" value="Update Details">
                    <input class="remove" type="button" value="Remove Animal">
                </td>
            </tr>
            <tr>
                <td><img src="Images/placeholder_image.png"></td>
                <td>Phoebe</td>
                <td>Cat</td>
                <td>Female</td>
                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Voluptatibus maiores deleniti sed debitis architecto, officiis esse minima ut at praesentium quae expedita 
                    dignissimos eligendi eum labore iure veniam atque enim?</td>
                <td>
                    <input class="update" type="button" value="Update Details">
                    <input class="remove" type="button" value="Remove Animal">
                </td>
            </tr>
            <tr>
                <td><img src="Images/placeholder_image.png"></td>
                <td>Max</td>
                <td>Dog</td>
                <td>Male</td>
                <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                    Voluptatibus maiores deleniti sed debitis architecto, officiis esse minima ut at praesentium quae expedita 
                    dignissimos eligendi eum labore iure veniam atque enim?</td>
                <td>
                    <input class="update" type="button" value="Update Details">
                    <input class="remove" type="button" value="Remove Animal">
                </td>
            </tr> -->
        </table>
    </div>

    <div id="update-form" class="popup-form" style="display: none;">
        <form>
            <h1>Update Pet Details</h1>
            <label for="update-pet-pic">Upload Picture</label>
            <input type="file" id="update-pet-pic">
            <label for="update-pet-name">Enter Pet Name</label>
            <input type="text" id="update-pet-name">
            <div class="form-together-content">
                <label for="update-pet-type">Enter Pet Type</label>
                <select id="update-pet-type">
                    <option value="select">Select</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="small-pet">Small Pet</option>
                </select>
                <label for="update-pet-gender">Gender</label>
                <select id="update-pet-gender">
                    <option value="select">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <label for="update-pet-description">Description</label>
            <textarea id="update-pet-description" rows="4" cols="50"></textarea>
            <div class="popup-buttons">
                <input type="button" value="Save Changes" class="save-updates" id="save-updates">
                <input type="button" value="Cancel" class="cancel-updates" id="cancel-updates">
            </div>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
             // Open  Update Form
             document.querySelectorAll(".update").forEach((btn) => {
                btn.addEventListener("click", (event) => {
                    const row = event.target.closest("tr");
                    const name = row.children[1]?.textContent || '';
                    const type = row.children[2]?.textContent || '';
                    const gender = row.children[3]?.textContent || '';
                    const description = row.children[4]?.textContent.trim() || '';

                    // Populate the Update Form
                    document.getElementById("update-pet-name").value = name;
                    document.getElementById("update-pet-type").value = type.toLowerCase();
                    document.getElementById("update-pet-gender").value = gender;
                    document.getElementById("update-pet-description").value = description;

                    // Show Pop-Up Form
                    document.getElementById("update-form").style.display = "block";
                    document.body.classList.add("popup-active");
                });
            });
            // Close Update Form
            document.getElementById("cancel-updates").addEventListener("click", () => {
                document.getElementById("update-form").style.display = "none";
                document.body.classList.remove("popup-active");
            });
        });
    </script>
    <div id="admin_footer"></div>
</body>
</html>