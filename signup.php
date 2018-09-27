
<?php include "connect.php" ?>
<?php
  $error_username=NULL; 
  $error_pass=NULL;
  $error_user_email=NULL;
  $error_email_wrong=NULL;
  $message=NULL;
  $message_error=NULL;
   $error_lastname=NULL;
  $error_firstname=NULL;
//$error_username_valid=null;
if(isset($_POST['create_user']))
{
//   echo "Successfully Registered";
    $username=$_POST['username'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $username_query="SELECT * FROM users WHERE username='$username'";
     $user_email_query="SELECT * FROM users WHERE user_email='$user_email'";

    $username_result=mysqli_query($connection,$username_query);
    $user_email_result=mysqli_query($connection,$user_email_query);
     if(mysqli_num_rows($username_result)>0)
    {
        $error_username="<h4 style='color:red;font-size:17px;'>username already exists</h4>";
    }
     if(!preg_match("/^[A-z0-9@#$%^&*()+?_!-]{3,}$/",$username))
    {
       $error_username_valid="<h4 style='color:red;font-size:17px;'>Invalid Username</h4>";
    }

    if(!preg_match("/^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/",$user_email))
    {
       $error_email_wrong="<h4 style='color:red;font-size:17px;'>Invalid Email</h4>";
    }
        
        if(mysqli_num_rows($user_email_result)>0)
        {
           $error_user_email="<h4 style='color:red;font-size:17px;'>user email already exists</h4>";  
        }
       
    
        if(!preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/",$user_password))
        {
           $error_pass="<h4 style='color:red;font-size:17px;'>Your password is too common</h4>";
        }
        
      
      if(!preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$user_firstname))
      {
          $error_firstname="<h4 style='color:red;font-size:17px;'>Invalid firstname</h4>";
      }
    
       
      if(!preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$user_lastname))
      {
          $error_lastname="<h4 style='color:red;font-size:17px;'>Invalid lastname</h4>";
      }  
    
    
    $username=mysqli_real_escape_string($connection,$username);
    $user_password=mysqli_real_escape_string($connection,$user_password);
    $user_firstname=mysqli_real_escape_string($connection,$user_firstname);
    $user_lastname=mysqli_real_escape_string($connection,$user_lastname);
    
    
      if(preg_match("/^[A-z0-9@#$%^&*()+?_!-]{3,}$/",$username) and preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/",$user_password) and preg_match("/^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/",$user_email) and preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$user_firstname) and preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$user_lastname) and mysqli_num_rows($username_result)==0 and mysqli_num_rows($user_email_result)==0)
    {  

          $token='asdfghjklqwertyphgkvbmnQWERTFGHJKLMBVCXD123456789';
    $token= str_shuffle($token);
    $token= substr($token,0,10);
  
    
  require ('PHPMailer\PHPMailerAutoload.php');
//require ("PHPMailer/class.phpmailer.php");

$mail = new PHPMailer;
$mail->isSMTP();  // Set mailer to use SMTP

$mail->SMTPDebug = 0;                               // Enable verbose debug output

                                 
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hasanhashir1314@gmail.com';                 // SMTP username
$mail->Password = '0551harry0551';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->SetFrom('hasanhashir1314@gmail.com');
$mail->AddAddress($user_email, $username);  

            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'VERIFICATION E-MAIL';
$mail->Body    = $user_firstname." "."ur password is ".$user_password." "."<br> 
        
        click on the verification link below:<br>
        
        <a href='localhost/Project-Medicare/verify.php?user_email=$user_email&token=$token'>Verification Link</a>
 
        ";
    
if(!$mail->send()) {
    $message_error= "<h2 style='color:red;text-shadow: 1px 1px white;'>Message could not be sent.</h2>";
} else {
    $message= "<h2 style='color:red;'>Message has been sent</h2>";
}
        
        
          $user_password=md5($user_password);
    $query="INSERT INTO users(username,user_role,user_firstname,user_lastname,user_email,user_password,token) "; 
    $query .="VALUES('$username','subscriber','$user_firstname','$user_lastname','$user_email','$user_password','$token')";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed". mysqli_error($connection));
    }

 
}
      
}
 
?>



<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login_signup.css">
</head>
<body>
	<div class="container">
	      <div class="signup">
               <?php if(isset( $message)){echo  $message;}  ?>
               <?php if(isset( $message_error)){echo  $message_error;}  ?>
	      	<h4><a href="signup.php" class="line">Sign Up</a></h4>
	      	<h4><a href="login.php" class="line">Login</a></h4>
    
<form action="signup.php" method="post" enctype="multipart/form-data">
    
       <input class="form" type="text" name="username"  placeholder="Username" title="Avoid spaces" required>  
 <?php if(isset( $error_username)){echo  $error_username;} ?>
     <?php if(isset( $error_username_valid)){echo  $error_username_valid;} ?>
    <input class="form" type="text" name="user_firstname"  placeholder="First Name" required>
  <?php if(isset($error_firstname)){echo $error_firstname;} ?>
       <input class="form" type="text" name="user_lastname" placeholder="Last Name" required>  
     <?php if(isset($error_lastname)){echo $error_lastname;} ?>
       <input class="form" type="text" name="user_email" placeholder="Email" required>  
    <?php if(isset($error_user_email)){echo $error_user_email;}  ?>
    <?php if(isset($error_email_wrong)){echo $error_email_wrong;}  ?>
       <input class="form" type="password" name="user_password" placeholder="Password" required  title="special characters and numbers are required">
     <?php if(isset($error_pass)){echo $error_pass;}  ?>
    <button class="button" type="submit" name="create_user"><span>SIGN UP</span></button>
	      		<h5>OR</h5>
    <button class="button" style="background-color: #B71515"><span>Connect with Google</span></button>
    </form>
        </div>
    </div>
</body>
</html>