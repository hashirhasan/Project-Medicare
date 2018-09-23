
<?php include "connect.php" ?>
<?php
    
if(isset($_POST['create_user'])){
//   echo "Successfully Registered";
    $username=$_POST['username'];
   
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $username=mysqli_real_escape_string($connection,$username);
    $user_password=mysqli_real_escape_string($connection,$user_password);
    $user_firstname=mysqli_real_escape_string($connection,$user_firstname);
    $user_lastname=mysqli_real_escape_string($connection,$user_lastname);
    
    
    
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

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
    
<form action="register.php" method="post" enctype="multipart/form-data">
     <div>
    <h2><label for="username" >Username</label></h1><br>
       <input class="form" type="text" name="username" required>  
    </div><br><br>
    
    <div>
    <h2><label for="firstname" >Firstname</label></h1><br>
    <input class="form" type="text" name="user_firstname">
    </div><br><br>
    <div>
    <h2><label for="lastname" >Lastname</label></h1><br>
       <input class="form" type="text" name="user_lastname">  
   </div><br><br>
       
   <div>
    <h2><label for="e-mail" >E-mail</label></h1><br>
       <input class="form" type="text" name="user_email" required>  
    </div><br><br>
    <div>
    <h2><label for="password" >Password</label></h1><br>
       <input class="form" type="password" name="user_password">  
    </div><br><br>
   
        <div>
    <input class="form"  style="background-color:blue;"type="submit" name="create_user" value="Register">
    </div>
    </form>
</body>
</html>