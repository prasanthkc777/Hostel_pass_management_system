<?php
include "configs.php";

session_start();



if(isset($_SESSION['apn']))
{

    if(isset($_GET['application_number'])){
        $apn= $_GET['application_number'];
      
    }
    if(isset($_GET['tname'])){
        $tname = $_GET['tname'];
    }

    
    $sql_query = "SELECT username  from admin where application_number=  $apn ";
    $retval = mysqli_query($link,$sql_query);
    
    $row = mysqli_fetch_array($retval);
       
        $username = $row['username'];
       

        if(isset($_GET['ct'])){
          $ct = $_GET['ct'];
        }
        $ct = $_GET['ct'];
        if(isset($_GET['ci'])){
          $ci = $_GET['ci'];
        }

        
// logout
if(isset($_POST['but_logout'])){
    $_SESSION = array();
    session_destroy();
    $start ==0;
    header('Location: studentLogin.php.php');
}if(isset($_POST['ct'])){
 
  $ct =0;
 
  
}


?>
<!doctype html>
<html>
<title> Staff </title>
<script src="parallax.js"></script>
    <head><!-- CSS -->
    <link rel="stylesheet" type="text/css" href="slider/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.css">

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
    
    </head>
  
    <style>

.bg-image{
background:  url("wp7.jpg");
background-size: cover;
background-position: center;
min-height: 100px;
background-image: blur(10px);

 
}
@media screen and (max-width: 670px){
    body{
        min-height: 500px;
    }
}


        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    .container .form-control {
        width:none;
    }
    #count{
        border-radius: 50%;
        top: -10px;
        left: -10px;
        position: relative;
    }
    
/* external css: flickity.css */

* { box-sizing: border-box; }



.carousel {
  background: #EEE;
}

.carousel-cell {
  margin-right: 20px;
  overflow: hidden;
}

.carousel-cell img {
  display: block;
  height: 200px;
}

@media screen and ( min-width: 768px ) {
  .carousel-cell img {
    height: 400px;
  }
}
#message{
   
   position: fixed;
   bottom: 40px;
   left: 30px;
   z-index: 99;
   font-size: 18px;
   border: none;
   outline: none;
  
   color: white;
   cursor: pointer;
  
   border-radius: 500px;
 
 
 }
 #message:hover{
 
 
     background-color: #555;
 }
   

    </style>
        <nav style="background-color:#616161;"  class="navbar navbar-expand-lg navbar-light transparent " >
    <div class="container">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h4 style="color:white;">PERI STAFF PAGE</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<?php 
$sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0");
$counts = mysqli_num_rows($sql_get);
$get_data2 = "SELECT * FROM admin WHERE application_number= $apn ";
      
$run_data2 = mysqli_query($link,$get_data2);

$row2 = mysqli_fetch_array($run_data2);
$type = $row2['who'];


?>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
    
      &nbsp; &nbsp;  &nbsp; &nbsp;    &nbsp; &nbsp;<a  style="width:125px; height:50px;" href="logout.php" type="submit" value="Logout" name="but_logout"  > <button type='button' class='btn btn-light' style="width:125px; height:40px; ">Log-Out</button></a>
    
      
        <!-- Example single danger button -->

        <li class="nav-item dropdown">
          <a  style="color:white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
            notifications <i  style="color:white;" class="fa fa-bell"></i>  <span class="badge badge-danger " id="count"> <?php echo $counts;  ?></span>
          </a>
          
          <ul class="dropdown-menu p-3 text-muted " style="max-width:200px;" aria-labelledby="navbarDropdown">
          <p>
          

          <?php
              if(isset($_GET['ct'])){
                $ct = $_GET['ct'];
              }
              $ct = $_GET['ct'];
              if(isset($_GET['ci'])){
                $ci = $_GET['ci'];
              }
          $sql_get1 = mysqli_query($link, "SELECT * FROM $username WHERE status=0");
        
          $stafflast =mysqli_query( $link," SELECT MAX( id ) AS max FROM $username   ");
          $stafflast2 = mysqli_fetch_assoc($stafflast);
          $slastValue = $stafflast2['max'];
          $sql_last = mysqli_query($link, "SELECT * FROM $username WHERE id=$slastValue");
          if(mysqli_num_rows($sql_get1)>0)
          {
       
          
              while($result = mysqli_fetch_assoc($sql_get1))
              {
               
                  echo '<a style="text-decoration:none;" class="container" class= "dropdown-item text-primary " href="staffnotify.php?username='.$username.'&type='.$type.' & tname= '.$username.'Profile & application_number='.$apn.' &ct='.$ct.' &ci='.$ci.' & id='.$result['id'].'">'.$result['message'].' </a> ';
                  echo '<div class="dropdown-divider"></div>';
                
              }
          }
          else{
            $resultlast = mysqli_fetch_assoc($sql_last);
              echo '<div  class="container" class= "dropdown-item text-danger font-weight-bold"> <i class="fa fa-frown-open"></i> sorry! No new notifications  </div>';
              echo '<div class="dropdown-divider"></div>';
             echo '<div  class="container" class= "dropdown-item text-danger font-weight-bold"><a  style="text-decoration:none;" href="staffnotify.php?username='.$username.' &ct='.$ct.' &ci='.$ci.' &type='.$type.' & tname= '.$username.'Profile & application_number='.$apn.' & id='.$resultlast['id'].'   " >see last notification</a> </div>';
    
            }
          
        
          ?>
          </p>
           
        
           
          </ul>
        
         
        </li>
       
      
      </ul>
      <a class="navbar-brand" href="upload_images/staffindex.php?tname=<?php echo $username; echo "Profile";?>&ct=<?php echo $ct ?> &ci=<?php echo $ci ?> & application_number=<?php echo $apn; ?> "> <strong><em  style="color:white;">Profile </em> </strong><i  style="color:white;"  class="fa fa-user-circle "></i></a>
   
   <li>  
