<?php
include "configs.php";


session_start();

if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}

if(isset($_SESSION['apn']))
{
  
if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}

$sql_query = "SELECT username  from users where application_number=  $apn ";
$retval = mysqli_query($link,$sql_query);

$row = mysqli_fetch_array($retval);
   
    $username = $row['username'];
   

// logout
if(isset($_GET['but_logout'])){
    $_SESSION = array();
    session_destroy();
    $start ==0;
    header('Location: studentLogin.php');
}
?>
<!doctype html>
<html>
<title> student </title>
    <head>
 
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
  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-message" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Meassage</button>
  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">New  </button>
  <button class="nav-link" id="nav-usernames-tab" data-bs-toggle="tab" data-bs-target="#nav-usernames" type="button" role="tab" aria-controls="nav-usernames" aria-selected="false">Usernames  </button>

 
  </div>
</nav>


<div class="tab-content md-3 " id="messageContent">

<div class="tab-pane fade show active" id="nav-message" role="tabpanel" aria-labelledby="nav-home-tab">
<?php 

$sql_msg = mysqli_query($link,"SELECT * FROM message WHERE For_=$apn  AND status =0 " );
$countsmsg = mysqli_num_rows($sql_msg);


$sql_msg1 = mysqli_query($link, "SELECT * FROM message WHERE For_=$apn AND status =0");
         
if(mysqli_num_rows($sql_msg1)>0)
{
    
    while($resultmsg = mysqli_fetch_assoc($sql_msg1))
    {

$popmsg= $resultmsg['message'];

$popfrom= $resultmsg['From_'];
$popid= $resultmsg['id'];
$popca= $resultmsg['created_at'];

?>
<p>
  <a class="btn btn-light" data-bs-toggle="collapse" href="#popmsg<?php echo $popid ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
 From: <?php  echo $popfrom ?>
  </a>

</p>
<div class="collapse" id="popmsg<?php echo $popid ?>">
  <div class="card card-body">
<center> 
   MESSAGE :  <?php  echo $popmsg ?> <br>
   Time :<?php  echo $popca ?> <br>
   &nbsp;&nbsp;&nbsp;&nbsp;<a href="readmsg.php?id=<?php echo $popid ?>&tname=<?php echo $tname ?>&apn=<?php echo $apn ?>" ><button type="button" class="btn btn-secondary">Read</button></a>
</center>

   </div>
</div>
<?php


    }
  }else{

?>



  <h7  class="text-danger " ><center> <em> sorry! No new messages </em> </center> </h7>
  <?php
}

?>




</div>

<div class="tab-pane fade" id="nav-new" role="tabpanel" aria-labelledby="nav-profile-tab">


<form action="message.php"  method="GET">
      <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">To</span> <br><br>
  <input type="text" name="for" class="form-control" placeholder="username" aria-label="Username" aria-describedby="addon-wrapping">
</div>
     
    <div class="input-group">
    <input type="text" style="display:none;"  name="from" value=<?php echo $username ?>>
    <input type="text" style="display:none;"  name="tname" value=<?php echo $tname ?>>
    <input type="text" style="display:none;"  name="apn" value=<?php echo $apn ?>>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>

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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>
<script type="text/javascript" src="slider/script.js"></script>

    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    .container .form-control {
        width:none;
    }
    #count{
        border-radius: 50%;
        position: relative;
        top: -10px;
        left: -10px;
    }

    body{
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
    <style type="text/css">

#slider {
	overflow: hidden;
}
#slider figure {
	position: relative;
	width: 500%;
	margin: 0;
	left: 0;
	animation: 15s slider infinite;
}
#slider figure img {
	float: left;
	width: 20%;
}

@keyframes slider {
	0% {
		left: 0;
	}
	20% {
		left: 0;
	}
	25% {
		left: -100%;
	}
	45% {
		left: -100%;
	}
	50% {
		left: -200%;
	}
	70% {
		left: -200%;
	}
	75% {
		left: -300%;
	}
	95% {
		left: -300%;
	}
	100% {
		left: -400%;
	}
}

</style>

    </head>
    
    <nav style="background-color:#616161; " class="navbar navbar-expand-lg navbar-light transparent ">
    <div class="container">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h4 style="color:white;">HOSTEL PASS</h4></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<?php 
$sql_get = mysqli_query($link,"SELECT * FROM $username WHERE status =0");
$counts = mysqli_num_rows($sql_get);

