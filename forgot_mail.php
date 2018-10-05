
<?php
if(isset($_POST['submit']))
$user_email=$_POST['mail'];
$user_name=

          $token='asdfghjmnbvkdgepapscsxfDFGKHYGBKDD23344567546786klqwertyphgkvbmnQWERTFGHJKLMBVCXD123456789';
    $token= str_shuffle($token);
    $token= substr($token,0,10);
  
   error_reporting(0); 
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

$mail->Subject = 'VERIFICATION E-MAIL';
$mail->Body    = "Hii..."." ".$user_firstname." "." "."<br> 
        
        click on this link to change ur password:<br>
        
     <  
 
        ";
    
if(!$mail->send()) {
    $message_error= "<h2 style='color:red;text-shadow: 1px 1px white;'>Please check ur internet connection.</h2>";
} else {
   
    $message= "<h2 style='color:red;'>Verifiction Link has been sent</h2>";
 
}
 
?>

<form>
<input type="email" name="mail">
    <input type="submit" name="submit" value="submit">


</form>