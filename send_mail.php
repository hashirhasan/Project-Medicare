<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php


          $token='asdfghjmnbvkdgepapscsxfDFGKHYGBKDD23344567546786klqwertyphgkvbmnQWERTFGHJKLMBVCXD123456789';
    $token= str_shuffle($token);
    $token= substr($token,0,10);
  
   error_reporting(1); 
  require ('PHPMailer\PHPMailerAutoload.php');
require ("PHPMailer\class.phpmailer.php");

$mail = new PHPMailer;
$mail->isSMTP();  // Set mailer to use SMTP

$mail->SMTPDebug = 0;                               // Enable  debug output =0

                                 
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hasanhashir1314@gmail.com';                 // SMTP username
$mail->Password = '2531899@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->SetFrom('hasanhashir1314@gmail.com');
$mail->AddAddress($user_email, $username);  

            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'VERIFICATION E-MAIL';
$mail->Body    = "Hii..."." ".$user_firstname." "." "."<br> 
        
        click on the verification link below:<br>
        
        <a href='localhost/Project-Medicare/verify.php?user_email=$user_email&token=$token'>Verification Link</a>
 
        ";
    
if(!$mail->send()) {
    $message_error= "<h2 style='color:red;text-shadow: 1px 1px white;'>Please check ur internet connection.</h2>";
} else {
    ?>
<script>
    window.onload = function(){swal('Registerd','you are successfully registered...please verify your email to login!','success');}
 </script>
<?php
    $message= "<h2 style='color:red;'>Verifiction Link has been sent</h2>";
 
}
 
?>