

<!-- View modal  -->

<?php 
include "configs.php";

if(isset($_GET['username'])){
    $username = $_GET['username'];
 
}


 
$sql_query = "SELECT *  from $username where output=1 ";
$retval = mysqli_query($link,$sql_query);

$row = mysqli_fetch_array($retval);
   
    $output = $row['output'];
   
    if($output==1) {
		$profile = "Profile";

$user =$username.$profile;
    $tname = $user ;

	 
$sql_queryz = "SELECT *  from $tname  ";
$retvalz = mysqli_query($link,$sql_queryz);

$rowz = mysqli_fetch_array($retvalz);
$apn = $rowz['u_card'];
   
 
  
$outinfo0 = mysqli_query($link," SELECT MAX( id ) AS max FROM outpass WHERE application_number = $apn  ");
$outinfo1 = mysqli_fetch_array( $outinfo0);
	$highestValue = $outinfo1['max'];


    $sql_select = "SELECT * FROM outpass WHERE application_number = $apn AND id = $highestValue ";
    $ret = mysqli_query($link,$sql_select);
    $ott = mysqli_fetch_array($ret);
    $out_date =  $ott['out_date'];
    $in_date = $ott['in_date'];
    $outing_info = $ott['outing_info'];



// <!-- profile modal start -->// <!-- profile modal start -->// <!-- profile modal start -->// <!-- profile modal start -->
$get_data = "SELECT * FROM $tname ";
$run_data = mysqli_query($link,$get_data);

while($row = mysqli_fetch_array($run_data))
{
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
	echo "
<center>
	<div class='container'>
		<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel'> outpass holder <i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
				
			</div>
			<div class='modal-body'>
			<div class='container' id='profile'> 
				<div class='row'>
					<div class='col-sm-4 col-md-2'>
						<img src='image/$image' alt='' style='width: 150px; height: 150px;' ><br>
                        <br />
                        <br />
		
						<i class='fa fa-id-card' aria-hidden='true'></i> <strong> application/id number: </strong>$card<br>
						<i class='fa fa-phone' aria-hidden='true'></i><strong> mobile number: </strong>  $phone  <br>
						Issue Date : $time
                        <br />
                        <strong> out date:</strong> <em> $out_date </em>
                        <br />
                        <strong>  in date:<strong> <em> $in_date </em>
                        <br />
                        <strong> outting info :<strong> <em> $outing_info </em>
                        <br />
                
                
                
					</div>
					<div class='col-sm-3 col-md-6'>
						<h3 class='text-primary'>$name $name2</h3>
						<p class='text-secondary'>
						<strong>S/O :</strong> $father <br>
						<strong>M/O :</strong>$mother <br>
						<strong>department :</strong>$department <br>
						<strong>year:</strong>$year <br>
						<strong>section :</strong>$section <br>
						
						<i class='fa fa-venus-mars' aria-hidden='true'></i> $gender
						<br />
						<i class='fa fa-envelope-o' aria-hidden='true'></i> $email
						<br />
						parents no: $aadhar
						<br />
						<i class='fa fa-home' aria-hidden='true'> Address : </i> $village, $police, <br> $dist, $state - $pincode
						<br />
						</p>
						<!-- Split button -->
					</div>
				</div>

			</div>   
			</div>
			<div class='modal-footer'>
			
			</div>
			</form>
			</div>
		</div>
		</div> 

        </div> 
      
</center>



    ";
}




	}else{
		echo '<div class="container" ><center><h3><strong><em> your outpass is not yet received or check your profile is completed or not</em> </strong></h3></center></div>';
	}

?>
 