?>

   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

     &nbsp; &nbsp;<a  style="width:125px; height:50px;" href="logout.php" type="submit" value="Logout" name="but_logout"  > <button type='button' class='btn btn-light' style="width:125px; height:40px; ">Log-Out</button></a>
     
    
        &nbsp; &nbsp; <button type='button' class='btn btn-secondary' style="width:125px; height:40px; " data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Pass History</button>
        <!-- Example single danger button -->

        <li class="nav-item dropdown">
          <a style="color:white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
          notifications <i class="fa fa-bell"></i>       <span class="badge badge-danger " id="count"> <?php echo $counts;  ?></span>
          </a>
          
          <ul class="dropdown-menu p-3 text-muted " style="max-width:200px;" aria-labelledby="navbarDropdown">
          <p>
          

          <?php
             

          $sql_get1 = mysqli_query($link, "SELECT * FROM $username WHERE status=0");
         
          if(mysqli_num_rows($sql_get1)>0)
          {
              
              while($result = mysqli_fetch_assoc($sql_get1))
              {
               
                  echo '<a style="text-decoration:none; " class="container" class= "dropdown-item text-primary " href="notify.php?username='.$username.' & tname= '.$username.'Profile & application_number='.$apn.' & id='.$result['id'].'">'.$result['message'].' </a> ';
                  echo '<div class="dropdown-divider"></div>';
                
              }
          }
          else{

            $result = mysqli_fetch_assoc($sql_get1);

            
   
            $sqlid= mysqli_query($link, "SELECT MAX( id ) AS max FROM $username" );
     $resid = mysqli_fetch_array( $sqlid);
     $highestValue = $resid['max'];
   
     
        
          
              echo '<div style="text-decoration:none;"  class="container" class= "dropdown-item text-danger font-weight-bold"> <i class="fa fa-frown-open"></i> sorry! No new notifications  </div>';
              echo '<div class="dropdown-divider"></div>';
             echo '<div style="text-decoration:none; "   class="container" class= "dropdown-item text-danger font-weight-bold"><a style="text-decoration:none; color:indigo; "  href="notify.php?username='.$username.' & tname= '.$username.'Profile & application_number='.$apn.' & id='.$highestValue.'   " >see last notification</a> </div>';
    
            }
          
        
          ?>
          </p>
           
        
           
          </ul>
        
         
        </li>
       
      
      </ul>
      <a class="navbar-brand" href="upload_images/index.php?tname=<?php echo $username; echo "Profile";?> & application_number=<?php echo $apn; ?> "> <strong><em  style="color:white;" >Profile </em> </strong><i  style="color:white;" class="fa fa-user-circle "></i></a>
   <ul style="marker:none;color:white;">
    
<?php echo date("h:i:s:a");
echo "<br>";
echo "today".date("d-m-y");

?>

      </ul>           
    </div>
  </div>
  </div>

</nav>

    <body>
    
    <button style="
    
    
    " id="message" type="button"  data-bs-toggle="modal" data-bs-target="#chatmessage" class="btn btn-primary rounded-circle">   <i class="fa fa-comment"  ></i><u1 class="badge badge-danger " id="count"><?php echo $countsmsg;  ?>  </u1> </button> 
   
<div style="size:70px;" class="container shadow  bg-body ">
<div  style="padding:0%;" class="card  ">
  <div style="padding:0px;  " class="card-body ">
  <div id="slider">
		<figure>
			<img style="height:70vh;" src="canva1.png">
			<img style="height:70vh;" src="canva2.png">
			<img style="height:70vh;" src="canva3.png">
			<img style="height:70vh;" src="canva1.png">
			<img style="height:70vh;"src="canva2.png">
		</figure>
	</div>
  </div>
</div>
  

    </div>

