<?php
session_start();
include('../admin/db.php');

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$u' AND password='$p'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        echo " Invalid login";
    }
}
?>

<form method="POST">
    <h2>Admin Login</h2>
    <input type="text" name="username" placeholder="Username"><br>
    <input type="password" name="password" placeholder="Password"><br>
    <button name="login">Login</button>
</form>