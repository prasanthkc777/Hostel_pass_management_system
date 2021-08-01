<?php

if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}
if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}

include "configs.php";
$id = $_GET['id'];
$delete = "DELETE FROM $tname WHERE id = $id";
$run_data = mysqli_query($link,$delete);

if($run_data){
	header("location:staffindex.php?application_number= $apn & tname= $tname &ct=$ct &ci=$ci");
}else{
	echo "Donot Delete";
}


?>