<?php
include("../config/db.php");

$result = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">💄 Our Services</h2>

<div class="row">

<?php while($row = $result->fetch_assoc()) { ?>

<div class="col-md-4">

<div class="card p-3 shadow mb-4">

<h4><?php echo $row['name']; ?></h4>

<p>Price: <?php echo $row['price']; ?> BDT</p>

<a href="booking.php?service_id=<?php echo $row['id']; ?>" class="btn btn-danger">
Book Now
</a>

</div>

</div>

<?php } ?>

</div>

</div>

</body>
</html>