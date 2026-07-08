<?php

session_start();

include("../config/db.php");

if(isset($_POST['login'])){

$username=$_POST['username'];

$password=$_POST['password'];

$sql="SELECT * FROM admin

WHERE username='$username'

AND password='$password'";

$result=$conn->query($sql);

if($result->num_rows>0){

$_SESSION['admin']=$username;

header("Location:dashboard.php");

exit();

}

else{

echo "Wrong Username or Password";

}

}

?>

<form method="POST">

<input

type="text"

name="username"

placeholder="Username">

<br><br>

<input

type="password"

name="password"

placeholder="Password">

<br><br>

<button name="login">

Login

</button>

</form>