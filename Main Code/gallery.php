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
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
    <script src="JS/loadHeaderFooter.js"></script>
    <title>Whiskers & Wags - Gallery</title>
</head>
<body>
    <div id="nav"></div>

    <div class="title_card">
        <h1>GALLERY</h1>
        <p>Explore heartwarming moments and joyful snapshots of our amazing pets.<br>
        Each photo captures the charm, personality, and joy of our beloved pets.<br>
        Whether it’s a wagging tail, a curious gaze, or a cozy cuddle, these snapshots are sure to warm your heart and bring a smile to your face!<br>
        </p>
    </div>

    <div class="gallery_imgs">
        <?php
            include('PHP/loadGalleryImgs.php')
        ?>
    </div>

    <!-- bootstrap modal -->
    <div id="gallery_modal" class="modal" tabindex="-1" role="dialog" style="display: none; background-color: #d7e7f6;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button id="close_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p id="modal_gal_desc">a</p>

                </div>
                <hr>

                <div class="modal-body">
                    <img id="modal_gal_img" src="" style="width:100%;">
                </div>

            </div>
        </div>
    </div>

    <div id="footer"></div>

    <script>
        const modal = document.getElementById('gallery_modal');
        const modalGalDesc = document.getElementById('modal_gal_desc');
        const modalGalImg = document.getElementById('modal_gal_img');
        const closeModal = document.getElementById('close_btn');

        document.querySelectorAll('.gal_img').forEach(img =>{
            img.addEventListener('click', () =>{
                modalGalDesc.textContent = img.dataset.desc;
                modalGalImg.src = img.src;
                modal.style.display = 'block';
            })
        })

        closeModal.addEventListener('click', () =>{
            modal.style.display = "none";
        });

    </script>
    
</body>
</html>