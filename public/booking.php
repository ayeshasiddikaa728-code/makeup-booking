<?php
include("../config/db.php");

if(!isset($_GET['service_id'])){
    die("Invalid Service");
}

$service_id = $_GET['service_id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Booking</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<form action="submit_booking.php" method="POST">

<input type="hidden" name="service_id" value="<?php echo $service_id; ?>">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Date</label>
<input type="date" name="date" class="form-control" required>
</div>

<div class="mb-3">
<label>Time</label>
<input type="time" name="time" class="form-control" required>
</div>

<button class="btn btn-danger">
Book Now 💄
</button>

</form>

</div>

</body>
</html>