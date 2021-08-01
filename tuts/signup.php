<?php 

$link = mysqli_connect('localhost','srini','gauranitai','peri_hostel');

if(!$link){
    echo 'connection error: '.mysqli_connect_error();
}


$username = $mobile_number = $application_number = $password = $confirm_password=  $date = $gender = $user_type = "";




if(isset($_POST['submit']))
{
    
    $username = $_POST['username'];
    $mobile_number = $_POST['mobile_number'];
    $application_number = $_POST['application_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $date = $_POST['date'];
    $gender =$_POST['gender'];
    $user_type = $_POST['user_type'];
$profile="Profile";
$tname = $username.$profile;
   
         
 if($user_type == 0)
 {
 

          $sql = "INSERT INTO users (username,password,confirm_password,mobile_number,application_number,date_of_birth,gender,user_type) VALUES( '$username','$password','$confirm_password', '$mobile_number', '$application_number','$date','$gender','$user_type' )";
  
    $result = mysqli_query($link, $sql);


    $message = "CREATE TABLE   $username (
      id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      message varchar(255) NOT NULL,
      reply int(2) NOT NULL,
      status int(2) NOT NULL default(0),
      output int(2) NOT NULL default(0),
      From_ varchar(255) NOT NULL,
      passid int(255) NOT NULL,
      created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
     
      )";
       $noti = mysqli_query($link,$message);
     
       $message = "CREATE TABLE  $tname (
        `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`u_card` varchar(12) NOT NULL,
`u_f_name` text NOT NULL,
`u_l_name` text NOT NULL,
`u_father` text NOT NULL,
`u_aadhar` varchar(12) NOT NULL,
`u_birthday` text NOT NULL,
`u_gender` varchar(6) NOT NULL,
`u_email` text NOT NULL,
`u_phone` varchar(10) NOT NULL,
`u_state` varchar(12) NOT NULL,
`u_dist` text NOT NULL,
`u_village` text NOT NULL,
`u_police` text NOT NULL,
`u_pincode` text NOT NULL,
`file` longblob NOT NULL,
`u_mother` varchar(30) NOT NULL,
`u_family` text NOT NULL,
`staff_id` varchar(12) NOT NULL,
`image` varchar(150) NOT NULL,
`department` text NOT NULL,
`year` text NOT NULL,
`section` text NOT NULL,
`uploaded` datetime NOT NULL
      )";
       $noti = mysqli_query($link,$message);
     
        


    if($result)
    {
      

 
      header('location: otpindex.php');

    
    
  }


     
     
 
}
 


 else if($user_type == 1)
  {

    $sqlw = "INSERT INTO admin (username,password,confirm_password,mobile_number,application_number,date_of_birth,gender,user_type) VALUES( '$username','$password','$confirm_password', '$mobile_number', '$application_number','$date','$gender','$user_type' )";

    $resultw = mysqli_query($link, $sqlw);

    $message = "CREATE TABLE   $username (
      id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      message varchar(255) NOT NULL,
      qn varchar(255) NOT NULL,
      status int(2) NOT NULL default(0),
      output int(2) NOT NULL default(0),
      From_ varchar(255) NOT NULL,
    
    
      created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
     
      )";
       $noti = mysqli_query($link,$message);
     
       $message = "CREATE TABLE  $tname (
        `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
`u_card` varchar(20) NOT NULL,
`u_f_name` text NOT NULL,
`u_l_name` text NOT NULL,
`u_father` text NOT NULL,
`u_aadhar` varchar(12) NOT NULL,
`u_birthday` text NOT NULL,
`u_gender` varchar(6) NOT NULL,
`u_email` text NOT NULL,
`u_phone` varchar(10) NOT NULL,
`u_state` varchar(12) NOT NULL,
`u_dist` text NOT NULL,
`u_village` text NOT NULL,
`u_police` text NOT NULL,
`u_pincode` text NOT NULL,
`file` longblob NOT NULL,
`u_mother` varchar(30) NOT NULL,
`u_family` text NOT NULL,
`staff_id` varchar(20) NOT NULL,
`image` varchar(150) NOT NULL,
`department` text NOT NULL,
`year` text NOT NULL,
`section` text NOT NULL,
`uploaded` datetime NOT NULL
      )";
       $noti = mysqli_query($link,$message);
     
        
       
     
    if($resultw)
    
    {
    
 
      header('location: otp/PhoneNumber.php');

    
    }


     
 
  }

     
 
 

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
    body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
    }
    body{
background:  url("pic1.jpg");
background-size: cover;
background-position: center;
min-height: 1000px;

 
}
    </style>
