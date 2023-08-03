<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "task");
$name = $_POST['taskname'];
$due = $_POST['due'];
$des = $_POST['des'];
$cuid = $_POST['cuid'];


$sql = "INSERT INTO tasks(t_name,t_deadline,t_date,t_created_uid, t_des) VALUES ('$name','$due',NOW(),'$cuid','$des')";
$result = mysqli_query($conn, $sql);

if ($result)
{
  echo "1";
}
else
  echo "0";
?>