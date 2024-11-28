
<?php
include('Subscribe_data_con.php');

// Fetch event details for updating
if (isset($_GET['event_id'])) {
    $id = $_GET['event_id'];

    $results = mysqli_query($conn, "SELECT * FROM admin_event WHERE event_id='$id'");

    if ($results) {
        $row = mysqli_fetch_assoc($results);
        $old_file_name = $row['event_pic'];
        $name = $row['event_name'];
        $start_date = $row['startDate'];
        $end_date = $row['end_date'];
        $venue = $row['venue'];
        $time = $row['event_time'];
        $cost = $row['event_cost'];
        $discription = $row['event_discription'];

        $old_file_path = 'Images/Events/' . $old_file_name;
    }
}

// Handle form submission for updating the event
if (isset($_POST['update'])) {
    $name = $_POST['event_name'];
    $start_date = $_POST['startDate'];
    $end_date = $_POST['end_date'];
    $venue = $_POST['venue'];
    $time = $_POST['event_time'];
    $cost = $_POST['event_cost'];
    $discription = $_POST['event_description'];
    $id = $_POST['event_id']; // Retrieve event ID from hidden input

    $file_size = $_FILES['img_file']['size'];

    if ($file_size > 0) {
        // If a new image is uploaded
        $file_name = $_FILES['img_file']['name'];
        $file_temp = $_FILES['img_file']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_file_name = uniqid('', true) . "." . $file_ext;

        // Update query with the new image
        $query = mysqli_query($conn, "UPDATE admin_event SET event_pic='$new_file_name', event_name='$name',
                            startDate='$start_date', end_date='$end_date', venue='$venue',
                            event_time='$time', event_cost='$cost', event_discription='$discription' WHERE event_id='$id'");

        if ($query) {
            $file_destination = 'Images/Events/' . $new_file_name;
            move_uploaded_file($file_temp, $file_destination);

            if (file_exists($old_file_path)) {
                unlink($old_file_path); // Remove old image
            }
            echo "<script>
                alert('Upload successful');
                window.location.href = 'AdminEvent.php';
              </script>";
        } else {
            die("Query failed: " . mysqli_error($conn));
        }
    } else {
        // If no new image is uploaded
        $query = mysqli_query($conn, "UPDATE admin_event SET event_name='$name',
                            startDate='$start_date', end_date='$end_date', venue='$venue',
                            event_time='$time', event_cost='$cost', event_discription='$discription' WHERE event_id='$id'");

        if ($query) {
            echo "<script>
                alert('Upload successful');
                window.location.href = 'AdminEvent.php';
              </script>";
        } else {
            die("Query failed: " . mysqli_error($conn));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/loadAdminHeaderFooter.js"></script>
    <link href="Styling/Style.css" rel="stylesheet">
    <title>Update Event</title>
</head>
<body>
    <div id="admin_nav"></div>
    <div id="update-form" class="popup-form">
        <form method="POST" enctype="multipart/form-data" action="">
            <!-- Hidden input to store event ID -->
            <input type="hidden" name="event_id" id="event-id" value="<?php echo $id; ?>">

            <h1>Update Event</h1>

            <label for="Event-pic">Upload Picture</label>
            <input name="img_file" type="file" id="Event-pic">

            <label for="event-name">Enter Event Name</label>
            <input name="event_name" type="text" id="event-name" value="<?php echo htmlspecialchars($row['event_name']); ?>" required>

            <div class="event-dates">
                <label for="event-start-date">Start Date</label>
                <input name="startDate" type="date" id="event-start-date" value="<?php echo $row['startDate']; ?>" required>
                <label for="event-end-date">End Date</label>
                <input name="end_date" type="date" id="event-end-date" value="<?php echo $row['end_date']; ?>" required>
            </div>

            <label for="event-venue">Event Venue</label>
            <input name="venue" type="text" id="event-venue" value="<?php echo htmlspecialchars($row['venue']); ?>" required>

            <div class="event-cost-time">
                <label for="event-time">Enter Event Time</label>
                <input name="event_time" type="time" id="event-time" value="<?php echo $row['event_time']; ?>" required>
                <label for="event-cost">Enter Cost</label>
                <input name="event_cost" type="number" id="event-cost" min="0" value="<?php echo $row['event_cost']; ?>" required>
            </div>

            <label for="event-description">Description</label>
            <textarea name="event_description" id="event-description" rows="4" cols="50"><?php echo htmlspecialchars($row['event_discription']); ?></textarea>

            <div class="admin-home-buttons">
                <div class="popup-buttons">
                    <button type="submit" name="update" class="save-updates">Save Changes</button>
                    <button type="button" onclick="location.href='AdminEvent.php'" class="cancel-updates">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div id="admin_footer"></div>
</body>
</html>
