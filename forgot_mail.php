    <html>
    <head>
    <title> mail forgot</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    
 <body>
    <form action="forgot_mail.php" method="post">
       <label>Enter Ur E-mail</label>
       <input type="text" name="mail">
        <input type="submit" name="submit" value="submit">
   </form>                                                                     <!-- sending a specific token for password updation  -->
 </body>
    </html>

<?php include"connect.php"  ?>
<?php
$token='asdfghjmnbvkdgepsdfregcftgapscsxfDFGKHYGBKDD23344567546786klqwertyphgkvbmnQWERTFGHJKLMBVCXD123456789';
    $token= str_shuffle($token);
    $token= substr($token,0,10);

if(isset($_POST['submit']))
{
    $user_email=$_POST['mail'];
    $query="SELECT * FROM users WHERE user_email='$user_email'";
    $forgot_result=mysqli_query($connection,$query);
     if(!$forgot_result){
    die("query failed".mysqli_error($connection));
    }
    $row=mysqli_fetch_assoc($forgot_result);
     $username=$row['username'];
     $user_firstname=$row['user_firstname'];
    $query1="UPDATE users SET ";
    $query1.="token='$token' ";
    $query1.="WHERE user_email='$user_email'";
    $update_result=mysqli_query($connection,$query1);
    if(!$update_result){
    die("query failed".mysqli_error($connection));
    }
//   error_reporting(0); 
  require ('PHPMailer\PHPMailerAutoload.php');
//require ("PHPMailer/class.phpmailer.php");

$mail = new PHPMailer;
$mail->isSMTP();  // Set mailer to use SMTP

$mail->SMTPDebug = 0;                               //  debug output =0

                                 
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // SMTP authentication
$mail->Username = 'hasanhashir1314@gmail.com';                 // SMTP username
$mail->Password = '2531899@';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->SetFrom('hasanhashir1314@gmail.com');
$mail->AddAddress($user_email, $username);  

            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Password Updation E-MAIL';
$mail->Body    = "Hii..."." ".$user_firstname." "."your token is"." ".$token." "."<br> 
        
        click on this link to change ur password:<br>
        
     <a href='localhost/Project-Medicare/forgot_verify.php?email=$user_email'>Change Password</a>  
 
        ";
    
if(!$mail->send()) {
    $message_error= "<h2 style='color:red;text-shadow: 1px 1px white;'>Please check ur internet connection.</h2>";
} else {
   ?>
   <script>
    window.onload = function(){swal('Send','token Id for password updation has been sent on your email!','success');}
 </script>
<?php
  
    $message= "<h2 style='margin:200px 0px 0px 400px;color:red;'>Password Updation Link has been sent</h2>";
}
}
 
?>
