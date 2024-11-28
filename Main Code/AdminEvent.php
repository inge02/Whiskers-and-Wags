<?php
    include('Subscribe_data_con.php');
    if (isset($_POST['submit'])) {
        $event_img = $_FILES['img_file'];
        $name = $_POST['event_name'];
        $start_date = $_POST['start-date'];
        $end_date = $_POST['end-date'];
        $venue = $_POST['venue'];
        $time = $_POST['event-time'];
        $cost = $_POST['event-cost'];
        $discription = $_POST['event-description'];

        $file_name = $_FILES['img_file']['name'];
        $file_temp = $_FILES['img_file']['tmp_name'];
 
        $file_ext = explode('.', $file_name);
        $file_actual_ext = strtolower(end($file_ext));
   
        // create unique img name
        $new_file_name = uniqid('',true).".".$file_actual_ext;
    
        $query = mysqli_query($conn, "INSERT INTO admin_event (event_pic,event_name,startDate,end_date,venue,event_time,event_cost,event_discription) 
        VALUES ('$new_file_name','$name','$start_date','$end_date','$venue','$time','$cost','$discription')");


        if ($query) {
            $file_destination = 'Images/Events/'.$new_file_name;
            move_uploaded_file($file_temp, $file_destination);
            echo "<script>alert('You have added an event');</script>";
        } else {
            echo "<script>alert('Oops, something went wrong');</script>";
        }
    }






    // if (isset($_POST['update'])){
    //     $event_img = $_FILES['img_file'];
    //     $name = $_POST['event_name'];
    //     $start_date = $_POST['startDate'];
    //     $end_date = $_POST['end_date'];
    //     $venue = $_POST['venue'];
    //     $time = $_POST['event_time'];
    //     $cost = $_POST['event_cost'];
    //     $discription = $_POST['event_description'];

    //     $query = mysqli_query($conn,"UPDATE admin_event SET img_file='$event_img', event_name='$name,
    //                          startDate='$start_date', end_date='$end_date', venue='$venue',
    //                          event_time='$time', event_cost='$cost', event_discription='$discription' ,WHERE event_id=?");

    //     if ($query) {
    //         $file_destination = 'Images/Events/'.$new_file_name;
    //         move_uploaded_file($file_temp, $file_destination);
    //         echo "<script>alert('Event updated successfully');</script>";
    //     } else {
    //         echo "<script>alert('Oops, something went wrong');</script>";
    //     }
        
    // }

    // if (isset($_POST['update'])) {
    //     $event_id = $_POST['event_id']; // Get the event_id
    //     $event_name = $_POST['event_name'];
    //     $start_date = $_POST['startDate'];
    //     $end_date = $_POST['end_date'];
    //     $venue = $_POST['venue'];
    //     $time = $_POST['event_time'];
    //     $cost = $_POST['event_cost'];
    //     $description = $_POST['event_description'];
    
    //     // Handle file upload
    //     $event_img = $_FILES['img_file'];
    //     if ($event_img['error'] == 0) {
    //         $file_name = $event_img['name'];
    //         $file_temp = $event_img['tmp_name'];
    //         $file_ext = explode('.', $file_name);
    //         $file_actual_ext = strtolower(end($file_ext));
    
    //         // create unique img name
    //         $new_file_name = uniqid('',true).".".$file_actual_ext;
    
    //         // Move file to destination
    //         $file_destination = 'Images/Events/'.$new_file_name;
    //         move_uploaded_file($file_temp, $file_destination);
    //     } else {
    //         // If no new image, keep the old one (optional)
    //         $new_file_name = $old_file_name; // You should load the current file name from the database if needed
    //     }
    
    //     $query = mysqli_query($conn, "UPDATE admin_event SET event_pic='$new_file_name', event_name='$event_name', startDate='$start_date', end_date='$end_date', venue='$venue', event_time='$time', event_cost='$cost', event_discription='$description' WHERE event_id='$event_id'");
    
    //     if ($query) {
    //         echo "<script>alert('Event updated successfully');</script>";
    //     } else {
    //         echo "<script>alert('Oops, something went wrong');</script>";
    //     }
    // }
    

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/loadAdminHeaderFooter.js"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <title>Admin Event Page</title>
    
</head>
<body>
    <div id="admin_nav"></div>
    <div class="admin-home-image">
        <img src="Images/placeholder_image.png" alt="Admin Header Image">
    </div>
    <div class="admin-add-form">
        <form method="post" enctype="multipart/form-data">
            <h1>Add an Event</h1>
            <label for="Event-pic">Upload Picture</label>
            <input name="img_file" type="file" id="Event-pic">
            <label for="event-name">Enter Event Name</label>
            <input name="event_name" type="text" id="event-name" required>
            <div class="event-dates">
                <label for="event-start-date">Start Date</label>
                <input name="start-date" type="date" id="event-start-date" required>
                <label for="event-end-date">End Date</label>
                <input name="end-date" type="date" id="event-end-date" required>
            </div>
            <label for="event-venue">Event Venue</label>
            <input name="venue" type="text" id="event-venue" required>
            <div class="event-cost-time">
                <label for="event-time">Enter Event Time</label>
                <input name="event-time" type="time" id="event-time" required>
                <label for="event-cost">Enter Cost</label>
                <input name="event-cost" type="number" id="event-cost" min="0"  required>
            </div>
            <label for="event-description">Description</label>
            <textarea name="event-description" id="event-description" rows="4" cols="50"></textarea>
            <div class="admin-home-buttons">
                <button class="add" type="submit" name="submit">Add Event</button>
            </div>
        </form>
    </div>


    <?php
    $result = mysqli_query($conn,"SELECT * FROM admin_event");
    ?>
    <div class="admin-home-table">
        <table>
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Venue</th>
                    <th>Time</th>
                    <th>Cost</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr data-id="<?= $row['event_id'] ?>">
                    <td><img src="Images/Events/<?= $row['event_pic'] ?>" alt="Event Picture" width="100"></td>
                    <td><?= $row['event_name'] ?></td>
                    <td><?= $row['startDate'] ?></td>
                    <td><?= $row['end_date'] ?></td>
                    <td><?= $row['venue'] ?></td>
                    <td><?= $row['event_time'] ?></td>
                    <td>R<?= $row['event_cost'] ?></td>
                    <td><?= $row['event_discription'] ?></td>
                    <td>
                        <form method="GET" action="Eventupdate.php">
                            <input type="hidden" name="event_id" value="<?= $row['event_id'] ?>">
                            <button type="submit" class="update" name="update">Update</button>
                        </form>

                        <form method="POST" action="delete.php">
                            <input type="hidden" name="event_id" value="<?= $row['event_id'] ?>">
                            <button type="submit" class="remove" name="remove">Remove</button>
                        </form>

                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>


    <script>
        document.querySelectorAll(".update").forEach((btn) => {
            btn.addEventListener("click", (event) => {
                const row = event.target.closest("tr");
                const id = row.dataset.id; // Correctly grab the event ID
                
                // Populate the form fields with the event data
                document.getElementById("event-id").value = id;
                document.getElementById("event-name").value = row.children[1].textContent.trim();
                document.getElementById("start-date").value = row.children[2].textContent.trim();
                document.getElementById("end-date").value = row.children[3].textContent.trim();
                document.getElementById("venue").value = row.children[4].textContent.trim();
                document.getElementById("event-time").value = row.children[5].textContent.trim();
                document.getElementById("event-cost").value = row.children[6].textContent.trim();
                document.getElementById("event-description").value = row.children[7].textContent.trim();

                // Show the update form
                document.getElementById("update-form").style.display = "block";
            });
        });


    </script>
    <div id="admin_footer"></div>
</body>
</html>
