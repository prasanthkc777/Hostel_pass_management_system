<?php 
include "configs.php";


session_start();

if(isset($_SESSION['apn']))
{
  
 
  if(isset($_GET['username'])){
    $username= $_GET['username'];
}else{
  echo 'username_failed';
}
if(isset($_GET['application_number'])){
  $apn= $_GET['application_number'];
}
if(isset($_GET['tname'])){
  $tname = $_GET['tname'];
}
if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}
if(isset($_GET['type'])){
    $type= $_GET['type'];
}
// logout
if(isset($_GET['but_logout'])){
  $_SESSION = array();
  session_destroy();
  $start ==0;
  header('Location: studentLogin.php');
}
?>
<?php 
if(isset($_GET['id'])){
    $main_id= $_GET['id'];
    $sql_update = mysqli_query($link,"UPDATE $username SET status=1 WHERE id='$main_id'");
}else{
  echo "id_failed";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>notify</title>

<style>

body{
background:  url("wp11.jpg");
background-size: cover;
background-position: center;
min-height: 1000px;
background-image: blur(10px);

 
}
@media screen and (max-width: 670px){
    body{
        min-height: 500px;
    }
}
#table1{
margin-top: 7% !important;
}
* {
        box-sizing: border-box;
      }
      .openBtn {
        display: flex;
        justify-content: left;
      }
     
      .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
      }
      .formPopup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
      
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
      }
      .btn{
        padding: none;
        border:none;
      }

</style>

<nav style="background-color:#616161;" class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
  <div class="container-fluid">
  <a style="color:white;" class="navbar-brand" href=" homepage1.php?application_number= <?php echo $apn; ?> &tname=<?php echo $tname ?> &ct=<?php echo $ct ?> &ci=<?php echo $ci ?>   " ><i style="color:white;" class="fa fa-arrow-circle-left"></i> Back</a>
   
  &nbsp; &nbsp; <a class="navbar-brand" href="#"><h4 style="color:white;">HOSTEL PASS</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

     &nbsp; &nbsp;<a  style="width:125px; height:50px;" href="logout.php" type="submit" value="Logout" name="but_logout"  > <button type='button' class='btn btn-light' style="width:125px; height:40px; ">Log-Out</button></a>
     
    

        <!-- Example single danger button -->

       
           
        
           
          </ul>
        
         
        </li>
       
      
      </ul>
       <ul style="marker-display:none;color:white;">
    
<?php echo date("h:i:s:a");
echo "<br>";
echo "today".date("d-m-y");

?>

      </ul>           
    </div>
  </div>
  </div>

</nav>
  </head>



  <body>
 
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->











 
<!-- table -->
<div style="padding-left:4px;" id="table">
<div class="row">

<table class="table ">
  <thead class="table-active" >
  <tr>
  
  <th scope="col">s.no</th>
  <th scope="col">notifications</th>
  <th scope="col">date</th>
  <th scope="col">from</th>
  <th scope= "col">info</th>
  <th scope="col">message</th>
  
<tr>
  </thead>
  <tbody>

  <?php 
 $main_id= $_GET['id'];
 $nid = $main_id;
 
$sql_query = "SELECT *  from $username where id=$main_id ";

$retval = mysqli_query($link,$sql_query);

$row = mysqli_fetch_assoc($retval);
   
    $output = $row['output'];
     

     $sr_no =1;

  



  $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE  id=$main_id  ");
 
 
 
while($main_result = mysqli_fetch_assoc($sql_get)): 

$messageid = $main_result['id'];

?>
  <tr>

   <th scope="row"><?php echo $sr_no++; ?></th>
  <td ><?php echo $main_result['message'] ?></td>
  <td ><?php echo $main_result['created_at'] ?></td>
  <td ><?php echo $main_result['From_'] ?></td>
  <td> <a class="text-black"><button class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#info"><i class="fa fa-info-circle"></i></button></a> </td>
  <td> <a  class="text-black"><button class="btn btn-primary btn-xs"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"       ><i class="fa fa-commenting">  </i></button></a> </td>

 

<!-- Modal -->
<div class="modal fade" id="info" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="infoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoLabel">Message Details</h5>
       
      </div>
      <div class="modal-body">
          <?php
          $profile= "Profile";
$stuusername = $main_result['From_'];
$stuprofile = $stuusername.$profile;
echo "$stuusername";
$sql_stu = mysqli_query($link,"SELECT * FROM $stuprofile ");
$sql_stu_fetch = mysqli_fetch_assoc($sql_stu);
$stuapn = $sql_stu_fetch['u_card'];
$stuimage =  $sql_stu_fetch['image'];
$studept =  $sql_stu_fetch['department'];$stuyear =  $sql_stu_fetch['year'];$stusection =  $sql_stu_fetch['section'];
?>
 <img src="upload_images/image/<?php echo $stuimage?>"  style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle">
     


<h8 >Application/Id no:<?php echo $stuapn ?></h8> <br>
<center class="text-muted"><?php echo "$studept -Department "?>&nbsp;<?php echo "$stuyear -year "?>&nbsp; <?php echo "$stusection -section "?> </center>


</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


 </tr>
 <?php  endwhile; 
 
?>


  



</div>

</div>




<script>
    
      function open_info()
      {
        document.getElementById("info").style.display = "block";
      }
      function openxp_info()
      {
        document.getElementById("infoxp").style.display = "block";
      }
      function close_info() {
        document.getElementById("info").style.display = "none";
     
      }
      function closexp_info() {
        document.getElementById("infoxp").style.display = "none";
     
      }


    </script>

  </body>





<!-- Modal for reply --><!-- Modal for reply --><!-- Modal for reply --><!-- Modal for reply --><!-- Modal for reply -->



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Message</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        


    <!-- message -->
  <?php 


    if(isset($_GET['application_number'])){
      $application_number= $_GET['application_number'];
    }
  ?>  

        <form action="staffreply.php?application_number=<?php echo $application_number;?>&type=<?php echo $type ?> & username= <?php echo $username; ?>" method="GET" class="formContainer">
          <?php echo $username; echo  $main_result['id'];  ?>
         
            <strong>reply</strong>
            <br><br>
            <input type="text" style="display:none;"  class="form-control" name="id" value=" <?php echo  $main_id; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="username" value=" <?php echo  $username; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="apn" value=" <?php echo  $apn; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="tname" value=" <?php echo  $tname; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="ct" value=" <?php echo  $ct; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="ci" value=" <?php echo  $ci; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="type" value=" <?php echo  $type; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="stuapn" value=" <?php echo  $stuapn; ?> "   >
            <input type="text" style="display:none;"  class="form-control" name="stuprofile" value=" <?php echo  $stuprofile; ?> "   >
            <textarea cols="40" rows="7" name="reply" id="reply" required="" placeholder= "enter you  message.."></textarea>
        
                
          
          <br><br>
          <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        
        </form>
    
    



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>





</html>

<?php 

}
else{
    echo "<script>location.href='studentLogin.php'</script>";

}
?>