<?php 
$get_data2 = "SELECT * FROM admin WHERE application_number= $apn ";
      
$run_data2 = mysqli_query($link,$get_data2);

$row2 = mysqli_fetch_array($run_data2);
$type = $row2['who'];

if($type == 'AHOD' ){
 

$ct =  $_GET['ct'];

  echo "<a href='ct.php?tname= $tname & apn= $apn &ct= $ct' type='submit' name='ct' class='btn btn-outline-info'> Change type </a>";


 



}
if($type == 'common_incharge' ){
 

  $ci =  $_GET['ci'];
  

  echo "<a href='ci.php?tname=$tname&apn=$apn&ci=$ci &in=$ci' type='submit' value=$ci name='value' class='btn btn-outline-info'> Change Type  </a>";
  
  
  
  }
  if($type =='creator'){
    $sql_ge = mysqli_query($link, "SELECT * FROM admin WHERE allot=0 AND status=0 ");
          
    $countsz = mysqli_num_rows($sql_ge);
  ?>
   &nbsp;  <button type='button' class='btn btn-outline-info'  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Allot</button> <span class="badge badge-danger " id="count"> <?php echo $countsz;  ?></span> &nbsp;&nbsp;
    <?php
  }

if($type =='HOD'){
  $sql_ge = mysqli_query($link, "SELECT * FROM admin WHERE allot=0 AND status=0 ");
        
  $countsz = mysqli_num_rows($sql_ge);
?>
 &nbsp;  <button type='button' class='btn btn-outline-info'  data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Allot</button> <span class="badge badge-danger " id="count"> <?php echo $countsz;  ?></span> &nbsp;&nbsp;
  <?php
}
?>

&nbsp;  &nbsp;  <li style="marker:none;color:white;">
    
    <?php echo date("h:i:s:a");
    echo "<br>";
    echo "today".date("d-m-y");
    
    ?>
    
</li>  


    </div>
  </div>
  </div>

</nav>

 <!--message --><!--message --><!--message --><!--message --><!--message --><!--message --><!--message --><!--message --><!--message -->

 <div class="modal fade" id="chatmessage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="chatmessageLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title" id="chatmessageLabel">  <i style="color:#00A9DF;" class="fa fa-comments"></i> </h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">

    <nav>
<div class="nav nav-tabs nav-justified" id="meaasge" role="tablist">

  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">New  </button>
  <button class="nav-link" id="nav-usernames-tab" data-bs-toggle="tab" data-bs-target="#nav-usernames" type="button" role="tab" aria-controls="nav-usernames" aria-selected="false">Usernames  </button>

 
  </div>
</nav>


<div class="tab-content md-3 " id="messageContent">


<div class="tab-pane fade" id="nav-new" role="tabpanel" aria-labelledby="nav-profile-tab">


<form action="staffmessage.php"  method="GET">
      <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">To</span> <br><br>
  <input type="text" name="for" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
</div>
     
    <div class="input-group">
    <input type="text" style="display:none;"  name="from" value=<?php echo $username ?>>
    <input type="text" style="display:none;"  name="tname" value=<?php echo $tname ?>>
    <input type="text" style="display:none;"  name="apn" value=<?php echo $apn ?>>
    <input type="text" style="display:none;"  name="ct" value=<?php echo $ct ?>>
    <input type="text" style="display:none;"  name="ci" value=<?php echo $ci?>>
  <textarea class="form-control" name="message" aria-label="With textarea" ></textarea>
  <button class="btn btn-outline-info" type="submit">Send</button>
</div>

    </form>


</div>
<div class="tab-pane fade" id="nav-usernames" role="tabpane2" aria-labelledby="nav-profile-tab">

<?php 

$message = mysqli_query($link," SELECT * FROM admin  ");
$i = 0;
if(mysqli_num_rows($message)>0)
{



while($adminmsg = mysqli_fetch_assoc($message )){

$mi = ++$i;
$ausername = $adminmsg['username'];
$yar = $adminmsg['who'];
echo "<center><em>  $mi --$yar- Username: $ausername <em><center> <br>";


}
}


?>



</div>
</div>



    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
    </div>

  </div>
</div>
</div>





<!--message --><!--message --><!--message --><!--message --><!--message --><!--message --><!--message --><!--message --><!--message -->

    <body>

    <button style="
    
    
    " id="message" type="button"  data-bs-toggle="modal" data-bs-target="#chatmessage" class="btn btn-primary rounded-circle">   <i class="fa fa-comment"  ></i></button> 
   
<div class="bg-image">




       <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ALLOT USERS</h5>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      <nav>
  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">New USERS. </button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Change  </button>
    </div>
</nav>


<div class="tab-content " id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


