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
                $user_image=$row['user_image'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_password=$row['user_password'];
                $previous_password=$row['user_password'];
            }
        }
else if(!isset($_SESSION['user_role']))
{
    header("Location:../home.php");
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
	<link rel="stylesheet" href="user-profile.css">
</head>
<body>
	<div class="myprofile"><h1>MY PROFILE</h1></div>
	<div class="line"></div>
    
    <div class="profile">
		<div  class="container">
			<img src="image/<?php echo $user_image?>">
        
			</div>
		</div>
			<div style="margin-top:5%" class="container-detail">
               <h3>Username <input type="text" placeholder="Username" value="<?php echo $username;?>" name="username" readonly></h3><br>
	      		<h3>First Name<input type="text" placeholder="First Name"value="<?php echo $user_firstname;?>"  name="user_firstname" readonly></h3>
	      		<h3>Last Name<input type="text" placeholder="Last Name" value="<?php echo $user_lastname;?>" name="user_lastname" readonly></h3>
	      		<h3 style="margin-left:7%;">Email<input style="width: 264px" type="text" placeholder="Email" value="<?php echo $user_email;?>" name="user_email" readonly></h3>
	      		<!-- <input class="for-button" type="button" value="Change Password?"> -->	
               
                
	</div>
  
    <a  href="edit_user_profile.php" ><button style="position:absolute; margin-left:9.5vw; margin-top:-20vh; padding:20px; width:180px; color:white; text-decoration:none;" class="sav-button"  name="update_profile"  >Edit Profile</button></a>


</body>
</html>
                
                
                