<!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form-->
        
        <form  action="homepage2.php?application_number = <?php echo $_GET['application_number'];?> & tname = <?php echo $tname ?>" method="GET" >

        <div class="container" style="
        
     
  

  
    background:rgb(0,0,0,0.6);
    box-sizing: border-box;
    border-radius: 10px;
    box-shadow: 0 15px 25px rgb(38, 37, 37);
        
        
        margin-bottom: 75px;padding:30px;width:60vh; margin-top: 1% !important; ">
     
        <div class="form-group">
                <label style="color:#00DCE3;">application/id number</label>
                <input style="
                
               
   
  
    color: rgb(255, 255, 255);
   
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    background: transparent;
                
                
                
                " type="number" name="application_number" id="application_number" class="form-control" >


            </div>

        <div  class="form-group">
                <label style="color:#00DCE3;">Out date</label>
                <input 
                style="
                
               
   
  
                color: rgb(255, 255, 255);
               
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid white;
                outline: none;
                background: transparent;
                            
                            
                            
                            "
                
                 type="datetime-local" name="out_date" id="out_date" class="form-control"  >
              
                            
            </div>
            <div class="form-group">
                <label style="color:#00DCE3;">In date</label>
                <input 
                style="
                
               
   
  
                color: rgb(255, 255, 255);
               
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px  solid white;
                
                outline: none;
                background: transparent;
                            
                            
                            
                            "
                
                
                 type="datetime-local" name="in_date" id="in_date" class="form-control"  >
              
                            
            </div>
            <div class="form-group">
            <lable style="color:#00DCE3;">Outpass Detail</label><br><br>
              <textarea 
              style="
                
               
   
  
                color: rgb(255, 255, 255);
               
                margin-bottom: 30px;
                border: none;
                border-bottom: 1px solid white;
                border-top: 1px  solid white;
                outline: none;
                background: transparent;
                            
                            
                            
                            "
              
              
               cols="40" rows="7" name="outting_info" id="outting_info" ></textarea>
               
                            
            </div>
            <h8 style="color:white;"> make sure that your profile is completed ! before submit</h8> <br><br> <br>
            <div class="form-group">
                <input 
                
                
                
                 type="submit" name="submit" id="register"  class="btn btn-primary">

            </div>

            </div>

          
        </form>
 <!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form--><!--form-->   
    </body>


    <footer style="background-color:#3B3B3B;" class="page-footer grey darken-3">
<div  style="background-color:grey; padding:10px;" class="footer-copyright grey darken-2">
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
<div class="container center-align"><center > <h8 style="color:white;" >&copy; 2021 Art4lyf copyrights owned by srini kc </h8></center> </div>
</div>
</footer> 


</html>

<?php 


$outdate = $application_number=  $indate = $info = "";



if(isset($_GET['submit']))

{
    if(isset($_GET['tname'])){
        $tname = $_GET['tname'];
    }
    
    
if(!empty($_GET['out_date']) && !empty($_GET['out_date']) && !empty($_GET['out_date']) && !empty($_GET['out_date']))

{

    
    $outdate = mysqli_real_escape_string($link,trim( $_GET['out_date']));
    $indate =  mysqli_real_escape_string($link,trim($_GET['in_date']));
    $info =  mysqli_real_escape_string($link,trim($_GET['outting_info']));
    $application_number =  mysqli_real_escape_string($link,trim($_GET['application_number']));
    $apn = $application_number;
    
    $sql_query = "SELECT username  from users where application_number=  $apn ";
$retval = mysqli_query($link,$sql_query);

$row = mysqli_fetch_array($retval);
   
    $username = $row['username'];
    $profile = "Profile" ; 

          $tname = $username.$profile;



  $dup = mysqli_query($link,"SELECT * FROM outpass WHERE out_date='$outdate'");
    if(mysqli_num_rows($dup)>0)
    {
      
    }else{
     
    $sql5 = "INSERT INTO outpass (out_date,in_date,outing_info,application_number) VALUES( '$outdate','$indate','$info','$application_number' )";
      
    $result5 = mysqli_query($link,$sql5);

    if ($result5)
    {
        $sql_insert1 = "INSERT INTO $username (message,From_) VALUES('your outpass has been submitted successfully ! and sent to class_incharge for verification. ','class_incharge') ";

        $result3 = mysqli_query($link,$sql_insert1);
        $requests = " INSERT INTO requests (application_number,tname,username,stage,status) VALUES('$apn','$tname','$username','0','0') ";

        $requestresult = mysqli_query($link,$requests);
    }
    else{
        echo "<script type='text/javascript'>alert('Enter valid data');</script>";
    }
   
  

// Close connection

    echo "<script type='text/javascript'>alert('your outpass has been submitted successfully ! and sent to  verification. refresh page & check notification for further update');</script>";
              
}             

   
}
else
{
    echo 'fields are empty';
}

}
?>
<?php 
}

else
{
    echo "<script>location.href='runtest.php'</script>";
}

?>



   <!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history -->

   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Pass info</h5>
         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

      <nav>
  <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Submit. </button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Expired.  </button>
    <button class="nav-link" id="nav-op-tab" data-bs-toggle="tab" data-bs-target="#nav-op" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Current Pass.  </button>
   
    </div>