<?php
        $sql_ge = mysqli_query($link, "SELECT * FROM admin WHERE allot=0 AND status=0 ");
        
$countsz = mysqli_num_rows($sql_ge);
         
         if(mysqli_num_rows($sql_ge)>0)
         {
             
             while($resu = mysqli_fetch_assoc($sql_ge))
             {

$rprofile = "Profile";
$rptable = $resu['username'].$rprofile;
$rpapn =  $resu['application_number'];
$sql_rp = mysqli_query($link, "SELECT * FROM $rptable");
$arp = mysqli_fetch_assoc($sql_rp);
$imagearp = $arp['image'];
$arpdept2 =$arp['department'];
$arpapnz2 =$arp['u_card'];
$arpdot ="-";
$arpflname = $arp['u_f_name'].$arpdot.$arp['u_l_name'];


           echo "<img src='upload_images/image/$imagearp' alt=''class='responsive-img rounded-circle'  style='width: 50px; padding:5px; height: 50px;'>";
             echo "<strong><em>$arpflname</em></strong>   <a class='btn btn-primary btn-sm' data-bs-toggle='collapse' href='#collapseExampz$rpapn' role='button' aria-expanded='false' aria-controls='collapseExample'>
             Choose
           </a> &nbsp;<a href='deleteallot.php?apn=$apn &rpapn=$rpapn &tname=$tname' ><button type='button' class='btn btn-danger rounded-circle'><i class='fa fa-trash'  ></i></button> </a><br> &nbsp; &nbsp; <h8 class='text-muted'>$arpapnz2 - $arpdept2 Department <h8>"  ; 
             echo  "  
             <p>
 

</p>
<div class='collapse' id='collapseExampz$rpapn'>
  <div class='card card-body'>
    

 <form action='allot.php' method='GET'> 
<div class='input-group'>
<span class='input-group-text'>From</span>
<input type='text' style='width:100%' class='form-control' name='from' placeholder='Register number start by 0' >
<span class='input-group-text'>To</span>
<input type='text'style='width:100%' class='form-control' name='to' placeholder='Register number end by 9999999999999' '>







<div class='dropdown-divider'></div>
<select name='option'  class='form-select' id='inputGroupSelect04' aria-label='Example select with button addon'>
  <option selected>Choose...</option>
  <option value='1'>HOD</option>
  <option value='2'>class_incharge</option>
  <option value='3'>WARDEN</option>
  <option value='4'>Class Incharge & Asst.HOD</option>
  <option value='5'>Common Class Incharge</option>
</select>
<input type='text' style='display:none;' id='disabledTextInput' name='rpapn' value='$rpapn' class='form-control'  >
<input type='text' style='display:none;' id='disabledTextInput' name='apn' value='$apn' class='form-control'  >
<input type='text' style='display:none;' id='disabledTextInput' name='tname' value='$tname' class='form-control'  >
<input type='submit' name='DONE' value'DONE' class='btn btn-outline-secondary'>
</div>
</form>
  </div>
</div>
             
             
             
             ";
          



              echo '<div class="dropdown-divider"></div>';
             }

         }else{
          echo '<h7  class="text-danger " ><center> <em> sorry! No new users </em> </center> </h7>';

         }
?>


</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<?php
        $sql_g = mysqli_query($link, "SELECT * FROM admin  ");
      
         if(mysqli_num_rows($sql_g)>0)
         {
             
             while($resum = mysqli_fetch_assoc($sql_g))
             {

$rprofile = "Profile";
$rptable = $resum['username'].$rprofile;
$rpapn =  $resum['application_number'];
$frange = $resum['frange'];
$lrange =$resum['lrange'];
$sql_rp = mysqli_query($link, "SELECT * FROM $rptable");
$arp = mysqli_fetch_assoc($sql_rp);
$imagearp = $arp['image'];
$arpdept =$arp['department'];
$arpapnz =$arp['u_card'];
$arpdot ="-";
$arpflname = $arp['u_f_name'].$arpdot.$arp['u_l_name'];





           echo "<img src='upload_images/image/$imagearp' alt=''class='responsive-img rounded-circle'  style='width: 50px; padding:5px; height: 50px;'>";
             echo "<strong><em>$arpflname</em></strong>   <a class='btn btn-primary btn-sm' data-bs-toggle='collapse' href='#collapseExam$rpapn' role='button' aria-expanded='false' aria-controls='collapseExample'>
             Change
           </a> <br> &nbsp; &nbsp; <h8 class='text-muted'>$arpapnz - $arpdept Department <h8> <h8 class='text-muted' >/ $frange - $lrange</h8> /"  ; 
             echo  "  
             <p>
 

</p>
<div class='collapse' id='collapseExam$rpapn'>
  <div class='card card-body'>
    

 <form action='allot.php' method='GET'> 
<div class='input-group'>
<span class='input-group-text'>From</span>
<input type='text' style='width:100%' class='form-control' name='from' placeholder='Register number start by 0' >
<span class='input-group-text'>To</span>
<input type='text'style='width:100%' class='form-control' name='to' placeholder='Register number end by 9999999999999' '>


<select name='option'  class='form-select' id='inputGroupSelect04' aria-label='Example select with button addon'>
  <option selected>Choose...</option>
  <option value='1'>HOD</option>
  <option value='2'>class_incharge</option>
  <option value='3'>WARDEN</option>
  <option value='4'>Class Incharge & Asst.HOD</option>
  <option value='5'>Common Class Incharge</option>
</select>
<input type='text' style='display:none;' id='disabledTextInput' name='rpapn' value='$rpapn' class='form-control'  >
<input type='text' style='display:none;' id='disabledTextInput' name='apn' value='$apn' class='form-control'  >
<input type='text' style='display:none;' id='disabledTextInput' name='tname' value='$tname' class='form-control'  >
<input type='submit' name='DONE' value'DONE' class='btn btn-outline-secondary'>
</div>
</form>
  </div>
</div>
             
             
             
             ";
          



              echo '<div class="dropdown-divider"></div>';
             }

         }else{
          echo '<h7  class="text-danger " ><center> <em> sorry! No new users </em> </center> </h7>';

         }
