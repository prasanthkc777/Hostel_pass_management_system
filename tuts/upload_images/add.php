<?php

include "configs.php";


if(isset($_GET['tname'])){
    $tname = $_GET['tname'];
}

if(isset($_GET['application_number'])){
    $apn= $_GET['application_number'];
}


if(isset($_POST['submit'])){
	$u_card = $_POST['card_no'];
	$u_f_name = $_POST['user_first_name'];
	$u_l_name = $_POST['user_last_name'];
	$u_father = $_POST['user_father'];
	$u_aadhar = $_POST['user_aadhar'];
	$u_birthday = $_POST['user_dob'];
	$u_gender = $_POST['user_gender'];
	$u_email = $_POST['user_email'];
	$u_phone = $_POST['user_phone'];
	$u_state = $_POST['state'];
	$u_dist = $_POST['dist'];
	$u_village = $_POST['village'];
	
	$u_pincode = $_POST['pincode'];
	$u_mother = $_POST['user_mother'];
	
	$u_staff_id = $_POST['staff_id'];
	$department= $_POST['department'];
	$year= $_POST['year'];
	$section = $_POST['section'];
	


	//image upload

	$msg = "";
	$image = $_FILES['image']['name'];
	$target = "image/".basename($image);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

  	$insert_data = "INSERT INTO $tname(u_card, u_f_name, u_l_name, u_father, u_aadhar, u_birthday, u_gender, u_email, u_phone, u_state, u_dist, u_village, u_pincode, u_mother, department,year,section, staff_id,image,uploaded) VALUES ('$u_card','$u_f_name','$u_l_name','$u_father','$u_aadhar','$u_birthday','$u_gender','$u_email','$u_phone','$u_state','$u_dist','$u_village','$u_pincode','$u_mother','$department','$year','$section','$u_staff_id','$image',NOW())";
  	$run_data = mysqli_query($link,$insert_data);
	  echo "$insert_data";

  	if($run_data){
  		header("location:index.php?application_number= $apn & tname= $tname");
  	}else{
  		echo "Data not insert";
  	}

}

?>