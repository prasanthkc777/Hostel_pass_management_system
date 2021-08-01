<?php 
include "configs.php";

session_start();

if(isset($_SESSION['apn']))
{
    if(isset($_GET['username'])){
        $username= $_GET['username'];
       
    }
    

if(isset($_GET['id']))
{



    $delete_id = $_GET['id'];

    $sql_delete = mysqli_query($link, "DELETE FROM $username WHERE id = '$delete_id'");

    if($sql_delete)
    {
        header('location: notify.php?username='.$username.'& application_number='.$apn.' & id='.$result['id'].'');
    }
    else
    {
        echo mysqli_connect_error($link);
    }
}
}
else{
    echo "<script>location.href='studentLogin.php'</script>";

}

?>