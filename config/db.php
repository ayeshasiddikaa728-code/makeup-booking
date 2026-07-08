<?php
$conn = new mysqli("localhost","root","","makeup_booking");

if($conn->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
?>