?>


</div>

</div>




      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
         <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot --> <!-- Allot -->

      <?php 





   
      $get_data = "SELECT * FROM $tname ";
      if($get_data){
        $run_data = mysqli_query($link,$get_data);
    
        $row = mysqli_fetch_array($run_data);
       

if(!$run_data ){
  echo "<center class='text-danger'> Please complete your Profile</center>";
}
if(!$get_data ){
  echo "<center class='text-danger'> Please complete your Profile</center>";
}
    
              
      $get_data2 = "SELECT * FROM admin WHERE application_number= $apn ";
      
      $run_data2 = mysqli_query($link,$get_data2);
    
      $row2 = mysqli_fetch_array($run_data2);
      $type = $row2['who'];
   
	$id = $row['id'];
	$card = $row['u_card'];
	$name = $row['u_f_name'];
	$name2 = $row['u_l_name'];
	$father = $row['u_father'];
	$mother = $row['u_mother'];
	$gender = $row['u_gender'];
	$email = $row['u_email'];
	$aadhar = $row['u_aadhar'];
	$Bday = $row['u_birthday'];
	$family = $row['u_family'];
	$phone = $row['u_phone'];
	$address = $row['u_state'];
	$village = $row['u_village'];
	$police = $row['u_police'];
	$dist = $row['u_dist'];
	$pincode = $row['u_pincode'];
	$state = $row['u_state'];
	$time = $row['uploaded'];
	$department = $row['department'];
	$year = $row['year'];
	$section = $row['section'];
	$image = $row['image'];
    $dot = '-';
   $title = $name2.$dot.$name;
   $cdate = date("h:i:s:a");

echo "
<div class='container'>
<div class='card sm-12 mb-3' style='max-width: 100%; background-color: #f0f0f0;'>
  <div class='row g-0'>
    <div class='col-md-4'>
      <img src='upload_images/image/$image' alt=''class='responsive-img rounded-circle'  style='width: 150px; padding:5px; height: 150px;'>
     <p class='text-muted center'>
        <h3  style='padding-right:50px; padding-left:10px;'><strong> $type  </strong></h3>
        </p>
  
      

    
    </div>
    <div class='col-md-8'>
      <div class='card-body'>
        <h5 class='card-title'> $title</h5>
        <p class='card-text'>  <i class='fa fa-id-card' aria-hidden='true'></i>&nbsp; Application/id No - $card<br>
        <i class='fa fa-phone' aria-hidden='true'></i> &nbsp;Contact no $phone  <br> </p>
        <p class='card-text'> department: $department</p>
             <p class='card-text'><small class='text-muted'>$cdate  </small></p><br> <br>";

             if($ct== 1 && $ci== 0){
              echo "<div class='card text-white bg-dark ' style='max-width: 8rem; max-height: 4rem;'>

              <div class='card-body'>
                <h5 class='card-title'> AS HOD </h5>
               
              </div>
            </div>";
              }
              
              if($ct== 0 && $ci== 1){
                echo "<div class='card text-white bg-dark ' style='max-width: 15rem; max-height: 4rem;'>
  
                <div class='card-body'>
                  <h5 class='card-title'> AS Common Incharge </h5>
                 
                </div>
              </div>";
                }
                

     echo " </div>
    </div>
  </div>
</div>

</div>


";


  
      }else{
        echo "
        <div class='card'>
        <div class='card-body'>
        <center class='text-danger'> please! complete your profile</center>
        </div>
      </div>";
      }
    
    







      
      ?>  


<div class="container">

    <div class="hero-slider" style="height:45vh;" data-carousel>
	<div class="carousel-cell" style="background-image: url(canva1.png);">
		<div class="overlay"></div>
		<div class="inner">
	
		
		</div>
	</div>

	<div class="carousel-cell" style="background-image: url(canva4.png);">
		<div class="overlay"></div>
		<div class="inner">
		
		</div>
	</div>

	<div class="carousel-cell" style="background-image: url(canva5.png);">
		<div class="overlay"></div>
		<div class="inner">
	
			
		</div>
	</div>
</div>

</div>






<?php 



