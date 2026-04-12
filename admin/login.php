<?php
session_start();
include('db.php');

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$u' AND password='$p'";
    $result = $conn->query($sql);

    if($result && $result->num_rows > 0){
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
        exit();
    } else {
        echo " Invalid login";
    }
}
?>

<h2>Admin Login</h2>

<form method="POST">
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button name="login">Login</button>
</form>