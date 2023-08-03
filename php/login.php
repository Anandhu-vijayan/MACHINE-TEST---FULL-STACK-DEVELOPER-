<?php
session_start();
$url = 'localhost';
$username = 'root';
$password = '';
$con = mysqli_connect($url, $username, $password, "task");
$uname = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);


if ($uname != "" && $password != "") {

    $sql_query = "select count(*) as cntUser,u_id, u_name from user where u_email='" . $uname . "' and u_pass='" . $password . "'";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_array($result);
    $n = $row['u_name'];
    $count = $row['cntUser'];
    $id = $row['u_id'];


    if ($count > 0) {
        $_SESSION['email'] = $uname;
        $_SESSION['id'] = $id;
        $_SESSION['name'] = $n;
        echo 1;
    }
    else {
        echo mysqli_error($con);
    }
}