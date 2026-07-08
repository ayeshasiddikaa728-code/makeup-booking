<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM bookings WHERE id=$id");
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>💄 Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../public/style.css">
<script src="../public/script.js"></script>

</head>

<body>

<div class="container mt-4">

<h2 class="text-center text-white mb-4">💄 GlamBook Dashboard</h2>

<?php
$total = $conn->query("SELECT COUNT(*) as t FROM bookings")->fetch_assoc();
?>

<div class="card p-3 text-center mb-4">
    <h4>📊 Total Bookings: <?php echo $total['t']; ?></h4>
</div>

<div class="row">

<?php
$result = $conn->query("
SELECT bookings.*, services.name AS service_name
FROM bookings
JOIN services ON bookings.service_id = services.id
");

while($row = $result->fetch_assoc()){
?>

<div class="col-md-4">
    <div class="card p-3 mb-4">

        <h5 class="text-danger"><?php echo $row['customer_name']; ?></h5>

        <p>💅 Service: <?php echo $row['service_name']; ?></p>
        <p>📅 <?php echo $row['booking_date']; ?></p>
        <p>⏰ <?php echo $row['booking_time']; ?></p>

        <a href="dashboard.php?delete=<?php echo $row['id']; ?>"
        onclick="return confirmDelete()"
        class="btn btn-pink btn-sm">🗑 Delete</a>

    </div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>