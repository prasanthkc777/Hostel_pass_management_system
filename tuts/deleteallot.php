<?php 
include "configs.php";


if(isset($_GET['rpapn'])){
    $rpapn = $_GET['rpapn'];
}

if(isset($_GET['apn'])){
    $apn= $_GET['apn'];
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}

$sql_updatec2 = mysqli_query($link, "UPDATE admin SET allot=7, status=7  WHERE application_number = $rpapn ");

echo "$rpapn";
echo "$apn";
echo "$tname";


 header("location: homepage1.php?application_number=  $apn & tname= $tname &ct=0 & ci=0  ");

?> 