</nav>


<div class="tab-content md-3 " id="nav-tabContent">

<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<!--table--><!--table--><!--table--><!--table--><!--table--><!--table--><!--table--><!--table-->

<?php


      $pass = mysqli_query($link," SELECT * FROM outpass WHERE application_number = $apn AND passop = 0 AND output = 1 order by 1 desc");
      $i = 0;
      if ($pass){
        if(mysqli_num_rows($pass)>0 )
        {
        
        
        
        while($passwhile = mysqli_fetch_assoc($pass )){
         
            $sl = ++$i;
            $idp = $passwhile['id'];
            $passat = $passwhile['created at'];
        
        $passinfo = $passwhile['outing_info'];
        $passid = $passwhile['id'];
        $passapn = $passwhile['application_number'];
        
        
        ?>
        <div class="container">
        <td class="text-center"> <?php echo $sl ?> . </td>
        
        <td class="text-left">Created at - <?php echo $passat ?></td>
        
         
         <p>
          <a class="btn btn-info" data-bs-toggle="collapse" href="#cop<?php echo $passid?>" role="button" aria-expanded="false" aria-controls="collapseExample">
            Info
          </a>  &nbsp; <a class="btn btn-primary" href="passsubmit.php?passid=<?php echo $passid ?> &apn= <?php echo $apn  ?> & username= <?php  echo $username ?>"> Submit </a> 
         
        </p>
         
        <div class="collapse" id="cop<?php echo $passid ?>">
          <div class="card card-body">
          
        
          <!-- outpass -->
          <?php
        
        $sqluserop = mysqli_query($link, "SELECT * FROM users WHERE application_number = $passapn " );
        $sqluserop2 = mysqli_fetch_array(  $sqluserop);
        $sqlopuname = $sqluserop2['username'];
        $sqlopprofile = "Profile";
        $sqlopfull= $sqlopuname.$sqlopprofile;
        
            $sql_selectop = "SELECT * FROM $sqlopfull ";
                  $retop = mysqli_query($link,$sql_selectop);
                  $mainop = mysqli_fetch_array($retop);
                  $imageop = $mainop['image'];
        
                  $sql_selectop2 = "SELECT * FROM outpass WHERE id = $passid ";
                  $retop2 = mysqli_query($link,$sql_selectop2);
                  $ottop = mysqli_fetch_array($retop2);
                  ?>
        
            <div class="container z-depth-5" style="margin-top: 52px;">
            
            <div class="card z-depth-5 mb-3" style="background-color: #f0f0f0;">
           
                <div class="row g-0">
        
                   
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://localhost/tuts/upload_images/view.php?username= <?php echo $sqlopuname ?> "
                            style="margin-left:50px; margin-top:100px; padding: 5px; width:  200px; height: 200px;"
                            alt="profile" class="responsive-img center ">
                            <br>
                            <p class="text-muted center" style="padding-right:50px; padding-left:75px;">Scan For More Info</p>
                    
                   <br>
        
        
                   
                        <div class="card-body">
                       
                            
                            <div class="dropdown-divider "></div>
                             <img src="upload_images/image/<?php echo $imageop?>"
                                style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle"><em><strong>Student Name:<?php echo $mainop['u_f_name']; echo"."; echo $mainop['u_l_name'];?> </strong></em>
                            <p class="card-text"><u> application/id number:<?php echo $mainop['u_card']?>  </u>  <div class="dropdown-divider "></div></p>
                            <p class="card-text"><u> department: <?php echo $mainop['department']?>    </u>  <div class="dropdown-divider "></div></p>
                            <p class="card-text"><u>  <?php echo $mainop['year']?> year  </u> &nbsp;
                                <u>  <?php echo $mainop['section']?>  section </u>  <div class="dropdown-divider "></div>
                            </p>
                            
                            <p><em><strong>This outpass is valid from<u>  <?php echo $ottop['out_date']?>   </u> to <u> 
                            <?php echo $ottop['in_date']?>  </u></strong></em></p>
                            <p><em> Outing Info : <?php echo  $ottop['outing_info']  ?>  </em> </p>
                            <p><em> <strong  >Officially verified by Class incharge, HOD and Hostel warden</strong></em></p>
                        </div>
                        
                       
        
            </div>
        
                </div>
            </div>
        
        
        
        
        
          </div>
        </div>
        </div>
        <div class="dropdown-divider"></div>
        
        <?php
        
        }
        }

      }


