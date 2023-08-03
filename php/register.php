<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "task");
$name = $_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];


$sql = "INSERT INTO user(u_name,u_email,u_pass) VALUES ('$name','$email','$pwd')";
$result = mysqli_query($conn, $sql);

if ($result)
{
  echo "1";
}
else
  echo "0";
?>