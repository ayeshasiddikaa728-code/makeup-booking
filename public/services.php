<?php
include(__DIR__ . '/../config/db.php');
?>

<h2> Our Services</h2>

<?php
$result = $conn->query("SELECT * FROM services");

while($row = $result->fetch_assoc()){
    echo "<div>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p>Price: ".$row['price']."</p>";
    echo "<a href='booking.php?service_id=".$row['id']."'>Book Now 💅</a>";
    echo "</div>";
}
?>