<?php
    include('Subscribe_data_con.php');
    if (isset($_POST['submit'])) {
        $user_name = $_POST['name'];
        $user_surname = $_POST['surname'];
        $emialAdress = $_POST['email'];
    
        
        $query = mysqli_query($conn, "INSERT INTO newsub (sub_name,sub_surname,sub_email) VALUES ('$user_name','$user_surname','$emialAdress')");


        if ($query) {
            echo "<script>alert('You have been subscribed');</script>";
        } else {
            echo "<script>alert('Oops, something went wrong');</script>";
        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/24a3ca1df6.js" crossorigin="anonymous"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <title>Home Page</title>
    <link rel="icon" type="image/x-icon" href="Icons/icon.ico">
    <script src="JS/loadHeaderFooter.js"></script>
</head>

<body>
    <div id="nav"></div>
    <div class="slider-frame">
        <div class="slide-images">
            <div class="img-container">
                <img src="Images/lab-slidshow.jpg">
            </div>
            <div class="img-container">
                <img src="Images/kitten-slideshow.jpg">
            </div>
            <div class="img-container">
                <img src="Images/bunny-slideshow.jpg">
            </div>
            <div class="img-container">
                <img src="Images/catdog-slideshow.jpg">
            </div>
        </div>
    </div>
    
    <div class="AboutUs"   id="AboutUs">
        <p class="heading">Welcome To</p>
        <img src="Images/whiskers_&_wags_transparent.png">
        <p>Whiskers and Wags is a small, passionate animal adoption business. 
            We rescue and rehabilitate abused and abandoned pets, provide veterinary care, and find loving homes for animals in need.</p>
        <p>Whiskers and Wags began with a simple mission: to give animals in need a second chance. Starting small, we focused on rescuing local strays and helping pets find homes. 
            Over time, we grew into a trusted space for animal care and adoptions, all while staying true to our heartfelt commitment to every pet we help.</p>
    </div>

    <div class="contactUs" id="ContactUs">
        <h1>Contact Us</h1>
        <div class="flip-cards">
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <img src="Images/reception.jpg">
                        <h2>Reception</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                    </div>
                    <div class="theback">
                        <h2>Reception</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                        <a href="/">whiskers&wags@gmail.com</a>
                        <p>4 Lekkerwater Road, Sunnydale
                            FISH HOEK
                        </p>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <img src="Images/kennel.jpg">
                        <h2>Kennels</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                    </div>
                    <div class="theback">
                        <h2>Kennels</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                        <a href="/">AdoptionW&W@gmail.com</a>
                        <p>4 Lekkerwater Road, Sunnydale
                            FISH HOEK
                        </p>
                        <p>Viewing and adoptions from 10h00 - 14h30</p>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <img src="Images/cattery.jpg">
                        <h2>Cattery</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                    </div>
                    <div class="theback">
                        <h2>Cattery</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                        <a href="/">AdoptionW&W@gmail.com</a>
                        <p>4 Lekkerwater Road, Sunnydale
                            FISH HOEK
                        </p>
                        <p>Viewing and adoptions from 10h00 - 14h30</p>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <img src="Images/clinic.jpg">
                        <h2>Clinic</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                        <p><b>Emergency Cell: </b>071 864 4896</p>
                    </div>
                    <div class="theback">
                        <h2>Clinic</h2>
                        <p><b>Cell: </b>021 785 4485</p>
                        <p><b>Emergency Cell: </b>071 864 4896</p>
                        <p><b>Clinic Hours: </b>08h30 to 16h30 (Mon-Sat)</p>
                        <a href="/">whiskers&wags@gmail.com</a>
                        <p>4 Lekkerwater Road, Sunnydale
                            FISH HOEK
                        </p>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront">
                        <img src="Images/abuse.jpg">
                        <h2>Report Abuse</h2>
                        <p><b>Cell: </b>021 785 1310</p>
                    </div>
                    <div class="theback">
                        <h2>Report Abuse</h2>
                        <p><b>Cell: </b>021 785 1310</p>
                        <a href="/">Tears.org@gmail.com</a>
                        <p>Wenga Farm, 21 Kommetjie Road, Sunnydale
                        </p>
                    </div>
                </div>
            </div>
            <div class="maincontainer">
                <div class="thecard">
                    <div class="thefront"> 
                        <img src="Images/rescue-team.jpg">
                        <h2>Rescue Team</h2>
                        <p><b>Cell: </b>021 785 1310</p></div>
                        <div class="theback">
                            <h2>Rescue Team</h2>
                            <p><b>Cell: </b>021 785 1310</p>
                            <a href="/">Tears.org@gmail.com</a>
                            <p>Wenga Farm, 21 Kommetjie Road, Sunnydale
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="subscribe" id="Subscribe">
        <h1>Subscribe</h1>
        <div class="subscribe-layout">
            <div class="list">
                <h2>Benifits of subscribing</h2>
                <ul>
                    <li>Get notified when new pets are available.</li>
                    <li>Stay informed about our events and activities.</li>
                    <li>Access tips, stories, and updates about our rescues.</li>
                    <li>Hear about special adoption opportunities first.</li>
                    <li>Join a network of animal lovers supporting our cause.</li>
                </ul>
            </div>
            <div class="form">
                <form method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="surname">Surname:</label>
                    <input type="text" id="surname" name="surname" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <input class="button" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <div id="footer"></div>
</body>
</html>