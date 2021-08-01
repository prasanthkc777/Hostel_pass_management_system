

<?php 
// Initialize the session

session_start();

// Include config file
include "configs.php";


 
// Define variables and initialize with empty values
$new_password = $application_number = $confirm_password = "";

 
// Processing form data when form is submitted

if(isset($_POST['submit']))
{

    $application_number = $_POST['application_number'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_type = $_POST['user_type'];

        
    if($user_type == 0)
     {
 
          $sql =  "UPDATE users SET confirm_password='$confirm_password',password='$new_password' WHERE application_number='$application_number'";
        
     
    $result = mysqli_query($link, $sql);
    if($result)
            {
    
 
                // Password updated successfully. Destroy the session, and redirect to login page
                
                header("location: practice.php");
                exit();
            } 
           
       
   
            mysqli_free_result($result);
            mysqli_close($link);
    // Close connection
     }
        else if($user_type == 1)
        {
            $sqlw =  "UPDATE admin SET confirm_password='$confirm_password',password='$new_password' WHERE application_number='$application_number'";
        
       
      $resultw = mysqli_query($link, $sqlw);
      if($resultw)
              {
      
   
                  // Password updated successfully. Destroy the session, and redirect to login page
                  
                  header("location: practice.php");
                  exit();
              } 
             
         
     
            
              mysqli_free_result($resultw);
              mysqli_close($link);
      // Close connection


        }
   
}



?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>forget Password</title>
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
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }




        body{
background:  url("pic1.jpg");
background-size: cover;
background-position: center;
min-height: 200px;
background-image: blur(10px);

 
}
    </style>

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
</head>
<body>

<div class="container" 
style="
        
     
  

  
        background:rgb(0,0,0,0.6);
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0 15px 25px rgb(38, 37, 37);
            
            
            margin-bottom: 75px;padding:30px;width:60vh; margin-top: 3% !important; "

 >

    <div class="wrapper">
        <h2 style="color:white;">Forget Password ?</h2>
        <p style="color:#eeeeee;">Here...Please fill out this form to reset your password.</p>
        <form action="forgetpassword.php" onsubmit="myfun()" method="POST"> 

        <div class="form-group">
                <label  style="color:aqua;"> user type</label>
                <label>
        <input class="with-gap" name="user_type" id="user_type" value="0"type="radio"  />
        <span style="color:#eeeeee;">Student</span>
      </label>
                <input type="radio" name="user_type" id="user_type" value="0" unchecked /> &nbsp;
              
                <label>
        <input class="with-gap" name="user_type" id="user_type" value="1" type="radio"  />
        <span style="color:#eeeeee;">Staff</span>
      </label>
                <input type="radio" name="user_type" id="user_type" value="1" unchecked /> &nbsp;
               
            </div>

        <div class="form-group">
                <label  style="color:aqua;">application/id number</label>
                <input type="number" name="application_number" id="application_number" class="form-control" required="" >
              
                            
            </div>

            <div class="form-group">
                <label  style="color:aqua;">New Password</label>
                
<span style="float: right;
    
   
    transform: translate(0,-50%);
    
    cursor: pointer;
" class="eye"  onclick="toggle()" >
    <i class="fa fa-eye"  style=" display: none ;
   " id="hide1" ></i> 
    <i class="fa fa-eye-slash"  id="hide2" ></i>

</span>
                <input type="password" name="new_password" id="new_password" required="" class="form-control">
               
            </div>
            <div class="form-group">
                <label  style="color:aqua;">Confirm Password</label>
                
<span style="float: right;
    
    transform: translate(0,-50%);
    
    cursor: pointer;
" class="eye" onclick="toggles()" >
    <i class="fa fa-eye" style=" display: none;
    "  id="hides1" ></i> 
    <i class="fa fa-eye-slash"  id="hides2" ></i>

</span>
                <input type="password" name="confirm_password" id="confirm_password" required="" class="form-control ">
               
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            
            </div>
        </form>
    </div>    

    </div>

    <script>
    function myfun() {

        var a = document.getElementById("new_password").value;
        var b = document.getElementById("confirm_password").value;

        if (a != b) {
            alert("password didn't mach try again. redirected to login page !");

         
            
            return false;
           

        }
        else {





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


</body>
</html>


