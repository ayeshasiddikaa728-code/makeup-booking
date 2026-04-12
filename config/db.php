<?php
$conn = new mysqli("localhost", "root", "", "makeup_booking");

if ($conn->connect_error) {
    die("DB Connection Failed");
}
?>