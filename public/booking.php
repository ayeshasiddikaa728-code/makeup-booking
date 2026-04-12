<?php $service_id = $_GET['service_id']; ?>

<form action="submit_booking.php" method="POST">
    <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">

    Name: <input type="text" name="name" required><br>
    Date: <input type="date" name="date" required><br>
    Time: <input type="time" name="time" required><br>

    <button type="submit">Book Now 💅</button>
</form>