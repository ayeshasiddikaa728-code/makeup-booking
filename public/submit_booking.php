<?php

include("../config/db.php");

$service = $_POST['service_id'];
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];

$sql = "INSERT INTO bookings(service_id, customer_name, booking_date, booking_time)
VALUES('$service','$name','$date','$time')";

if($conn->query($sql)){
    echo "Booking Successful";
}else{
    echo "Booking Failed";
}
?>