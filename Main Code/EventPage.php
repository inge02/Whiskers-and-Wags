<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styling/Style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a3bd937370.js" crossorigin="anonymous"></script>
    <script src="JS/loadHeaderFooter.js"></script>
    <title>Event Page</title>
</head>
<body>
    <div id="nav"></div>
    <?php
    include('Subscribe_data_con.php');
    $result = mysqli_query($conn,"SELECT * FROM admin_event");
    ?>
    <div class="event-cards">
        <table>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr data-id="<?= $row['event_id'] ?>">
                        <td><img src="Images/Events/<?= $row['event_pic'] ?>" alt="Event Picture" width="100"></td>
                        <td>
                            <diV class="Table-text">
                                <h2><?= $row['event_name'] ?></h2>
                                <p><?= $row['startDate'] ?></p>
                                <p><?= $row['end_date'] ?></p>
                                <p><?= $row['venue'] ?></p>
                                <p><?= $row['event_time'] ?></p>
                                <p>R<?= $row['event_cost'] ?></p>
                                <button onclick="alert('You have been RSVPed')">RSVP</button>
                                <p><?= $row['event_discription'] ?></p>
                            </diV>    
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>




        
        
    </div>
    <div id="footer"></div>
    
</body>
</html>