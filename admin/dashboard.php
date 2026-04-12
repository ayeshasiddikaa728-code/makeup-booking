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
<title>💄 GlamBook Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#ff9a9e,#fad0c4);
    font-family: Arial;
}

.card{
    border:none;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
    margin-bottom:15px;
}

.header{
    text-align:center;
    color:white;
    margin-top:20px;
    margin-bottom:20px;
}
</style>
</head>

<body>

<div class="header">
    <h1>💄 GlamBook Dashboard</h1>
    <p>Manage all bookings 💅</p>
</div>

<div class="container">

<?php
//  TOTAL BOOKINGS
$total = $conn->query("SELECT COUNT(*) as t FROM bookings")->fetch_assoc();
?>

<div class="card p-3 text-center mb-4">
    <h4>📊 Total Bookings: <?php echo $total['t']; ?></h4>
</div>

<div class="row">

<?php
//  BOOKING LIST
$result = $conn->query("
SELECT bookings.*, services.name AS service_name
FROM bookings
JOIN services ON bookings.service_id = services.id
");

while($row = $result->fetch_assoc()){
?>

<div class="col-md-4">
    <div class="card p-3">

        <h5 class="text-danger"><?php echo $row['customer_name']; ?></h5>

        <p> Service: <?php echo $row['service_name']; ?></p>
        <p> Date: <?php echo $row['booking_date']; ?></p>
        <p> Time: <?php echo $row['booking_time']; ?></p>

        <a href="dashboard.php?delete=<?php echo $row['id']; ?>"
           onclick="return confirm('Delete this booking?')"
           class="btn btn-danger btn-sm">
           🗑 Delete
        </a>

    </div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>