<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'srini');
define('DB_PASSWORD', 'gauranitai');
define('DB_NAME', 'peri_hostel');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect('localhost', 'srini', 'gauranitai', 'peri_hostel');
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " .mysqli_connect_error());
}
?>