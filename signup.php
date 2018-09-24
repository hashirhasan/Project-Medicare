
<?php include "connect.php" ?>
<?php
    
if(isset($_POST['create_user'])){
//   echo "Successfully Registered";
    $username=$_POST['username'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $username_query="SELECT * FROM users WHERE username='$username'";
    $pass_strlen=strlen($user_password);
    $username=mysqli_real_escape_string($connection,$username);
    $user_password=mysqli_real_escape_string($connection,$user_password);
    $user_firstname=mysqli_real_escape_string($connection,$user_firstname);
    $user_lastname=mysqli_real_escape_string($connection,$user_lastname);
    $username_result=mysqli_query($connection,$username_query);
    if(mysqli_num_rows($username_result)>0)
    {
        echo"<h2>username already exists</h2>";
    }
    else
    {
    if(filter_var($user_email,FILTER_VALIDATE_EMAIL))
    {
        if($pass_strlen>5)
        {
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
// Add a recipient
            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'VERIFICATION E-MAIL';
$mail->Body    = $user_firstname." "."ur password is ".$user_password;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
    
    
    
    
    
    
//    $salt_query="SELECT randsalt FROM users";
//    $salt_result=mysqli_query($connection,$salt_query);
//     if(!$salt_result){
//    die("query failed". mysqli_error($connection));
//    }
//    $row=mysqli_fetch_assoc($salt_result);
//    $randsalt=$row['randsalt'];
//    $user_password=crypt($user_password,$randsalt);
    
    $user_password=md5($user_password);
    $query="INSERT INTO users(username,user_role,user_firstname,user_lastname,user_email,user_password) "; 
    $query .="VALUES('$username','subscriber','$user_firstname','$user_lastname','$user_email','$user_password')";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed". mysqli_error($connection));
    }
//    header("location:login.php");
}
        else{
            echo"password length is short make it more than 5 units";
        }
    }
    else{
        echo"wrong email";
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
	      	<h4><a href="signup.php" class="line">Sign Up</a></h4>
	      	<h4><a href="login.php" class="line">Login</a></h4>
    
<form action="signup.php" method="post" enctype="multipart/form-data">
    
       <input class="form" type="text" name="username"  placeholder="Username" required>  
 
    <input class="form" type="text" name="user_firstname"  placeholder="First Name" required>
 
       <input class="form" type="text" name="user_lastname" placeholder="Last Name" required>  

       <input class="form" type="text" name="user_email" placeholder="Email" required>  
   
       <input class="form" type="password" name="user_password" placeholder="Password" required>
    <button class="button" type="submit" name="create_user"><span>SIGN UP</span></button>
	      		<h5>OR</h5>
    <button class="button" style="background-color: #B71515"><span>Connect with Google</span></button>
    </form>
        </div>
    </div>
</body>
</html>