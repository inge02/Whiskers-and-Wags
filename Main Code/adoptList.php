<?php

include('PHP/connect.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Title</title>

    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">

    <link rel="stylesheet" href="Styling/Style.css">
    <script src="JS/loadHeaderFooter.js"></script>

    <!-- links and scripts for bootstrap modal -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>
<body>

    <!--gets replaced with Navbar.html-->
    <div id="nav"></div>


    <!-- dropdowns -->
    <form method="post">

        <div class="adopt_dropdowns evenly_distribute_children">
            <div>
                <h5>Age</h5>
                <select id="adopt_age" name="age">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Puppy">Puppy</option>
                    <option value="Adult">Adult</option>
                    <option value="Senior">Senior</option>
                </select>
            </div>

            <div>
                <h5>Gender</h5>
                <select id="adopt_gender" name="gender">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div>
                <h5>Size</h5>
                <select id="adopt_size" name="size">
                    <option value="" disabled selected hidden>Select</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>
        </div>

        <div style="text-align: center;">
            <button id="apply_filters_btn" name="apply" class="adopt_filter_btn">Apply Filters</button>
            <button id="clear_filters_btn" name="clear" class="adopt_filter_btn">Clear Filters</button>
        </div>
        <br>

    </form>


    <div class="adopt_imgs">
        <?php
            include("PHP/loadPetRecords.php");
        ?>
    </div>

    <!-- bootstrap modal -->
    <div id="pet_modal" class="modal" tabindex="-1" role="dialog" style="display: none; background-color: #d7e7f6;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4 id="modal_pet_name" class="modal-title">Modal title</h4>
                    <button id="close_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <img id="modal_pet_img" src="" style="width:100%;">
                </div>

                <hr>

                <div class="modal-body">
                    <h5>Age</h5>
                    <p id="modal_pet_age">a</p>

                    <h5>Size</h5>
                    <p id="modal_pet_size">s</p>

                    <h5>Breed</h5>
                    <p id="modal_pet_breed">b</p>

                    <h5>Gender</h5>
                    <p id="modal_pet_gender">g</p>

                    <h5>Description</h5>
                    <p id="modal_pet_desc">d</p>

                </div>

                <hr>

                <div class="modal-body">
                    <h5>Adopt Me?</h5>
                    <p>Will you be my forever home? <br>
                    Please fill out <a href="">this form</a> to apply to adopt a pet and send it to our <a href="">email</a>!</p>
                </div>

            </div>
        </div>
    </div>

    <!--gets replaced with Footer.html-->
    <div id="footer"></div>

    <script src="JS/adoptList.js"></script>
    
</body>
</html>