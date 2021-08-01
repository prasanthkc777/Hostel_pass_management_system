<?php 
include "configs.php";

if(isset($_GET['message'])){
    $message = $_GET['message'];
}
if(isset($_GET['for'])){
    $for = $_GET['for'];
}
if(isset($_GET['from'])){
    $from = $_GET['from'];
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['apn'])){
    $apn= $_GET['apn'];
}
if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}
echo "$message";
echo "$for";
echo " from :$from -";
echo " apn :$apn -";
echo " tname :$tname";


$sql_insert = mysqli_query($link, "INSERT INTO $for (message,From_) VALUES('$message','$from')  ");



header('location:homepage1.php?application_number= '.$apn.'&tname='.$tname.'&ct='.$ct.'&ci='.$ci.' ');

?>