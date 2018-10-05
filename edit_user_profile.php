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
            while($row=mysqli_fetch_assoc($result))               //for displaying the  details for editing
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

if(isset($_POST['update_profile'])){
   
    $username=$_POST['username'];
     $user_image=$_FILES['image']['name'];
   $image_temp=$_FILES['image']['tmp_name'];
   $user_firstname=$_POST['user_firstname'];
   $user_lastname=$_POST['user_lastname'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];
    if($user_password!==$previous_password)
    {
   $user_password=md5($user_password);
    }
     move_uploaded_file($image_temp,"./image/$user_image"); 
    if(empty($user_image))
    {
        $query="SELECT * FROM users WHERE username='$username'";
        $result=mysqli_query($connection,$query);
        if(!$result){

        die("query failed" .mysqli_error($connection));
                        
        }
        while($row=mysqli_fetch_assoc($result)){
            $user_image=$row['user_image'];
        }
        
    }
    $query="UPDATE users SET ";                        //  updating the profile of the user
    $query .="username='$username', ";
     $query .="user_image='$user_image', ";
    $query .="user_firstname='$user_firstname', ";
    $query .="user_lastname='$user_lastname', ";
    $query .="user_email='$user_email',";
    $query .="user_password='$user_password' ";
    $query .="WHERE username='$username'";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed".mysqli_error($connection));
    }
 
    header("location:user_profile.php");
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
    <form action="" method="post" enctype="multipart/form-data">
    <div class="profile">
		<div class="container">
			<img src="image/<?php echo $user_image?>">
        
			</div>
		</div>
			<div class="container-detail">
               <h3>Username <input type="text" placeholder="Username" value="<?php echo $username;?>" name="username" readonly></h3><br>
                <h2 style="margin-left:10vw; color:white; width:100px">Image</h2><input style="margin-left:16.5vw"type="file" name="image" placeholder="chose profile pic">
	      		<h3>First Name<input type="text" placeholder="First Name"value="<?php echo $user_firstname;?>"  name="user_firstname"></h3>
	      		<h3>Last Name<input type="text" placeholder="Last Name" value="<?php echo $user_lastname;?>" name="user_lastname"></h3>
	      		<h3 style="margin-left:1%;">Password<input style="width: 264px" type="password" placeholder="Password" name="user_password" value="<?php echo $user_password;?>"></h3>
	      		<h3 style="margin-right: 3%;">Blood Group<input style="width: 264px" type="text" placeholder="Blood Group"></h3>
	      		<h3 style="margin-left:7%;">Email<input style="width: 264px" type="text" placeholder="Email" value="<?php echo $user_email;?>" name="user_email"></h3>
	      		<!-- <input class="for-button" type="button" value="Change Password?"> -->	
	      		<input class="sav-button" type="submit" name="update_profile" value="Save">
                
	</div>
    </form>



</body>
</html>
                
        