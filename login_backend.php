<?php
session_start();
include("connection.php");

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "SELECT fullname,password FROM `user` WHERE username = '$uname'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

if(empty($row['password'])){
     echo 'error : User does not exist, please enter a valid username';
}elseif( $row['password'] ==$pass){
    $_SESSION['username'] = $uname;
    
    $_SESSION['name'] = $row['fullname'];   

    header('location:Dashboard.php');
}else {
    echo 'error : User does not exist, please enter a valid username';
}