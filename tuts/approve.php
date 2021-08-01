<?php 

include "configs.php";


if(isset($_GET['type'])){
    $type = $_GET['type'];
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
if(isset($_GET['passid'])){
    $passid = $_GET['passid'];
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
if(isset($_GET['passid'])){
    $pid= $_GET['passid'];
}
if(isset($_GET['section'])){
    $sec= $_GET['section'];
}
if(isset($_GET['stuapn'])){
    $stuapn= $_GET['stuapn'];
}




if($type=='class_incharge'){

    $sql_updatec = mysqli_query($link, "UPDATE requests SET stage =1 WHERE application_number= $stuapn  ");

    $sql_insert = "INSERT INTO $username (message,From_,output) VALUES(' your outpass was verified successfully by $myusername . and sent to HOD for verification. ','$type','0') ";
$result = mysqli_query($link,$sql_insert);
$sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
echo "$sql_insert";


}
else if ($type=='AHOD'){
  if($ct==1){
    $sql_updatec0 =  "UPDATE requests SET stage =2 WHERE application_number= $stuapn  ";
  $sql_updatec =  mysqli_query($link,$sql_updatec0);
 echo "$sql_updatec0";
$sql_insert = "INSERT INTO $username (message,From_,output) VALUES(' your outpass was verified successfully by $myusername . and sent to WARDEN for verification. ','$type','0') ";
$result = mysqli_query($link,$sql_insert);

$sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
echo "$sql_updatec2";
  }else{
    $sql_updatec0 =  "UPDATE requests SET stage =1 WHERE application_number= $stuapn  ";
  $sql_updatec =  mysqli_query($link,$sql_updatec0);
 echo "$sql_updatec0";
echo "request: $sql_updatec";
    $sql_insert = "INSERT INTO $username (message,From_,output) VALUES(' your outpass was verified successfully by $myusername . and sent to HOD for verification. ','$type','0') ";
$result = mysqli_query($link,$sql_insert);
$sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
echo "response: $sql_updatec2";


  }

}

else if ($type=='HOD'){
  
        $sql_updatec = mysqli_query($link, "UPDATE requests SET stage =2 WHERE application_number= $stuapn  ");
 
     
    $sql_insert = "INSERT INTO $username (message,From_,output) VALUES(' your outpass was verified successfully by $myusername . and sent to WARDEN for verification. ','$type','0') ";
    $result = mysqli_query($link,$sql_insert);
    
    $sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
    echo "$sql_updatec2";

}
else if ($type=='common_incharge'){
    $sql_updatec = mysqli_query($link, "UPDATE requests SET stage =1 WHERE application_number= $stuapn  ");

    $sql_insert = "INSERT INTO $username (message,From_,output) VALUES(' your outpass was verified successfully by $myusername . and sent to HOD for verification. ','$type','0') ";
$result = mysqli_query($link,$sql_insert);
$sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
echo "$sql_updatec2";



}


else if ($type=='WARDEN'){
    
        $sql_updatecq = mysqli_query($link, "UPDATE requests SET stage =7 WHERE application_number= $stuapn  ");
    
        $sql_insert = "INSERT INTO $username (message,From_,output,passid) VALUES(' your outpass was verified by $myusername  successfully. click info to get your OUTPASS ','$type','1','$passid') ";
        $result = mysqli_query($link,$sql_insert);


        $pass = mysqli_query($link," SELECT * FROM users WHERE  username = '$username' ");
        $pass2 = mysqli_fetch_array( $pass);
        $stuapn = $pass2['application_number'];

        $sqlidz= mysqli_query($link, "SELECT MAX( id ) AS max FROM outpass WHERE application_number = $stuapn  " );

        if($sqlidz){
        $residz = mysqli_fetch_array( $sqlidz);
        $highestValuez = $residz['max'];
        echo "$highestValuez -";   
        
        $sql_upop = mysqli_query($link, "UPDATE outpass SET output = 1 WHERE application_number= $stuapn AND id=  $highestValuez ");
    
        }else {echo "failed ";}
        $sql_updatec2 = mysqli_query($link, "UPDATE responses SET stage =7 WHERE username= '$username' ");
      
    
}

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