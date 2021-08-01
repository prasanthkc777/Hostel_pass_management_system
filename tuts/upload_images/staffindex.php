<?php
include "configs.php";

if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}

if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}


if(isset($_GET['tname'])){
    $tname = $_GET['tname'];


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
	   
		  
	

}
if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
<div style="background-color:#616161;  padding:20px;" ><h4 style="color:white;"><a style="text-decoration:none; color:white;"  href=" ../homepage1.php?application_number= <?php echo $apn; ?> & tname= <?php echo $tname ?>&ct=<?php echo $ct ?> &ci=<?php echo $ci ?> "  ><i class="fa fa-arrow-circle-left"></i> Back &nbsp; &nbsp; </a> Hostel Pass </h4> </div>

<style>
body{
background:  url("../wp11.jpg");
background-size: cover;
background-position: center;
min-height: 1000px;
background-image: blur(10px);

 
}
	</style>
	

</head>
<body>

	<div class="container">

	




<!-- Modal delete --><!-- Modal delete --><!-- Modal delete --><!-- Modal delete -->
<?php
if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}

$get_data = "SELECT * FROM $tname ";
$run_data = mysqli_query($link,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

   // <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??   $tname</h4>
      </div>
      <div class='modal-body'>
        <a href='staffdelete.php?application_number= $apn & id=$id & tname=$tname &ct = $ct &ci=$ci ' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
	
}


?>
<!-- Modal delete --><!-- Modal delete --><!-- Modal delete --><!-- Modal delete --><!-- Modal delete -->




<!-- View modal  -->
<?php 

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

		<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel'>Profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
			<div class='container' id='profile'> 
				<div class='row'>
					<div class='col-sm-4 col-md-2'>
						<img src='image/$image' alt='' style='width: 150px; height: 150px;' ><br>
		
						<i class='fa fa-id-card' aria-hidden='true'></i> $card<br>
						<i class='fa fa-phone' aria-hidden='true'></i> $phone  <br>
						Issue Date : $time
					</div>
					<div class='col-sm-3 col-md-6'>
						<h3 class='text-primary'>$name $name2</h3>
						<p class='text-secondary'>
						
						<strong>department :</strong>$department <br>
						
						<i class='fa fa-venus-mars' aria-hidden='true'></i> $gender
						<br />
						<i class='fa fa-envelope-o' aria-hidden='true'></i> $email
						<br />
						optional mobile no: $aadhar
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
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
			</div>
			</form>
			</div>
		</div>
		</div> 


    ";
}





?>
 <!-- profile modal end --><!-- profile modal end --><!-- profile modal end -->





  <hr>
		<table class="table table-bordered table-striped table-hover" id="myTable">
		<thead>
		<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Add profile
  </button>
 
			<tr>
			   <th class="text-center" scope="col">S.L</th>
				<th class="text-center" scope="col">Name</th>
				<th class="text-center" scope="col">Application/Id no.</th>
				<th class="text-center" scope="col">Phone</th>
				
				<th class="text-center" scope="col">View</th>
				<th class="text-center" scope="col">Edit</th>
				<th class="text-center" scope="col">Delete</th>
			</tr>
		</thead>
			<?php

        	$get_data = "SELECT * FROM $tname order by 1 desc";
        	$run_data = mysqli_query($link,$get_data);
			$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
				$sl = ++$i;
				$id = $row['id'];
				$u_card = $row['u_card'];
				$u_f_name = $row['u_f_name'];
				$u_l_name = $row['u_l_name'];
				$u_phone = $row['u_phone'];
				$u_family = $row['u_family'];
				$u_staff_id = $row['staff_id'];

        		$image = $row['image'];

        		echo "

				<tr>
				<td class='text-center'>$sl</td>
				<td class='text-left'>$u_f_name   $u_l_name</td>
				<td class='text-left'>$u_card</td>
				<td class='text-left'>$u_phone</td>
				
			
				<td class='text-center'>
					<span>
					<a  class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Prfile'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					<a  class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Edit'><i class='fa fa-pencil-square-o fa-lg'></i></a>

					     
					    
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					
						<a  class='btn btn-danger deleteuser' title='Delete'>
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

				<!---Add in modal---->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">

<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal">&times;</button>
	  
	  <h4 class="modal-title text-center">create new profile <i class='fa fa-user-circle-o' aria-hidden='true'></i></h4>
	  
	</div>  
	<div class="modal-body">
	  <form action="staffadd.php?application_number=  <?php echo  $apn;?> & tname= <?php echo  $_GET['tname'];?> &ci= <?php echo $ci ?> &ct=<?php echo $ct ?>   " method="POST" enctype="multipart/form-data">
		  
		  <!-- This is test for New Card Activate Form  -->
		  <!-- This is Address with email id  -->