if($type !='creator' && $type !='HOD' && $type !='class_incharge' && $type !='WARDEN' && $type !='AHOD' && $type !='common_incharge' ){

?>
<nav>
  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">REQUESTS. </button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">RESPONSES. </button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">link.</button>
  </div>
</nav>


<div class="tab-content " id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><center class="text-danger"> Sorry! NO requests . contact HOD/Creator to allot your user type</center>
</div>
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><center class="text-danger">Sorry! No  Responses. contact HOD/Creator to allot your user type</center>
</div>
<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><center class="text-danger">No Link. contact HOD/Creator to allot your user type</center></div>
</div>
</div>

<?php

}else{ 

if($type =='class_incharge'){
  $sql_range = mysqli_query($link,"SELECT * FROM admin WHERE application_number =$apn ");
  $range = mysqli_fetch_array( $sql_range);
  $frange = $range['frange'] ;
  $lrange = $range['lrange'] ;

$sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0");
$counts = mysqli_num_rows($sql_get);

$sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =0 AND application_number BETWEEN $frange AND $lrange ");
$counts5 = mysqli_num_rows($sql_get5);


$sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND   stage =0 AND application_number BETWEEN $frange AND $lrange");
$countsrp = mysqli_num_rows($sql_getrp);



$sr_no =1;
$sr_norp =1;
}
else if( $type =='HOD'  ){
  $sql_range = mysqli_query($link,"SELECT * FROM admin WHERE application_number =$apn ");
  $range = mysqli_fetch_array( $sql_range);
  $frange = $range['frange'] ;
  $lrange = $range['lrange'] ;
  $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0 ");
$counts = mysqli_num_rows($sql_get);

$sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =1  ");
$counts5 = mysqli_num_rows($sql_get5);


$sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND  stage =1  ");
$countsrp = mysqli_num_rows($sql_getrp);



$sr_no =1;
$sr_norp =1;
}
else if( $type =='common_incharge'  ){

 

  $sql_range = mysqli_query($link,"SELECT * FROM admin WHERE application_number =$apn ");
  $range = mysqli_fetch_array( $sql_range);
  $frange = $range['frange'] ;
  $lrange = $range['lrange'] ;
  if($ci==0){
    $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0");
    $counts = mysqli_num_rows($sql_get);
    
    $sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =0 AND application_number BETWEEN $frange AND $lrange ");
    $counts5 = mysqli_num_rows($sql_get5);
    
    
    $sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND   stage =0 AND application_number BETWEEN $frange AND $lrange ");
    $countsrp = mysqli_num_rows($sql_getrp);
    
    
    
    $sr_no =1;
    $sr_norp =1;

  }else{

    $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0");
    $counts = mysqli_num_rows($sql_get);
    
    $sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =0 ");
    $counts5 = mysqli_num_rows($sql_get5);
    
    
    $sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND   stage =0  ");
    $countsrp = mysqli_num_rows($sql_getrp);
    
    
    
    $sr_no =1;
    $sr_norp =1;

  }


}

else if( $type =='AHOD'  ){
  $sql_range = mysqli_query($link,"SELECT * FROM admin WHERE application_number =$apn ");
  $range = mysqli_fetch_array( $sql_range);
  $frange = $range['frange'] ;
  $lrange = $range['lrange'] ;

if($ct==1){


  $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0 ");
$counts = mysqli_num_rows($sql_get);

$sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =1 ");
$counts5 = mysqli_num_rows($sql_get5);


$sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND  stage =1  ");
$countsrp = mysqli_num_rows($sql_getrp);



$sr_no =1;
$sr_norp =1;

}else{

  $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0");
  $counts = mysqli_num_rows($sql_get);
  
  $sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =0 AND application_number BETWEEN $frange AND $lrange ");
  $counts5 = mysqli_num_rows($sql_get5);
  
  
  $sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND   stage =0  AND application_number BETWEEN $frange AND $lrange");
  $countsrp = mysqli_num_rows($sql_getrp);
  
  
  
  $sr_no =1;
  $sr_norp =1;


}
}
else if( $type =='WARDEN'  ){
  $sql_range = mysqli_query($link,"SELECT * FROM admin WHERE application_number =$apn ");
  $range = mysqli_fetch_array( $sql_range);
  $frange = $range['frange'] ;
  $lrange = $range['lrange'] ;
  $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0 ");
$counts = mysqli_num_rows($sql_get);

$sql_get5 = mysqli_query($link,"SELECT * FROM requests WHERE status =0 AND  stage =2 ");
$counts5 = mysqli_num_rows($sql_get5);


$sql_getrp = mysqli_query($link,"SELECT * FROM responses WHERE status =0 AND  stage =2  ");
$countsrp = mysqli_num_rows($sql_getrp);



$sr_no =1;
$sr_norp =1;
}
else if( $type =='creator'  ){
  $sql_range = mysqli_query($link,"SELECT * FROM admin WHERE application_number =$apn ");
  $range = mysqli_fetch_array( $sql_range);
  $frange = $range['frange'] ;
  $lrange = $range['lrange'] ;
  $sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0 ");
$counts = mysqli_num_rows($sql_get);

$sql_get5 = mysqli_query($link,"SELECT * FROM requests");
$counts5 = mysqli_num_rows($sql_get5);


$sql_getrp = mysqli_query($link,"SELECT * FROM responses  ");
$countsrp = mysqli_num_rows($sql_getrp);



$sr_no =1;
$sr_norp =1;
}


 
  ?>


<?php



?>


<nav>
  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home1-tab" data-bs-toggle="tab" data-bs-target="#nav-home1" type="button" role="tab" aria-controls="nav-home1" aria-selected="true">  <?php if($counts5<1){ ?><h8 class="text-danger"> NO NEW REQUESTS. </h8><?php }else{?> REQUESTS. <?php }?><span class="badge badge-danger " id="count"> <?php echo $counts5;  ?></span></button>
    <button class="nav-link" id="nav-profile1-tab" data-bs-toggle="tab" data-bs-target="#nav-profile1" type="button" role="tab" aria-controls="nav-profile1" aria-selected="false"> <?php if($countsrp<1){ ?><h8 class="text-danger"> NO NEW RESPONSES. </h8><?php }else{?> RESPONSES. <?php }?>  <span class="badge badge-danger " id="count"> <?php echo $countsrp;  ?></span></button>
    <button class="nav-link" id="nav-contact1-tab" data-bs-toggle="tab" data-bs-target="#nav-contact1" type="button" role="tab" aria-controls="nav-contact1" aria-selected="false">link</button>
  </div>
</nav>



<div class="tab-content" id="nav-tabContent">

 <!-- Requests--><!-- Requests--><!-- Requests--><!-- Requests--><!-- Requests--><!-- Requests--><!-- Requests-->

  <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home1-tab">
 

<!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1-->
 
<?php 

if(mysqli_num_rows($sql_get5)>0)
{
while($row5 = mysqli_fetch_assoc($sql_get5)): 

  $apnrq = $row5['application_number'];
  $tnamerq = $row5['tname'];

  $sql_queryrq = "SELECT *  from $tnamerq ";
  $retvalrq = mysqli_query($link,$sql_queryrq);
  
  $rowrq = mysqli_fetch_array($retvalrq);

  $dot = '-';
  $fname = $rowrq['u_f_name'];
  $lname = $rowrq['u_l_name'];
  $flname = $fname.$dot.$lname;

  

  $outinfoo =mysqli_query( $link," SELECT MAX( id ) AS max FROM outpass WHERE application_number = $apnrq  ");
  
  $outinfoooo= mysqli_fetch_array( $outinfoo);
  if($outinfoooo){
    
  }else{
    echo "id not done";
  }
  
      $highestValue1 = $outinfoooo['max'];
     
  

  $sql_queryop = "SELECT *  from outpass WHERE id = $highestValue1  ";
  $retvalop = mysqli_query($link,$sql_queryop);
  
  $rowop = mysqli_fetch_array($retvalop);
$passid = $rowop['id'];


  $imagerq =  $rowrq['image'];


?>
  <br>

   <li><?php echo $sr_no++; ?></li>
   <br>
   
 
  <div class="card sm-12 mb-3">
  <div class="card-header">    <img src="upload_images/image/<?php echo $imagerq?>"
                        style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle"><?php echo $flname ?></li> &nbsp; &nbsp;
                        
  <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#<?php echo $flname?>" role="button" aria-expanded="false" aria-controls="collapseExample">
    More info
  </a> &nbsp; &nbsp; <a class="btn btn-info" data-bs-toggle="collapse" href="#<?php echo $flname?>0" role="button" aria-expanded="false" aria-controls="collapseExample">
    Ask 
  </a>

<?php $sec = 0 ;?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">

 <a href="approve.php?username=<?php echo  $row5['username'] ; ?>&ct=<?php echo $ct ?>&ci=<?php echo $ci ?>  &myusername=<?php echo $username  ?>&section= <?php echo $sec ?> &stuapn=<?php echo $apnrq  ?>  &passid=<?php echo $passid  ?> &tname=<?php echo $tname ?>&apn=<?php echo $apn ?> &type=<?php echo $type  ?>"> <button class="btn btn-primary  me-md-2" type="button">Approve</button> </a>&nbsp;
  <a  href="decline.php?username=<?php echo  $row5['username'] ; ?> &ct=<?php echo $ct ?>&ci=<?php echo $ci ?>  &myusername=<?php echo $username  ?> &tname=<?php echo $tname ?>&apn=<?php echo $apn ?> &type=<?php echo $type  ?> & section=ask"><button class="btn btn-danger" type="button">Decline</button></a>
</div>





<div class="collapse" id="<?php echo $flname ?>">
  <div class="card card-body">
   <strong><em> Name : <?php echo $flname?> </em></strong>  <br>
  <strong><em> Application/ID NO : <?php echo $row5['application_number'] ?></em></strong>   <br>
  <strong><em> Mobile NO : <?php echo $rowrq['u_phone'] ?></em></strong>   <br>
  <strong><em> Department : <?php echo $rowrq['department'] ?></em></strong>   <br>
  <strong><em> Section : <?php echo $rowrq['section'] ?></em></strong>   <br>
  <strong><em>year : <?php echo $rowrq['year'] ?></em></strong>   <br>
  <strong><em>Out DateTime : <?php echo $rowop['out_date'] ?></em></strong>   <br>
  <strong><em> In DateTime : <?php echo $rowop['in_date'] ?> </em></strong>  <br>
  <strong><em>Out Pass Info: <?php echo $rowop['outing_info'] ?> </em></strong>  <br>
  <?php
  $nil = $row5['username'];
  $sql_nil = mysqli_query($link,"SELECT * FROM $nil WHERE output=1 ");
  $countsnil = mysqli_num_rows($sql_nil);
 
  if($countsnil>0)
  {
   echo " <strong><em> Unsubmitted Outpass: $countsnil  </em></strong>  <br>";
  }else{
    echo " <strong><em> Unsubmitted Outpass: NILL  </em></strong>  <br>";
  }
  

?>

    </div>
</div>


<div class="collapse" id="<?php echo $flname ?>0">
  <div class="card card-body">
  <?php 
 $value= $row5['username'] ;
 $stuapn =  $row5['application_number'];




  ?>
<form action="ask.php?table=<?php echo $value ?> & message=<?php echo $_GET['message'];  ?> "  method="GET">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="ci" value= <?php echo $ci ?> >
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="ct" value= <?php echo $ct ?> >
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="from" value=" <?php echo $type ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="to" value=" <?php echo $value ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="apn" value=" <?php echo $apn ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="tname" value=" <?php echo $tname ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="section" value=0 placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="stuapn" value=" <?php echo  $stuapn ?>  " placeholder=" <?php echo $row5['username'];  ?>  ">
<h6 class="input-group">

  <span class="input-group-text">MESSAGE</span>
  
  <textarea class="form-control" name="message" placeholder="Don't leave empty! before send" aria-label="With textarea"></textarea>&nbsp; <input type="submit" name="submit" id="register" value="<?php echo $value ?>" class="btn btn-info">
</h6>
</form>
</div>
</div>



 </div>
</div>



   





 
 <?php  endwhile; }
 
 
 
 
 
 ?>

 

<!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1--><!--tab1-->





</div>
  <!-- Responses--><!-- Responses--><!-- Responses--><!-- Responses--><!-- Responses--><!-- Responses--><!-- Responses-->

  <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile1-tab">
  





<!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2-->

<?php 

if(mysqli_num_rows($sql_getrp)>0)
{
while($rowrp = mysqli_fetch_assoc($sql_getrp)): 

  $apnrp = $rowrp['application_number'];
  $tnamerp = $rowrp['tname'];

  $sql_queryrp = "SELECT *  from $tnamerp";
  $retvalrp = mysqli_query($link,$sql_queryrp);
  
  $profile = mysqli_fetch_array($retvalrp);

  $dot = '-';
  $fnamerp = $profile['u_f_name'];
  $lnamerp = $profile['u_l_name'];
  $flnamerp = $fnamerp.$dot.$lnamerp;


 // <!-- out info--> // <!-- out info--> // <!-- out info--> // <!-- out info--> // <!-- out info--> // <!-- out info-->
 $outinfo0 = mysqli_query($link," SELECT MAX( id ) AS max FROM outpass WHERE application_number = $apnrp  ");
 $outinfo1 = mysqli_fetch_array( $outinfo0);
     $highestValue = $outinfo1['max'];
 

  $sql_queryop = "SELECT *  from outpass WHERE id =  $highestValue ";
  $retvalop = mysqli_query($link,$sql_queryop);

   // <!-- out info--> // <!-- out info--> // <!-- out info--> // <!-- out info--> // <!-- out info--> // <!-- out info-->
  
  $rowop = mysqli_fetch_array($retvalop);
  $imagerp =  $profile['image'];


?>
  <li><?php echo $sr_norp++; ?></li>
   <br>
   

   <div class="card mb-3 sm-12">
  <div class="card-header">
  <img src="upload_images/image/<?php echo $imagerp?>"
                        style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle"><?php echo $flnamerp ?></li> &nbsp; &nbsp;
                        <a class="btn btn-outline-primary" data-bs-toggle="collapse" href="#<?php echo $flnamerp?>1" role="button" aria-expanded="false" aria-controls="collapseExample">
    More info
  </a> &nbsp; &nbsp;                    <a class="btn btn-secondary" data-bs-toggle="collapse" href="#<?php echo $flnamerp?>2" role="button" aria-expanded="false" aria-controls="collapseExample">
    Show Reply
  </a> 
  <?php $sec = 1 ;?>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">

  <a href="approve.php?username=<?php echo  $rowrp['username'] ; ?>&ct=<?php echo $ct ?>&ci=<?php echo $ci ?>&section= <?php echo $sec ?> &stuapn=<?php echo $apnrp  ?>   &myusername=<?php echo $username  ?> &tname=<?php echo $tname ?>&apn=<?php echo $apn ?> &type=<?php echo $type  ?>"> <button class="btn btn-primary  me-md-2" type="button">Approve</button></a> &nbsp;
  <a  href="decline.php?username=<?php echo  $rowrp['username'] ; ?> &ct=<?php echo $ct ?>&ci=<?php echo $ci ?>   &myusername=<?php echo $username  ?> &tname=<?php echo $tname ?>&apn=<?php echo $apn ?> &type=<?php echo $type  ?> & section=responses"><button class="btn btn-danger" type="button">Decline</button></a>
</div>
<div class="collapse" id="<?php echo $flnamerp ?>1">
  <div class="card card-body">
   <strong><em> Name : <?php echo $flnamerp?> </em></strong>  <br>
  <strong><em> Application/ID NO : <?php echo $rowrp['application_number'] ?></em></strong>   <br>
  <strong><em> Mobile NO : <?php echo $profile['u_phone'] ?></em></strong>   <br>
  <strong><em> Department : <?php echo $profile['department'] ?></em></strong>   <br>
  <strong><em> Section : <?php echo $profile['section'] ?></em></strong>   <br>
  <strong><em>year : <?php echo $profile['year'] ?></em></strong>   <br>
  <strong><em>Out DateTime : <?php echo $rowop['out_date'] ?></em></strong>   <br>
  <strong><em> In DateTime : <?php echo $rowop['in_date'] ?> </em></strong>  <br>
  <strong><em>Out Pass Info: <?php echo $rowop['outing_info'] ?> </em></strong>  <br>

  <?php
  $nil2 = $rowrp['username'];
  $sql_nil2 = mysqli_query($link,"SELECT * FROM $nil2 WHERE output=1 ");
  $countsnil2 = mysqli_num_rows($sql_nil2);
 
  if($countsnil2>0)
  {
   echo " <strong><em> Unsubmitted Outpass: $countsnil2  </em></strong>  <br>";
  }else{
    echo " <strong><em> Unsubmitted Outpass: NILL  </em></strong>  <br>";
  }
  

?>


    </div>
</div>


<div class="collapse" id="<?php echo $flnamerp ?>2">
  <div class="card card-body">

  <?php 
   $value= $rowrp['username'] ;
  $stuapn2 = $rowrp['application_number'];
  
  ?>

<em><strong> Qn: <?php echo $rowrp['qn'] ?></strong></em><br>
<em><strong> Reply:<?php echo $rowrp['reply'] ?> </strong></em><br>
<form action="ask.php " method=" GET">
<h6 class="input-group">
 
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="ci" value= <?php echo $ci ?> >
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="ct" value= <?php echo $ct ?> >
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="from" value=" <?php echo $type ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="to" value=" <?php echo $value ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="apn" value=" <?php echo $apn ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="tname" value=" <?php echo $tname ?> " placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="section" value= 1 placeholder=" <?php echo $row5['username'];  ?>  ">
<input type="text" style="display:none;" id="disabledTextInput" class="form-control" name="stuapn2" value=" <?php echo  $stuapn2 ?>  " placeholder=" <?php echo $row5['username'];  ?>  ">

  <span class="input-group-text">MESSAGE</span>
  <textarea class="form-control"  name="message" placeholder="Don't leave empty! before send" aria-label="With textarea"></textarea>&nbsp; <input type="submit" name="submit" id="register" value="send" class="btn btn-info">

</h6>
</form>
</div>
</div>
   
   
  </div>
 
</div>

   <?php  endwhile; }?>
 

<!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2--><!--tab2-->





  </div>

<!-- link--><!-- link--><!-- link--><!-- link--><!-- link--><!-- link--><!-- link--><!-- link--><!-- link--><!-- link--><!-- link-->
  <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact1-tab">
  <center class="text-danger"> wellcome </center>
  </div>
 
</div>
<div style="margin-bottom:0px; margin-top:170px;" class="dropdown-divider"></div>
<?php
}
?>
</div>
    </body>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="slider/script.js"></script>




