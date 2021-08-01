<?php
include "configs.php";

$id = $_GET['id'];
if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}
if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}
if(isset($_GET['ci'])){
    $ci = $_GET['ci'];
}
if(isset($_GET['ct'])){
    $ct= $_GET['ct'];
}

echo "$apn";
echo "hii";

if(isset($_POST['submit']))
{
	$u_card = $_POST['card_no'];
	$u_f_name = $_POST['user_first_name'];
	$u_l_name = $_POST['user_last_name'];
	
	$u_aadhar = $_POST['user_aadhar'];
	$u_birthday = $_POST['user_dob'];
	$u_gender = $_POST['user_gender'];
	$u_email = $_POST['user_email'];
	$u_phone = $_POST['user_phone'];
	$u_state = $_POST['state'];
	$u_dist = $_POST['dist'];
	$u_village = $_POST['village'];

	$u_pincode = $_POST['pincode'];
	

	$u_staff_id = $_POST['staff_id'];
	$department= $_POST['department'];


	
	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "image/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

	$update = "UPDATE $tname SET u_card='$u_card', u_f_name = '$u_f_name', department = '$department',  u_aadhar = '$u_aadhar', u_birthday = '$u_birthday', u_gender = '$u_gender', u_email = '$u_email', u_phone = '$u_phone', u_state = '$u_state', u_dist = '$u_dist', u_village = '$u_village',  u_pincode = '$u_pincode',  staff_id = '$u_staff_id', image = '$image' WHERE id=$id ";
	$run_update = mysqli_query($link,$update);

	if($run_update){
		header('location:staffindex.php?tname= '.$tname.'&application_number='.$apn.' &ci='.$ci.' &ct='.$ct.'');
	}else{
		echo "Data not update";
	}
}

?>