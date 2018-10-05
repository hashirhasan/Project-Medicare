<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

//Lrequire ('PHPMailer\PHPMailerAutoload.php');oad Composer's autoloader
require ('PHPMailer\PHPMailerAutoload.php');

$name_error = $email_error = $phone_error = "";
$name = $email = $phone = $message = $success = "";

$user=$_SESSION['username'];
$mysqli = NEW MySQLI("localhost","root","","medicare1");

$resultSet = $mysqli->query("SELECT user_email AS usermail
                             FROM users
                          WHERE username ='$user' ");
while ($rows = $resultSet->fetch_assoc()) 
{
   $email = $rows['usermail'];
}

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

	
	if (empty($_POST["phone"])) {
		$phone_error = "Phone is required";
	}
	else{
      $phone = test_input($_POST["phone"]);
      if (!preg_match("/^(\d[\s-]?)?[\[\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
      			$phone_error = "Invalid phone number";
      		}		
	}
	if (empty($_POST["message"])) {
		$message = "";
	}
	else{
		$message = test_input($_POST["message"]);
	}
	if ($name_error == '' and $email_error == '' and $phone_error == '') {
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
    $mail->Body    = 'Name=> '.$name.'<br/>'.'Email=> '.$email.'<br/>'.'Phone=> '.$phone.'<br/>'.'Query=> '.$message;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if($mail->send()){
  
    $success = "Message sent, thank you for contacting us!";
    
    $name = $email = $phone = $message = $password = $cpassword = "";
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