<div class="form-row">
<div class="form-group col-md-6">
<label for="inputEmail4">Staff application/Id no.</label>
<input type="text" class="form-control" name="card_no" placeholder="Enter Staffapplication/Id no." maxlength="15" required>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Mobile No.</label>
<input type="phone" class="form-control" name="user_phone" placeholder="Enter 10-digit Mobile no." maxlength="10" required>
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label for="firstname">First Name</label>
<input type="text" class="form-control" name="user_first_name" placeholder="Enter First Name">
</div>
<div class="form-group col-md-6">
<label for="lastname">Last Name</label>
<input type="text" class="form-control" name="user_last_name" placeholder="Enter Last Name">
</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label for="department">department</label>
<input type="text" class="form-control" name="department" placeholder="Enter your department Name">
</div>



<div class="form-row" style="color: skyblue;">
<div class="form-group col-md-6">
<label for="email">Email Id</label>
<input type="email" class="form-control" name="user_email" placeholder="Enter Email id">
</div>
<div class="form-group col-md-6">
<label for="aadharno">optional mobile No.</label>
<input type="phone" class="form-control" name="user_aadhar" placeholder="Enter 10-digit Mobile no." maxlength="10" >
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputState">Gender</label>
<select id="inputState" name="user_gender" class="form-control">
<option selected>Choose...</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>
</div>
<div class="form-group col-md-6">
<label for="inputPassword4">Date of Birth</label>
<input type="date" class="form-control" name="user_dob" placeholder="Date of Birth">
</div>
</div>





<div class="form-group">
<label for="inputAddress">Village</label>
<input type="text" class="form-control" name="village" placeholder="1234 Main St">
</div>

<div class="form-row">
<div class="form-group col-md-6">
<label for="inputCity">District</label>
<input type="text" class="form-control" name="dist">
</div>
<div class="form-group col-md-4">
<label for="inputState">State</label>
<select name="state" class="form-control">
<option selected>Choose...</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
								  <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
								  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
								  <option value="Assam">Assam</option>
								  <option value="Bihar">Bihar</option>
								  <option value="Chandigarh">Chandigarh</option>
								  <option value="Chhattisgarh">Chhattisgarh</option>
								  <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
								  <option value="Daman and Diu">Daman and Diu</option>
								  <option value="Delhi">Delhi</option>
								  <option value="Lakshadweep">Lakshadweep</option>
								  <option value="Puducherry">Puducherry</option>
								  <option value="Goa">Goa</option>
								  <option value="Gujarat">Gujarat</option>
								  <option value="Haryana">Haryana</option>
								  <option value="Himachal Pradesh">Himachal Pradesh</option>
								  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
								  <option value="Jharkhand">Jharkhand</option>
								  <option value="Karnataka">Karnataka</option>
								  <option value="Kerala">Kerala</option>
								  <option value="Madhya Pradesh">Madhya Pradesh</option>
								  <option value="Maharashtra">Maharashtra</option>
								  <option value="Manipur">Manipur</option>
								  <option value="Meghalaya">Meghalaya</option>
								  <option value="Mizoram">Mizoram</option>
								  <option value="Nagaland">Nagaland</option>
								  <option value="Odisha">Odisha</option>
								  <option value="Punjab">Punjab</option>
								  <option value="Rajasthan">Rajasthan</option>
								  <option value="Sikkim">Sikkim</option>
								  <option value="Tamil Nadu">Tamil Nadu</option>
								  <option value="Telangana">Telangana</option>
								  <option value="Tripura">Tripura</option>
								  <option value="Uttar Pradesh">Uttar Pradesh</option>
								  <option value="Uttarakhand">Uttarakhand</option>
								  <option value="West Bengal">West Bengal</option>
</select>
</div>
<div class="form-group col-md-2">
<label for="inputZip">Zip</label>
<input type="text" class="form-control" maxlength="10" name="pincode">
</div>
</div>


<div class="form-group">
<label for="inputAddress">confirm application/ID no.</label>
<input type="text" class="form-control" name="staff_id" maxlength="15" placeholder="Enter application/Id no">
</div>
		  


		  <div class="form-group">
			  <label>Image</label>
			  <input type="file" name="image" class="form-control" >
		  </div>

		  
		   <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
		  
		  
	  </form>
	</div>
	<div class="modal-footer">
	  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>
  </div>

</div>
</div>

	
  </div>

			
		</table>
	
<!----edit Data---><!----edit Data---><!----edit Data---><!----edit Data---><!----edit Data--->

<?php

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
	$staffCard = $row['staff_id'];
	$time = $row['uploaded'];
	$department = $row['department'];
	$year = $row['year'];
	$section = $row['section'];
	$image = $row['image'];
	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
	  
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Data </h4> 
      </div>

      <div class='modal-body'>
        <form action='staffedit.php?application_number= $apn & id=$id & tname= $tname &ci=$ci &ct=$ct' method='post' enctype='multipart/form-data'>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputEmail4'>Staff application/Id no.</label>
		<input type='text' class='form-control' name='card_no' placeholder='Enter application /id no.' maxlength='15' value='$card' >
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Mobile No.</label>
		<input type='phone' class='form-control' name='user_phone' placeholder='Enter 10-digit Mobile no.' maxlength='10' value='$phone' >
		</div>
		</div>
		
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='firstname'>First Name</label>
		<input type='text' class='form-control' name='user_first_name' placeholder='Enter First Name' value='$name'>
		</div>
		<div class='form-group col-md-6'>
		<label for='lastname'>Last Name</label>
		<input type='text' class='form-control' name='user_last_name' placeholder='Enter Last Name' value='$name2'>
		</div>
		</div>
		
	
		<div class='form-row'>
