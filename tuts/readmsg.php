<?php 


include "configs.php";

if(isset($_GET['tname'])){
    $tname= $_GET['tname'];
}
if(isset($_GET['apn'])){
    $apn = $_GET['apn'];
}
if(isset($_GET['id'])){
    $id= $_GET['id'];
}

echo "$id";
echo "$tname";
echo "$apn";

$sql_updatec2 = mysqli_query($link, "UPDATE message SET  status=1  WHERE id = $id");

header("Location: homepage2.php?tname= $tname & application_number= $apn");

?>