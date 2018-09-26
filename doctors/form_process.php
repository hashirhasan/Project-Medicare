<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'src\SMTP.php';
require'src\PHPMailer.php';
require'src\Exception.php';

$name_error = $email_error = $phone_error = $password_error = $cpassword_error = "";
$name = $email = $phone = $message = $password = $cpassword = $success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$name_error = "Name is required";
	}
	else{
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $name)) {
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

/*	if (empty($_POST["password"])) {
		$password_error = "Password is required";
	}
	else{
		$password = test_input($_POST["password"]);
		if (!filter_var($password) {
			$password_error = "Invalid password format";
		}
	}*/
	if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        /*if (strlen($_POST["password"]) < '8') {
            $password_error = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $password_error = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $password_error = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $password_error = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } elseif($cpassword != $password) {
            $cpassword_error = "Please Check You've Entered Or Confirmed Your Password!";
        }*/
        if ($cpassword != $password) {
        	$cpassword_error = "Please Check You've Entered Or Confirmed Your Password!";
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
//    $mail->SMTPDebug =0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $email;                 // SMTP username
    $mail->Password = $password;                           // SMTP password
   // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email);
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
	//}
}
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
