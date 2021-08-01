<?php 
include "configs.php";


if(isset($_GET['rpapn'])){
    $rpapn = $_GET['rpapn'];
}
if(isset($_GET['option'])){
    $option = $_GET['option'];
}
if(isset($_GET['apn'])){
    $apn= $_GET['apn'];
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['from'])){
    $frange = $_GET['from'];
}
$frange= $_GET['from'];
$lrange= $_GET['to'];
echo "$frange";
echo "$lrange";
if($option==1){
    echo "HOD";
    $who ="HOD";
    $sql_updatec2 = mysqli_query($link, "UPDATE admin SET allot=1, status=1 , frange=$frange, lrange=$lrange, who='$who' WHERE application_number = $rpapn ");


}else if($option==2){
    echo "class_incharge";
    $who ="class_incharge";
    $sql_updatec2 = mysqli_query($link, "UPDATE admin SET allot=1,status=1, frange=$frange, lrange=$lrange, who='$who' WHERE application_number = $rpapn ");
}else if($option==3){
    echo "WARDEN";
    $who ="WARDEN";
    $sql_updatec2 = mysqli_query($link, "UPDATE admin SET allot=1,status=1,frange=$frange, lrange=$lrange, who='$who' WHERE application_number = $rpapn ");
}
else if($option==4){
   
    $who ="AHOD";
    $sql_updatec2 = mysqli_query($link, "UPDATE admin SET allot=1,status=1,frange=$frange, lrange=$lrange, who='$who' WHERE application_number = $rpapn ");
}
else if($option==5){
   
    $who ="common_incharge";
    $sql_updatec2 = mysqli_query($link, "UPDATE admin SET allot=1,status=1,frange=$frange, lrange=$lrange, who='$who' WHERE application_number = $rpapn ");
}

header("location: homepage1.php?application_number=  $apn & tname= $tname &ct=0 & ci=0  ");

?> 