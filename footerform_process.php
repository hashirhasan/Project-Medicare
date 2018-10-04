<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require ('PHPMailer\PHPMailerAutoload.php');
$name_error = $email_error = "";
$name = $email = $message = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["name"])) {
		$name_error = "Name is required";
	}
	else{
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
			$name_error = "Only letters and white space allowed";
		}
	}
	if (empty($_POST["email"])) {
		$email_error = "Email is required";
	}
	else{
		$email = test_input($_POST["email"]);
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$email_error = "Invalid email format";
		}
	}	
    
    if (empty($_POST["message"])) {
		$message = "";
	}
	else{
		$message = test_input($_POST["message"]);
	}
	if ($name_error == '' and $email_error == '') {
		$message_body = '';
		unset($_POST['submit']);
		foreach ($_POST as $key => $value) {
			$message_body .= "$key:$value\n";
		}
	//	session_start();
      //  if(isset($_SESSION['username']) and $_SESSION['username'] != ''){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    //Server settings
//    $mail->SMTPDebug =0;      
                      // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'aashigupta165@gmail.com';    
    $mail->Password = 'India12@';
    //error_reporting(0);  
    
                            // SMTP password
   // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('aashigupta165@gmail.com');
    $mail->addAddress('aashigupta566@gmail.com');     // Add a recipient
 
   
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $name;
    $mail->Body    = 'Name=> '.$name.'<br/>'.'Email=> '.$email.'<br/>'.'Query=> '.$message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if($mail->send()){
  
    $success = "Thankyou For Contacting Us!";
    
    $name = $email = $message = "";
    }
  
   
else
{
    $success = "Invalid details Or Bad connection";
}
    }
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}