<div class='form-group col-md-6'>
<label for='department'>department</label>
<input type='text' class='form-control' name='department' placeholder='Enter your department Name' value='$department' >
</div>

		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='email'>Email Id</label>
		<input type='email' class='form-control' name='user_email' placeholder='Enter Email id' value='$email'>
		</div>
		<div class='form-group col-md-6'>
		<label for='aadharno'>optional mobile number.</label>
		<input type='phone' class='form-control' name='user_aadhar' placeholder='Enter 10-digit Mobile no.' value='$aadhar' maxlength='10' >
		</div>
		</div>
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputState'>Gender</label>
		<select id='inputState' name='user_gender' class='form-control' value='$gender'>
		  <option selected>$gender</option>
		  <option>Male</option>
		  <option>Female</option>
		  <option>Other</option>
		</select>
		</div>
		<div class='form-group col-md-6'>
		<label for='inputPassword4'>Date of Birth</label>
		<input type='date' class='form-control' name='user_dob' placeholder='Date of Birth' value='$Bday'>
		</div>
		</div>
		
		
		
		
		
		<div class='form-group'>
		<label for='inputAddress'>Village</label>
		<input type='text' class='form-control' name='village' placeholder='1234 Main St' value='$village'>
		</div>
		
		<div class='form-row'>
		<div class='form-group col-md-6'>
		<label for='inputCity'>District</label>
		<input type='text' class='form-control' name='dist' value='$dist'>
		</div>
		<div class='form-group col-md-4'>
		<label for='inputState'>State</label>
		<select name='state' class='form-control'>
		  <option>$state</option>
		  <option value='Andhra Pradesh'>Andhra Pradesh</option>
											<option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
											<option value='Arunachal Pradesh'>Arunachal Pradesh</option>
											<option value='Assam'>Assam</option>
											<option value='Bihar'>Bihar</option>
											<option value='Chandigarh'>Chandigarh</option>
											<option value='Chhattisgarh'>Chhattisgarh</option>
											<option value='Dadar and Nagar Haveli'>Dadar and Nagar Haveli</option>
											<option value='Daman and Diu'>Daman and Diu</option>
											<option value='Delhi'>Delhi</option>
											<option value='Lakshadweep'>Lakshadweep</option>
											<option value='Puducherry'>Puducherry</option>
											<option value='Goa'>Goa</option>
											<option value='Gujarat'>Gujarat</option>
											<option value='Haryana'>Haryana</option>
											<option value='Himachal Pradesh'>Himachal Pradesh</option>
											<option value='Jammu and Kashmir'>Jammu and Kashmir</option>
											<option value='Jharkhand'>Jharkhand</option>
											<option value='Karnataka'>Karnataka</option>
											<option value='Kerala'>Kerala</option>
											<option value='Madhya Pradesh'>Madhya Pradesh</option>
											<option value='Maharashtra'>Maharashtra</option>
											<option value='Manipur'>Manipur</option>
											<option value='Meghalaya'>Meghalaya</option>
											<option value='Mizoram'>Mizoram</option>
											<option value='Nagaland'>Nagaland</option>
											<option value='Odisha'>Odisha</option>
											<option value='Punjab'>Punjab</option>
											<option value='Rajasthan'>Rajasthan</option>
											<option value='Sikkim'>Sikkim</option>
											<option value='Tamil Nadu'>Tamil Nadu</option>
											<option value='Telangana'>Telangana</option>
											<option value='Tripura'>Tripura</option>
											<option value='Uttar Pradesh'>Uttar Pradesh</option>
											<option value='Uttarakhand'>Uttarakhand</option>
											<option value='West Bengal'>West Bengal</option>
		</select>
		</div>
		<div class='form-group col-md-2'>
		<label for='inputZip'>Zip</label>
		<input type='text' class='form-control' name='pincode' value='$pincode'>
		</div>
		</div>
		
		
		<div class='form-group'>
		<label for='inputAddress'>confirm application/id no.</label>
		<input type='text' class='form-control' name='staff_id' maxlength='15' placeholder='Enter 12-digit Staff Id' value='$staffCard'>
		</div>
        	

        	<div class='form-group'>
        		<label>Image</label>
        		<input type='file' name='image' class='form-control'>
        		<img src = 'image/$image' style='width:50px; height:50px'>
        	</div>

        	
        	
			 <div class='modal-footer'>
			 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
			 <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
		 </div>


        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>



















<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>