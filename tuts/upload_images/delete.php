<?php

if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}

include "configs.php";
$id = $_GET['id'];
$delete = "DELETE FROM $tname WHERE id = $id";
$run_data = mysqli_query($link,$delete);

if($run_data){
	header("location:index.php?application_number= $apn & tname= $tname");
}else{
	echo "Donot Delete";
}


?>