else{

    
    echo '<h7  class="text-danger " ><center> <em> sorry! No outpass available </em> </center> </h7>';
}


//<!--table--><!--table--><!--table--><!--table--><!--table--><!--table--><!--table-->
         
?>


</div>

<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

<?php


         
      $pass = mysqli_query($link," SELECT * FROM outpass WHERE application_number = $apn AND passop = 1 order by 1 desc");
      $i = 0;
      if(mysqli_num_rows($pass)>0)
{



while($passwhile = mysqli_fetch_assoc($pass )){
 
    $sl = ++$i;
    $idp = $passwhile['id'];
    $passat = $passwhile['created at'];

$passinfo = $passwhile['outing_info'];
$passid = $passwhile['id'];
$passapn = $passwhile['application_number'];


?>
<div class="container">
<td class="text-center"> <?php echo $sl ?> . </td>

<td class="text-left">Created at - <?php echo $passat ?></td>

 
 &nbsp;
  <a class="btn btn-info" data-bs-toggle="collapse" href="#cop<?php echo $passid?>" role="button" aria-expanded="false" aria-controls="collapseExample">
    Info
  </a> 
 

 
<div class="collapse" id="cop<?php echo $passid ?>">
  <div class="card card-body">
  

  <!-- outpass -->
  <?php

$sqluserop = mysqli_query($link, "SELECT * FROM users WHERE application_number = $passapn " );
$sqluserop2 = mysqli_fetch_array(  $sqluserop);
$sqlopuname = $sqluserop2['username'];
$sqlopprofile = "Profile";
$sqlopfull= $sqlopuname.$sqlopprofile;

    $sql_selectop = "SELECT * FROM $sqlopfull ";
          $retop = mysqli_query($link,$sql_selectop);
          $mainop = mysqli_fetch_array($retop);
          $imageop = $mainop['image'];

          $sql_selectop2 = "SELECT * FROM outpass WHERE id = $passid ";
          $retop2 = mysqli_query($link,$sql_selectop2);
          $ottop = mysqli_fetch_array($retop2);
          ?>

    <div class="container z-depth-5" style="margin-top: 52px;">
    
    <div class="card z-depth-5 mb-3" style="background-color: #f0f0f0;">
   
        <div class="row g-0">

           
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://localhost/tuts/upload_images/view.php?username= <?php echo $sqlopuname ?> "
                    style="margin-left:50px; margin-top:100px; padding: 5px; width:  200px; height: 200px;"
                    alt="profile" class="responsive-img center ">
                    <br>
                    <p class="text-muted center" style="padding-right:50px; padding-left:75px;">Scan For More Info</p>
            
           <br>


           
                <div class="card-body">
               
                    
                    <div class="dropdown-divider "></div>
                     <img src="upload_images/image/<?php echo $imageop?>"
                        style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle"><em><strong>Student Name:<?php echo $mainop['u_f_name']; echo"."; echo $mainop['u_l_name'];?> </strong></em>
                    <p class="card-text"><u> application/id number:<?php echo $mainop['u_card']?>  </u>  <div class="dropdown-divider "></div></p>
                    <p class="card-text"><u> department: <?php echo $mainop['department']?>    </u>  <div class="dropdown-divider "></div></p>
                    <p class="card-text"><u>  <?php echo $mainop['year']?> year  </u> &nbsp;
                        <u>  <?php echo $mainop['section']?>  section </u>  <div class="dropdown-divider "></div>
                    </p>
                    
                    <p><em><strong>This outpass is valid from<u>  <?php echo $ottop['out_date']?>   </u> to <u> 
                    <?php echo $ottop['in_date']?>  </u></strong></em></p> <p><em> Outing Info : <?php echo  $ottop['outing_info']  ?>  </em> </p>

                    <p><em> <strong  >Officially verified by Class incharge, HOD and Hostel warden</strong></em></p>
                </div>
                
               

    </div>

        </div>
    </div>





  </div>
</div>
</div>
<div class="dropdown-divider"></div>

<?php

}
} else{
              echo '<h7  class="text-danger " ><center> <em> sorry! No expired outpass available </em> </center> </h7>';
}
         
?>


</div>
<div class="tab-pane fade " id="nav-op" role="tabpanel" aria-labelledby="nav-op-tab">



