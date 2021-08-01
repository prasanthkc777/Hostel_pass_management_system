<?php 
include "configs.php";

session_start();


    if(isset($_GET['username'])){
        $username= $_GET['username'];
       
    }
    if(isset($_GET['stuapn'])){
        $for= $_GET['stuapn'];
       
    }
  
    if(isset($_GET['apn'])){
        $apn= $_GET['apn'];
       
    }
    if(isset($_GET['reply'])){
        $message= $_GET['reply'];
       
    }
  
    if(isset($_GET['type'])){
        $type= $_GET['type'];
       
    }
  
    if(isset($_GET['id'])){
        $reply_id= $_GET['id'];
    }
    if(isset($_GET['tname'])){
        $tname= $_GET['tname'];
       
    }
    if(isset($_GET['ci'])){
        $ci = $_GET['ci'];
    }
    if(isset($_GET['ct'])){
        $ct= $_GET['ct'];
    }

    $from = $username."-".$type;
  
  

    $sql_select = mysqli_query($link,"SELECT * FROM admin WHERE  application_number=$for ");
  
    $sqlfetch = mysqli_fetch_assoc($sql_select);
    $staffusername = $sqlfetch['username'];
    $typea =  $sqlfetch['who'];
    echo  "  $typea";
    $profile="Profile";
$stafftname = $staffusername.$profile;

    $sql_select2 = mysqli_query($link,"SELECT * FROM admin WHERE  application_number=$apn ");
    $sqlfetch2 = mysqli_fetch_assoc($sql_select2);
    $staffusername2 = $sqlfetch2['username'];
echo "$typea";
    if($typea ='creator' && $typea ='HOD' && $typea ='class_incharge' && $typea ='WARDEN' && $typea ='AHOD' && $typea ='common_incharge' ){

        $Sql_inst =  "INSERT INTO $staffusername (message,From_) VALUES('$message','$from')  ";
        echo "namma aal - $Sql_inst";
        $sql_insert = mysqli_query($link, $Sql_inst);
        if($sql_insert){
            echo "succes staff";
        }else{
            echo "No staff";
        }


    }



    $Sql_inst =  "INSERT INTO message (message,From_,status,For_) VALUES('$message','$from',0,$for)  ";
    $sql_insert = mysqli_query($link, $Sql_inst);
    echo "veli aal - $Sql_inst";
    if($sql_insert){
        echo "succes";
    }else{
        echo "No";
    }


echo  " for : $for ";
echo  " $message ";
echo  "  $type";
echo  " $username ";
echo  " $tname ";
header('location:homepage1.php?application_number= '.$apn.'&tname='.$tname.'&ct='.$ct.'&ci='.$ci.' ');


   




?>