</head>
<nav class="nav-wrapper transparent ">
<div class="container">
<a href="" style="text-decoration:none;" class="brand-logo">Hostel Pass</a>
<a href="" class="sidenav-trigger" data-target="mobile-menu">
<i class="material-icons">Menu</i>
</a>
<div class="hover">
<ul class="right hide-on-med-and-down">

<li><a href="# "style="text-decoration:none;"> Creator Login</a>
<li><a href="#"style="text-decoration:none;"> contact</a>
<li><a href="#"style="text-decoration:none;"> Help</a>
</ul>
<ul class="sidenav black lighten-5" id="mobile-menu">
<li><a href="#"style="text-decoration:none;"> Creator Login</a>
<li><a href="#"style="text-decoration:none;"> contact</a>
<li><a href="#"style="text-decoration:none;"> Help</a>
</ul>
</div>
</div>

</nav>
<body>

<div class="container"   

style="
        
     
  

  
        background:rgb(0,0,0,0.6);
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0 15px 25px rgb(38, 37, 37);
            
            
            margin-bottom: 75px;padding:30px;width:70vh; margin-top: 3% !important; "

>
    <div class="wrapper">
        <h2 style="color:white;" >Sign Up</h2>
        <p style="color:#eeeeee;" >Please fill this form to create an account.</p>
        <form action="signup.php" onsubmit="myfun()" method="POST">
            <div class="form-group">
                <label  style="color:aqua;" >Username</label>
                <input type="text" name="username" id="username" placeholder="Username must be unique" class="form-control" required="">
<center style="color:#bdbdbd;">*No spaces allowed for usernames* </center>
            </div>
            <div class="form-group">
                <label  style="color:aqua;" >mobile number</label>
                <input type="number" name="mobile_number" id="mobile_number" class="form-control" required="">


            </div>
            <div class="form-group">
                <label  style="color:aqua;" >application/id number</label>
                <input type="number" name="application_number" id="application_number" placeholder="*Reg No for students*" class="form-control" required="">


            </div>
            <div class="form-group">
                <label  style="color:aqua;" >new Password</label>
                <span style="float: right;
    
   
    transform: translate(0,-50%);
    
    cursor: pointer;
" class="eye" style="color:white;" onclick="toggle()" >
    <i class="fa fa-eye"  style=" display: none;
   " id="hide1" ></i> 
    <i class="fa fa-eye-slash" style="color:white;" id="hide2" ></i>

</span>
                <input type="password" class="password" name="password" id="new_password" class="form-control" required="">

            </div>
            <div class="form-group">
                <label  style="color:aqua;" >confirm Password</label>
                <span style="float: right;
    
   
    transform: translate(0,-50%);
    
    cursor: pointer;
" class="eye" style="color:white;" onclick="toggles()" >
    <i class="fa fa-eye"  style=" display: none;
   " id="hides1" ></i> 
    <i class="fa fa-eye-slash" style="color:white;" id="hides2" ></i>

