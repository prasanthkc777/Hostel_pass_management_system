<?php 

include "configs.php";


if(isset($_GET['submit'])){
    $table = $_GET['submit'];
}
if(isset($_GET['stuapn'])){
    $stuapn = $_GET['stuapn'];
}
if(isset($_GET['stuapn2'])){
    $stuapn2 = $_GET['stuapn2'];
}

if(isset($_GET['to'])){
    $to = $_GET['to'];
}
if(isset($_GET['message'])){
    $message = $_GET['message'];
}
if(isset($_GET['from'])){
    $from = $_GET['from'];
}
if(isset($_GET['apn'])){
    $apn= $_GET['apn'];
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['section'])){
    $section = $_GET['section'];
}
if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}
$sql_insert = "INSERT INTO $to (message,From_,output) VALUES('$message','$from','0') ";
$result = mysqli_query($link,$sql_insert);



echo"$sql_insert";
         echo "$section";


if($section==0){
    

    
$sqlupdate = "UPDATE requests SET stage = 7 WHERE application_number = $stuapn ";
$resultu = mysqli_query($link,$sqlupdate);

}else{
    
        
$sqlupdate = "UPDATE responses SET stage = 7 WHERE application_number = $stuapn2 ";
$resultu = mysqli_query($link,$sqlupdate);

}

if($result){
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
}else{
    echo "Message Not Sent";
}

?>