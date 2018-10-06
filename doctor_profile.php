<?php session_start()?>
<?php include"connect.php" ?>
<?php
       if(isset($_SESSION['username']))
        {
            $username=$_SESSION['username'];
            $query="SELECT * FROM users WHERE username ='{$username}'";
           
             $result=mysqli_query($connection,$query);
           if(!$result){
               die("query failed". mysqli_error($connection));
           }
            while($row=mysqli_fetch_assoc($result))                                   // used for displaying the details of the user
            {   
             $user_id=$row['user_id'];
            $username=$row['username'];
            $user_email=$row['user_email'];
            }
           $docquery="SELECT * FROM doctors,users,user_doctor WHERE  users.user_id = '$user_id' AND user_doctor.user_id = users.user_id AND user_doctor.doc_id = doctors.doc_id";
           $result=mysqli_query($connection,$docquery);
           if(!$result){
               die("query failed".mysqli_error($connection));
           }
           while($row=mysqli_fetch_assoc($result)){
               $doc_id=$row['doc_id'];
               $doctorname=$row['doc_name'];
               $timing=$row['doc_timing'];
               $address=$row['doc_address'];
               $fees=$row['doc_fees'];
               $exp=$row['doc_exp'];
               $qualifications=$row['doc_qualifications'];
               $services=$row['doc_services'];
               $image=$row['doc_img'];
           }
           
           $specialistquery="SELECT * FROM specialization,doctors,doctor_specialization WHERE doctor_specialization.doc_id = '$doc_id' AND doctor_specialization.doc_id = doctors.doc_id AND doctor_specialization.specialist_id = specialization.specialist_id";
           $result=mysqli_query($connection,$specialistquery);
           if(!$result){
               die("query failed".mysqli_error($connection));
           }
           while($row=mysqli_fetch_assoc($result)){
               $specialistname=$row['specialist_name'];
           }
        }
?>
<!DOCTYPE html>
<html>
<head>
	<a href="home.php"><img class="logo" src="image/medi4.svg"></a>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Profile</title>
	<link rel="stylesheet" href="doctor-profile.css">
</head>
<body>
	<div class="myprofile"><h1>MY PROFILE</h1></div>
	<div class="line"></div>
	<div class="profile">
		<div class="container">
			<img src="image/<?php echo $image; ?>">
			</div>
		</div>
			<div class="container-detail">
               <input type="text" placeholder="Doctor Name" value="<?php echo $doctorname; ?>" name="doctorname">
	      		<input type="text" placeholder="Username" value="<?php echo $username; ?>" name="username" readonly>
	      		<input type="text" placeholder="Email" value="<?php echo $user_email; ?>" name="user_email" readonly>
	      		<input style="width: 264px" type="text" value="<?php echo $timing; ?>" placeholder="Clinic Timings" name="timing">
	      		<input style="width: 264px" type="text" value="<?php echo $address; ?>" placeholder="Clinic Address" name="address">
	      		<input style="width: 264px" type="text" value="<?php echo $fees; ?>" placeholder="Appointment Fees" name="fees">
	      		<input type="text" placeholder="Specialization" value="<?php echo $specialistname; ?>" name="specialization">
	      		<input type="text" placeholder="Experience" value="<?php echo $exp; ?>" name="exp">
	      		<input type="text" placeholder="Qualification" value="<?php echo $qualifications; ?>" name="qualifications">
	      		<input style="width: 264px" type="text" placeholder="Services" value="<?php echo $services; ?>" name="services">
	      		<!-- <input style="width: 264px" type="text" placeholder="Blood Group">
	      		<input style="width: 264px" type="text" placeholder="Email"> -->
	      		<!-- <input class="for-button" type="button" value="Change Password?"> -->	
	      		
	</div>
		
<a href="edit_doctor_profile.php" ><button style="position:absolute; margin-left:9.5vw;margin-top:-10vh;padding:20px;width:180px;
    color:white; text-decoration:none;" class="sav-button" name="update_profile" >Edit Profile</button></a>


</body>
</html>