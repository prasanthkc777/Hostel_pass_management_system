




<?php 

// Initialize the session
session_start();
 

include "configs.php";

if(isset($_POST['submit']))
{

    $apn = mysqli_real_escape_string($link,$_POST['apn']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
    $user_type = mysqli_real_escape_string($link,$_POST['type']);

 

    if ($user_type == "admin" )
    {

    if ($apn != "" && $password != "")
      {

        $sql_query = "SELECT count(*) as cntUser from admin where application_number='".$apn."' and password='".$password."'";
        $result = mysqli_query($link,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['apn'] = $apn;

            $sql_query = "SELECT username  from admin where application_number=  $apn ";
$retval = mysqli_query($link,$sql_query);

$row = mysqli_fetch_array($retval);
   
    $username = $row['username'];
   
         $profile = "Profile" ; 

          $tname = $username.$profile;
            
            header("Location: homepage1.php?tname= $tname &  application_number= $apn &ct= 0 &ci=0");
            
        }else{
            echo "Invalid username and password";
        }

      
      }

    }
    else if($user_type == "user")
    {

        if ($apn != "" && $password != "")
        {
     
          $sql_query = "SELECT count(*) as cntUser from users where application_number='".$apn."' and password='".$password."'";
          $result = mysqli_query($link,$sql_query);
          $row = mysqli_fetch_array($result);
  
          $count = $row['cntUser'];
  
          if($count > 0){
              $_SESSION['apn'] = $apn;

              $sql_query = "SELECT username  from users where application_number=  $apn ";
              $retval = mysqli_query($link,$sql_query);
              
              $row = mysqli_fetch_array($retval);
                 
                  $username = $row['username'];
                 
                       $profile = "Profile" ; 
              
                        $tname = $username.$profile;
             
              header("Location: homepage2.php?tname= $tname &  application_number= $apn");
              
          }else{
              echo "Invalid username and password";
          }
  
        }

    }

}


?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
<link rel="stylesheet" href="studentstyle.scss">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<title> hostel pass apply</title>

  </head>

  <body>

  <body background="bg.jpg">



  <nav>

<h3>HOSTEL PASS</h3>


</nav>

<marquee width="100%" direction="right" height="50em" loop="5" scrollamount="20" >
<p><h2> please login into page</h2></P>
</marquee>


<div class="box">

<img src="avathar.jpg" class="avathar">


<h2>log in</h2>

<form class="white" action="studentlogin.php" method="POST">



<div style="color:aqua;" class="user" style="position:absolute; top:20%;">
                    <tr>
                        <td><b >user type <i class="fa fa-key"></i> &nbsp; </b></td>
                        <td><select id="user" name="type">
                                <option value="-1">select </option>
                                <option value="admin">staff</option>
                                <option value="user">student</option>
                            </select></td>
                    <tr>
                </div>
                &nbsp;

<div class="inputbox">
    <i class="fa fa-user"></i>
<input type="integers" placeholder="...........enter your application no" name="apn" min="5" max="9999999999999"  required="">
    <label>application/ID no:</label>
   
</div>
<div class="inputbox">
    <i class="fa fa-lock"></i>
<input type="password" placeholder=".......enter your password" id="myInput" name="password"  required="">


<span class="eye" onclick="toggle()" >
    <i class="fa fa-eye" style="color:white;"  id="hide1" ></i> 
    <i class="fa fa-eye-slash" style="color:white;" id="hide2" ></i>

</span>

    <label >password:</label>

   



   
</div>




<span><p> <h4 style="color:skyblue">don't have a account ?     </h4> &nbsp; </P>
<input type="submit"  name="submit"  value="submit">
<p>
<a href="forgetpassword.php">forget password ?</a>
</p>


&nbsp;&nbsp; <br>

</span>
<div class="container">
<p> &nbsp; &nbsp;
   
<button type="button" class="button" ><a href="signup.php"><h4  style="color:black"> sign  up</h4></button>

</p>



</div>

</div>

<script>
  function toggle()
  {
      var x = document.getElementById("myInput");
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

<footer class="center">
            <div class="footer-content">
            <center>  <h3><b style="color:black">2k 18-22 batch</b></h3>/<center>
            <center> <p style="color:white" >use this website and get your outpass !!</p></center>
                <u1  style="  list-style: none;display: flex;align-items: center;  float: right; justify-content: center; "  class="socials">
                    <p>
                    <span><center>
                    <a class="social-items" style=" list-style: none;  transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="#">&nbsp;<i class="fa fa-facebook"></i></a>
                    </span>
                    <span>
                    <a class="social-items" style="list-style: none; transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="#">&nbsp;<i class="fa fa-twitter"></i></a>
                    </span>
                    <span>
                  <a class="social-items" style="list-style: none; transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="#">&nbsp;<i class="fa fa-google-plus"></i></a>
                    </span>
                    <span>
                <a class="social-items" style="list-style: none; transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="#">&nbsp;<i class="fa fa-youtube"></i></a>
                    </span>
                    <span>
              <a class="social-items" style="list-style: none; transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="#">&nbsp;<i class="fa fa-linkedin-square"></i></a>
</center> </span>


                
                
                    </p>

                    </u1>
            </div>
           <center>
                    <a class="social-items" style=" list-style: none;  transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="../mainpage.php">home &nbsp;<i class="fa fa-home"></i></a>&nbsp;
                  
                    <a class="social-items" style="list-style: none; transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="#">about &nbsp; <i class="fa fa-info"></i></a>&nbsp;
                  
                  <a class="social-items" style="list-style: none; transition: color .4s ease; text-decoration: none; font-size: 15px;color: white;" href="  http://www.periit.com ">Peri IT &nbsp; <i class="fa fa-graduation-cap"></i></a> <br><br> <br>
</center>     






            <div class="footer-bottom">
                <p>copyright &copy;2021 art4lyf. designed by <span>srini</span></p>
            </div>


        </footer> 

</body>

</html>