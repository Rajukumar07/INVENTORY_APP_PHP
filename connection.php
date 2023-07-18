<?php
$servername="localhost";
$username = "root";
$pass = "root";
$db = "inventory";

$conn = mysqli_connect($servername,$username,$pass,$db);
if($conn){
    echo "";
}else{
    die("connection failed :".mysqli_connect_error());
}

?>