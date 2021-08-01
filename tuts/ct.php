<?php 


include "configs.php";

if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['apn'])){
    $apn = $_GET['apn'];
}

$ct= $_GET['ct'];
echo "$ct"; 
echo "$apn";
echo "$tname";


if($ct==0){
    $ct = 1;
}else{
    $ct = 0;
}
echo "$ct";
header('location:homepage1.php?application_number= '.$apn.' & tname= '.$tname.' &ci=0  &ct= '.$ct.' ');



?>