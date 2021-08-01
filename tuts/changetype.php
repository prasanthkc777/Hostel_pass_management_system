<?php 
if(isset($_GET['option'])){
    $option = $_GET['option'];
}
echo "$option"; ?> <br> <?php

if(isset($_GET['rpapn'])){
    $rpapn = $_GET['rpapn'];
    echo "$rpapn"; ?> <br> <?php
}
if(isset($_GET['option'])){
    $option = $_GET['option'];
}
if(isset($_GET['apn'])){
    $apn= $_GET['apn'];
    echo "$apn ";  ?> <br> <?php
}
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
    echo "  $tname";
}



?>