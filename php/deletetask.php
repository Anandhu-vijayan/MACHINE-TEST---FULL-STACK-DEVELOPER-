<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "task");
$id = $_POST['t_id'];


$sql = "UPDATE tasks SET t_complete='Completed' WHERE t_id='$id'";
$result = mysqli_query($conn, $sql);

if ($result)
{
  echo "1";
}
else
  echo "0";
?>