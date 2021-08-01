<?php 

include "configs.php";


if(isset($_GET['type'])){
    $type = $_GET['type'];
}
if(isset($_GET['section'])){
    $section = $_GET['section'];
}
if(isset($_GET['username'])){
    $username = $_GET['username'];
}
if(isset($_GET['apn'])){
    $apn= $_GET['apn'];
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['myusername'])){
    $myusername = $_GET['myusername'];
}
if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}
if($section=='ask'){ 
    $sql_updatec0 =  "UPDATE requests SET stage =7 WHERE username= '$username' ";
    $sql_updatec1 = mysqli_query($link,$sql_updatec0   );
    echo "$sql_updatec0";



    $sql_updatec20 =  "UPDATE responses SET stage =7 WHERE username= '$username' ";
    $sql_updatec12 = mysqli_query($link,$sql_updatec20   );
    echo "$sql_updatec20";

}else{
    $sql_updatec = mysqli_query($link, "UPDATE requests SET stage =7 WHERE username= '$username' ");




    $sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
    echo "$sql_updatec2";

}

echo "$type";


$sql_insert = "INSERT INTO $username (message,From_,output) VALUES(' your outpass was declined by $myusername - $type. ','$type','0') ";
$result = mysqli_query($link,$sql_insert);

echo "$sql_insert";
if($ct==0){
header("Location: homepage1.php?tname= $tname &  application_number= $apn &ct=0 &ci=0");
}else{
    header("Location: homepage1.php?tname= $tname &  application_number= $apn &ct=1 &ci=0"); 
}
if($ci==0){
    header("Location: homepage1.php?tname= $tname &  application_number= $apn &ct=0 &ci=0");
    }else{
        header("Location: homepage1.php?tname= $tname &  application_number= $apn &ct=1 &ci=1"); 
    }
?>