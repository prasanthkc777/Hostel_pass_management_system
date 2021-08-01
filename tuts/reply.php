<?php 
include "configs.php";

session_start();


    if(isset($_GET['username'])){
        $username= $_GET['username'];
       
    }
    if(isset($_GET['apn'])){
        $apn= $_GET['apn'];
       
    }
    if(isset($_GET['reply'])){
        $message= $_GET['reply'];
       
    }
  
    if(isset($_GET['type'])){
        $to= $_GET['type'];
       
    }
  
    if(isset($_GET['id'])){
        $reply_id= $_GET['id'];
    }
    if(isset($_GET['tname'])){
        $tname= $_GET['tname'];
       
    }
    $reply = $message;

   if($to=='WARDEN'){
    
    $sql_updatew = mysqli_query($link, "UPDATE $username SET reply='$message', From_='$to' WHERE id = $reply_id ");

    $sql_find = mysqli_query($link, "SELECT * FROM $username WHERE id = $reply_id ");
    $sql_message = mysqli_fetch_array($sql_find);
    $qn = $sql_message['message'];
    $reply = $message;


    $sql_insert = mysqli_query($link, "INSERT INTO responses (application_number,tname,username,qn,reply,stage) VALUES('$apn','$tname','$username','$qn','$reply','2')  ");

    if($sql_updatew)
            {
                header('location:homepage2.php?application_number= '.$apn.'&tname='.$tname.' ');
            
            }else{
                echo mysqli_connect_error($link);
            }
        }

echo "$reply";

        if($to=='HOD'){
          

            $sql_find = mysqli_query($link, "SELECT * FROM $username WHERE id = $reply_id ");
            $sql_message = mysqli_fetch_array($sql_find);
            $qn = $sql_message['message'];
            $reply = $message;
        
        
            $sql_insert = mysqli_query($link, "INSERT INTO responses (application_number,tname,username,qn,reply,stage) VALUES('$apn','$tname','$username','$qn','$reply','1')  ");
        
                $sql_updateh = mysqli_query($link, "UPDATE $username SET reply='$message', From_='$to' WHERE id = $reply_id ");
                if($sql_updateh)
                {
                    header('location:homepage2.php?application_number= '.$apn.'&tname='.$tname.' ');  
                 }else{
                echo mysqli_connect_error($link);
            }
        }
            
            if($to=='class_incharge'){

                $sql_find = mysqli_query($link, "SELECT * FROM $username WHERE id = $reply_id ");
                $sql_message = mysqli_fetch_array($sql_find);
                $qn = $sql_message['message'];
                $reply = $message;
            
                $sql_insert = mysqli_query($link, "INSERT INTO responses (application_number,tname,username,qn,reply,stage) VALUES('$apn','$tname','$username','$qn','$reply','0')  ");
            

             
              
            
                $sql_updatec = mysqli_query($link, "UPDATE $username SET reply='$message', From_='$to' WHERE id = $reply_id  ");
                if($sql_updatec)
                {
                    header('location:homepage2.php?application_number= '.$apn.'&tname='.$tname.' ');
            }else{
                echo mysqli_connect_error($link);
            }
         
            
        }
            
            
            
         


   




?>