<!--table--><!--table--><!--table--><!--table--><!--table--><!--table--><!--table--><!--table-->

<?php



$sqlidz= mysqli_query($link, "SELECT MAX( id ) AS max FROM outpass WHERE application_number = $apn AND passop = 0 AND output = 1 " );

if($sqlidz){
$residz = mysqli_fetch_array( $sqlidz);
$highestValuez = $residz['max'];



      $pass = mysqli_query($link," SELECT * FROM outpass WHERE  id= $highestValuez  order by 1 desc");
      $i = 0;


      if($pass)
{



$passwhile = mysqli_fetch_assoc($pass );
 
    $sl = ++$i;
    $idp = $passwhile['id'];
    $passat = $passwhile['created at'];

$passinfo = $passwhile['outing_info'];
$passid = $passwhile['id'];
$passapn = $passwhile['application_number'];


?>
<div class="container">
<td class="text-center"> <?php echo $sl ?> . </td>

<td class="text-left">Created at - <?php echo $passat ?></td>

 
 
  <a class="btn btn-info" data-bs-toggle="collapse" href="#cop<?php echo $passid?>" role="button" aria-expanded="false" aria-controls="collapseExample">
    Info
  </a> 

 
<div class="collapse" id="cop<?php echo $passid ?>">
  <div class="card card-body">
  

  <!-- outpass -->
  <?php

$sqluserop = mysqli_query($link, "SELECT * FROM users WHERE application_number = $passapn " );
$sqluserop2 = mysqli_fetch_array(  $sqluserop);
$sqlopuname = $sqluserop2['username'];
$sqlopprofile = "Profile";
$sqlopfull= $sqlopuname.$sqlopprofile;

    $sql_selectop = "SELECT * FROM $sqlopfull ";
          $retop = mysqli_query($link,$sql_selectop);
          $mainop = mysqli_fetch_array($retop);
          $imageop = $mainop['image'];

          $sql_selectop2 = "SELECT * FROM outpass WHERE id = $passid ";
          $retop2 = mysqli_query($link,$sql_selectop2);
          $ottop = mysqli_fetch_array($retop2);
          ?>

    <div class="container z-depth-5" style="margin-top: 52px;">
    
    <div class="card z-depth-5 mb-3" style="background-color: #f0f0f0;">
   
        <div class="row g-0">

           
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=http://localhost/tuts/upload_images/view.php?username= <?php echo $sqlopuname ?> "
                    style="margin-left:50px; margin-top:100px; padding: 5px; width:  200px; height: 200px;"
                    alt="profile" class="responsive-img center ">
                    <br>
                    <p class="text-muted center" style="padding-right:50px; padding-left:75px;">Scan For More Info</p>
            
           <br>


           
                <div class="card-body">
               
                    
                    <div class="dropdown-divider "></div>
                     <img src="upload_images/image/<?php echo $imageop?>"
                        style="padding: 5px;  width: 100px; height: 100px;"alt="profile" class="responsive-img rounded-circle"><em><strong>Student Name:<?php echo $mainop['u_f_name']; echo"."; echo $mainop['u_l_name'];?> </strong></em>
                    <p class="card-text"><u> application/id number:<?php echo $mainop['u_card']?>  </u>  <div class="dropdown-divider "></div></p>
                    <p class="card-text"><u> department: <?php echo $mainop['department']?>    </u>  <div class="dropdown-divider "></div></p>
                    <p class="card-text"><u>  <?php echo $mainop['year']?> year  </u> &nbsp;
                        <u>  <?php echo $mainop['section']?>  section </u>  <div class="dropdown-divider "></div>
                    </p>
                    
                    <p><em><strong>This outpass is valid from<u>  <?php echo $ottop['out_date']?>   </u> to <u> 
                    <?php echo $ottop['in_date']?>  </u></strong></em></p>
                    <p><em> Outing Info : <?php echo  $ottop['outing_info']  ?>  </em> </p>
                    <p><em> <strong  >Officially verified by Class incharge, HOD and Hostel warden</strong></em></p>
                </div>
                
               

    </div>

        </div>
    </div>





  </div>
</div>
</div>
<div class="dropdown-divider"></div>

<?php

}else{

    
  echo '<h7  class="text-danger " ><center> <em> sorry! No outpass available </em> </center> </h7>';
}
}


//<!--table--><!--table--><!--table--><!--table--><!--table--><!--table--><!--table-->
         
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





<!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history --><!-- history -->


