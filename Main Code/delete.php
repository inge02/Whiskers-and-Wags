<?php
    include('Subscribe_data_con.php');

    if (isset($_POST['remove'])) {
        $event_id = $_POST['event_id'];
    
        // Delete the event record from the database
        $query = mysqli_query($conn, "DELETE FROM admin_event WHERE event_id = '$event_id'");
        
        if ($query) {
            echo "<script>alert('Event removed successfully');</script>";
            header("Location: admin_event_page.php"); // Redirect back to the events page
        } else {
            echo "<script>alert('Failed to remove event');</script>";
        }
        header("Location: AdminEvent.php");
    }
    
?>