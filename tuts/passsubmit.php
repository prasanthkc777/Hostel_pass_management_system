<?php 
include "configs.php";

if(isset($_GET['passid'])){
    $passid = $_GET['passid'];
}
if(isset($_GET['username'])){
    $username = $_GET['username'];
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['apn'])){
    $apn = $_GET['apn'];
}


$pass = mysqli_query($link," SELECT * FROM outpass WHERE id = $passid ");
$pass2 = mysqli_fetch_assoc($pass) ;
$passinfo = $pass2['outing_info'];
$submitid = $pass2['id'];

echo "$passid";


$sql_updatec2 = mysqli_query($link, "UPDATE $username SET output = 7 WHERE passid = $passid ");

$sql_updatec = mysqli_query($link, "UPDATE outpass SET passop = 1 WHERE id = $passid ");



header("Location: homepage2.php? application_number= $apn");
              

?>