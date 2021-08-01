<?php 


include "configs.php";

if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['apn'])){
    $apn = $_GET['apn'];
}
if(isset($_GET['in'])){
    $in= $_GET['in'];
}

echo "in: $in"; 
echo "$apn";
echo "$tname";


if($in==0){
    $in = 1;
}else{
    $in = 0;
}
echo "$in";
header('location:homepage1.php?application_number= '.$apn.' & tname= '.$tname.' &ci= '.$in.'  &ct= 0 ');



?>