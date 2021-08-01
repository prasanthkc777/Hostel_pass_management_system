<?php 




?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>  

         
<style>
body{
background: url("main3.jpg");
background-size: cover;
background-position: center;
min-height: 1000px;

}
@media screen and (max-width: 670px){
    body{
        min-height: 500px;
    }
}



</style>



<header>
<nav class="nav-wrapper transparent">
<div class="container">
<a href="" class="brand-logo">Hostel Pass</a>
<a href="" class="sidenav-trigger" data-target="mobile-menu">
<i class="material-icons">Menu</i>
</a>
<div class="hover">
<ul class="right hide-on-med-and-down">

<li><a href="Clogin.php"> Creator Login</a>
<li><a href="#"> contact</a>
<li><a href="#"> Help</a>
</ul>
<ul class="sidenav black lighten-5" id="mobile-menu">
<li><a href="Clogin.php"> Creator Login</a>
<li><a href="#"> contact</a>
<li><a href="#"> Help</a>
</ul>
</div>
</div>


        
</nav>
</header>
</head>

<body>
<strong class="brand-logo"><h1 style="color:#00A9DF;"><center>Wellcome !</center></h1><strong><br> <br> <br>
<p> <center><em><h5 style="color:white;">Just Click the Log-in & get your Outpass<h5></em></center </p>
<center><a  href="  tuts/studentLogin.php " class="waves-effect waves-light btn-large indigo"><i class='fa fa-angle-double-right 'style="color:white;" aria-hidden='true'></i> &nbsp;Go-to Log in</a> </center>

<br>
<br><br>
<p><center><em><h5 style="color:white;">Are you new to here ? Ok,let's jump in to sign-up<h5></em> </center </p>
<center><a href="  tuts/signup.php" class="waves-effect waves-light btn-large indigo"><i class='fa fa-angle-double-right 'style="color:white;" aria-hidden='true'></i> &nbsp;Go-to Sign up</a> </center>


<br> <br> <br> <br> <br> <br> <br> <br> 
<br> <br> <br> <br> <br> <br> <br> <br> 
</body>
<script>

$(document).ready(function(){
$('.sidenav').sidenav();
$('.collapsible').collapsible();
});

//Or with jQuery

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });


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
<a href="mainpage.php" class="grey-text text-lighten-3">home&nbsp;<i class="fa fa-home"></i></a> &nbsp; &nbsp;
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