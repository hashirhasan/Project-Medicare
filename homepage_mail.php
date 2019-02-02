

<?php

  require ('PHPMailer\PHPMailerAutoload.php');
                                    

$mail = new PHPMailer;
$mail->isSMTP();  // Set mailer to use SMTP

$mail->SMTPDebug = 2;                               // Enable verbose debug output

                                 
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'hasanhashir1314@gmail.com';                 // SMTP username
$mail->Password = '2531899@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->SetFrom('hasanhashir1314@gmail.com');
$mail->AddAddress($user_email);  

            

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'SUBSCRIPTION E-MAIL';
$mail->Body    = "Hii..."." ".$user_email." "." "."<br>  
        
        Thanks for subscribing our website!!<br>
    You will get notifications on the daily basis.
 
        ";
    
if(!$mail->send()) {
    $message_error= "<h2 style='color:red;text-shadow: 1px 1px white;'>Please check ur internet connection.</h2>";
} else {
    ?>
<script>
    window.onload = function(){swal('Subscribed','you have been subscribed!!','success');}
 </script>
<?php
 
}
 
?>