</span>
                <input type="password" class="confirm_password" name="confirm_password" id="confirm_password"
                    class="form-control" required="">

            </div>


            <div class="form-group">
                <label  style="color:aqua;" >date of birth</label>
                <input type="date" name="date" id="date" class="form-control" required="">

            </div>
            <div class="form-group">
                <label  style="color:aqua;" > Gender</label>
                <input type="radio" name="gender" id="gender" value="male" unchecked /> &nbsp; 
                <input type="radio" name="gender" id="gender" value="female" unchecked /> &nbsp;
               
                <label>
        <input class="with-gap" name="gender" id="gender" value="male" type="radio"  />
        <span style="color:#eeeeee;">Male</span>
      </label>
                <label>
        <input class="with-gap" name="gender" id="gender" value="female" type="radio"  />
        <span style="color:#eeeeee;">Female</span>
      </label>
               
                
            </div>
            <div class="form-group">
                <label  style="color:aqua;" > user type</label>
                <input type="radio" name="user_type" id="user_type" value="0" unchecked /> &nbsp;
                <label>
        <input class="with-gap" name="user_type" id="user_type" value="0" type="radio"  />
        <span style="color:#eeeeee;">Student</span>
      </label>
               
                <label>

        <input class="with-gap" name="user_type"  id="user_type" value="1" type="radio"  />
        <span style="color:#eeeeee;">Staff</span>
      </label>
                <input type="radio" name="user_type" id="user_type" value="1" unchecked /> &nbsp;
          
          
            </div>

         

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">

            </div>
            <p  style="color:  #80deea ;">Already have an account? <a class="btn  btn-primary " href="practice.php">Login here</a>.</p>
        </form>
    </div>

    </div>

    <script>
    function myfun() {

        var a = document.getElementById("password").value;
        var b = document.getElementById("confirm_password").value;

        if (a != b) {
            alert("password didn't mach try again.");
            return false;
        }
    }
    </script>

    
<script>
  function toggle()
  {
      var x = document.getElementById("new_password");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

      if(x.type === 'password'){
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
      }
      else{
        x.type = "password";
          y.style.display = "none";
          z.style.display = "block";

      }
      
  }
</script>
<script>
  function toggles()
  {
      var x = document.getElementById("confirm_password");
      var y = document.getElementById("hides1");
      var z = document.getElementById("hides2");

      if(x.type === 'password'){
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
      }
      else{
        x.type = "password";
          y.style.display = "none";
          z.style.display = "block";

      }
      
  }
</script>


</body>
<div class="footer-copyright grey darken-2">
<div style="padding:none;" class="container center-align">2018-2022 Batch  </div>
</div>
<footer  class="page-footer grey darken-3">

<div class="container">

<div class="row">

<div id="services" class="col s12 l6">
<h5> services</h5>
<ul>
<a href="../mainpage.php" class="grey-text text-lighten-3">home&nbsp;<i class="fa fa-home"></i></a> &nbsp; &nbsp;
<a href="#" class="grey-text text-lighten-3">about &nbsp; <i class="fa fa-info"></i></a>&nbsp; &nbsp;
<a href="  http://www.periit.com" class="grey-text text-lighten-3">Peri IT &nbsp;<i class="fa fa-graduation-cap "></i></a>
</ul>
<p> </p>
</div>

<div id="connect" class="col s12 l4 offset-12">
<h5> Connect</h5>
<ul>
<a href="#" class="grey-text text-lighten-3">Facebook &nbsp;<i class="fa fa-facebook"> </i> </a>&nbsp; &nbsp;
<a href="#" class="grey-text text-lighten-3">Twitter &nbsp;<i class="fa fa-twitter"></i> </a>&nbsp; &nbsp;
<a href="#" class="grey-text text-lighten-3">LinkedIn &nbsp;<i class="fa fa-linkedin-square"></i> </a>
</ul>
</div>



</div>

</div>
<div class="footer-copyright grey darken-4">
<div class="container center-align">&copy; 2021 Art4lyf copyrights owned by srini kc </div>
</div>
</footer> 
</html>

