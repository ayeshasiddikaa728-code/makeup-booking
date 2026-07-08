<?php
include('../config/db.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>💄 Services</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<h2 class="text-center text-white mb-4">💅 Our Services</h2>

<div class="row">

<?php
$result = $conn->query("SELECT * FROM services");

while($row = $result->fetch_assoc()){
?>

<div class="col-md-4">
    <div class="card p-3 mb-4 text-center">

        <h5><?php echo $row['name']; ?></h5>
        <p>💰 <?php echo $row['price']; ?> BDT</p>

        <a href="booking.php?id=<?php echo $row['id']; ?>" 
        class="btn btn-pink">Book Now</a>

    </div>
</div>

<?php } ?>

</div>

</div>

</body>
</html>