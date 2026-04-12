<?php
include(__DIR__ . '/../config/db.php');
?>

<h2> Our Services</h2>

<?php
$result = $conn->query("SELECT * FROM services");

while($row = $result->fetch_assoc()){
    echo "<h3>".$row['name']."</h3>";
}
?>