<footer style="background-color:#3B3B3B;" class="page-footer grey darken-3">
<div  style="background-color:grey;" class="footer-copyright grey darken-2">
<div style="padding:10px;"  style="background-color:white;" class="container center-align"><center>2018-2022 Batch </center>  </div>
</div>
<div  class="container">

<div style="padding:10px;" class="row">

<div id="services" class="col s12 l6">
<h5 style="color:white;"> services</h5>
<ul>
<a style="text-decoration:none;  " href="../mainpage.php" class="grey-text text-lighten-3"><h8 style="color:white;" >home</h8>&nbsp;<i style="color:white;" class="fa fa-home"></i></a> &nbsp; &nbsp;
<a style="text-decoration:none;" href="#" class="grey-text text-lighten-3"><h8 style="color:white;" >about</h8> &nbsp; <i style="color:white;" class="fa fa-info"></i></a>&nbsp; &nbsp;
<a style="text-decoration:none;" href="  http://www.periit.com" class="grey-text text-lighten-3"><h8 style="color:white;" >Peri IT </h8>&nbsp;<i style="color:white;" class="fa fa-graduation-cap "></i></a>
</ul>
<p> </p>
</div>

<div id="connect" class="col s12 l4 ">
<h5 style="color:white;" > Connect</h5>
<ul>
<a href="#" style="text-decoration:none;" class="grey-text text-lighten-3"><h8 style="color:white;" >Facebook</h8> &nbsp;<i style="color:white;" class="fa fa-facebook"> </i> </a>&nbsp; &nbsp;
<a href="#" style="text-decoration:none;" class="grey-text text-lighten-3"><h8 style="color:white;" >Twitter</h8> &nbsp;<i style="color:white;" class="fa fa-twitter"></i> </a>&nbsp; &nbsp;
<a href="#" style="text-decoration:none;" class="grey-text text-lighten-3"><h8 style="color:white;" >LinkedIn</h8> &nbsp;<i style="color:white;" class="fa fa-linkedin-square"></i> </a>
</ul>
</div>



</div>

</div>
<div style="background-color:#000000;" class="footer-copyright grey darken-4">
<div class="container center-align"><center style="padding:3px;" > <h8 style="color:white; " >&copy; 2021 Art4lyf copyrights owned by srini kc </h8></center> </div>
</div>
</footer> 


</html>
<?php 

}
else {

    echo "<script>location.href='runtest.php'</script>";
}
?>