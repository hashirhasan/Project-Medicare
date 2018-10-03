
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
        ?>

<?php include"send_mail.php"?>

<?php
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
