<?php

include('PHP/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a3bd937370.js" crossorigin="anonymous"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <script src="JS/loadAdminHeaderFooter.js"></script>
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Whiskers & Wags - Admin Gallery Edit</title>
</head>
<body>
    <div id="admin_nav"></div>

    <div class="title_card">
        <h1>EDIT GALLERY</h1>
        <p></p>
    </div>

    <div class="content">
        <div class='admin_add_form'>
            <h2>Add Gallery Image</h2>
            <div class='add_gallery_form'>
                <form method='post' action='PHP/add_gallery.php' enctype="multipart/form-data">
                    <label for='file'>Upload File</label><br>
                    <input id='file' name='file' type='file' accept="image/*"><br>

                    <label for='desc'>Image Description</label><br>
                    <textarea id='desc' name='desc' maxlength="300"></textarea>

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
                        }
                    
                    ?>

                    <div style='text-align:center;'>
                        <button id='add_img' class='add_img_btn' name='add_img'>Add Image</button>
                    </div>
                    

                </form>
            </div>


        </div>

        

        <div class='admin_table'>
        <h2>Edit Gallery</h2>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>File_Path</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $query = "SELECT * FROM gallery";

                        $result = mysqli_query($conn,$query);

                        if (!$result){
                            die('Query Failed');
                        } else{
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['img_id'];
                                $img_url = 'Images/Gallery/'.$row['file_name'];
                                ?>
                                <tr>
                                    <td><?php echo "<img class='gal_admin_img' id='$id' src='$img_url'>"?></td>
                                    <td><?php echo $row['img_desc']?></td>
                                    <td><?php echo $row['file_name']?></td>
                                    <td><a class="btn bg-warning text-white" href="update_gallery.php?img_id=<?php echo $id?>">Edit</a></td>
                                    <td><a class="btn bg-danger text-white" href="PHP/delete_gallery.php?img_id=<?php echo $id?>">Delete</a></td>
                                    
                                </tr>
                                

                                <?php
                            }

                        }

                        ?>

                    
                    
                </tbody>

            </table>
        </div>

    </div>

    <div id="admin_footer"></div>
    
</body>
</html>