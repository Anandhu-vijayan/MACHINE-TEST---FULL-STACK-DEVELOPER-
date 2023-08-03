<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "task");
$id = $_POST['assid'];
$name = $_POST['assname'];
$due = $_POST['assduedate'];
$des = $_POST['des'];


$sql = "UPDATE tasks SET t_name='$name', t_deadline='$due', t_des='$des' WHERE t_id='$id'";
$result = mysqli_query($conn, $sql);

if ($result)
{
  echo "1";
}
else
  echo "0";
?>