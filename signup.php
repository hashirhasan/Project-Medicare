
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
    else{
         $error_username="";
    }
     if(!preg_match("/^[A-z0-9@#$%^&*()+?_!-]{3,}$/",$username))
    {
       $error_username_valid="<h4 style='color:red;font-size:17px;'>Invalid Username</h4>";
    }
    else{
         $error_username_valid="";
    }
    if(!preg_match("/^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/",$user_email))
    {
       $error_email_wrong="<h4 style='color:red;font-size:17px;'>Invalid Email</h4>";
    }
    else{
         $error_email_wrong="";
    }
        
    if(mysqli_num_rows($user_email_result)>0)
    {
       $error_user_email="<h4 style='color:red;font-size:17px;'>user email already exists</h4>";  
    }
       
    else{
         $error_user_email="";
    }
    if(!preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/",$user_password))
    {
       $error_pass="<h4 style='color:red;font-size:17px;'>Your password is too common</h4>";
    }
    else{
         $error_pass="";
    }
        
      
    if(!preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$user_firstname))
      {
          $error_firstname="<h4 style='color:red;font-size:17px;'>Invalid firstname</h4>";
      }
    else{
         $error_firstname="";
    }
    
       
      if(!preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$user_lastname))
      {
          $error_lastname="<h4 style='color:red;font-size:17px;'>Invalid lastname</h4>";
      }
    else
    {
         $error_lastname="";
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



<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login-signup.css">
</head>
<body>
	<div class="container">
	      <div class="signup">
               <h3 id="details"></h3>
               <?php if(isset( $message)){echo  $message;}  ?>
               <?php if(isset( $message_error)){echo  $message_error;}  ?>
	      	<h4><a style="display: inline-block; color: red; border-radius: 5px;" href="signup.php" class="line">Sign Up</a></h4>
	      	<h4><a href="login.php" class="line">Login</a></h4>
    
<form action="signup.php" method="post" onsubmit="return check()" enctype="multipart/form-data">
     <p id="cusername"></p>
       <input class="form" type="text" name="username" id="username" placeholder="Username" title="Avoid spaces">  
 <?php if(isset( $error_username)){echo  $error_username;} ?>
   <?php if(isset( $error_username_valid)){echo  $error_username_valid;} ?>
    <p id="cfirst"></p>
    <input class="form" type="text" name="user_firstname" id="user_firstname"  placeholder="First Name">
  <?php if(isset($error_firstname)){echo $error_firstname;} ?>
    <p id="clast"></p>
       <input class="form" type="text" name="user_lastname" id="user_lastname" placeholder="Last Name">  
     <?php if(isset($error_lastname)){echo $error_lastname;} ?>
    <p id="cemail"></p>
       <input class="form" type="text" name="user_email" id="user_email" placeholder="Email">  
    <?php if(isset($error_user_email)){echo $error_user_email;}  ?>
    <?php if(isset($error_email_wrong)){echo $error_email_wrong;}  ?>
    <p id="cpass"></p>
       <input class="form" type="password" name="user_password"  id="user_password" placeholder="Password"  title="special characters and numbers are required">
     <?php if(isset($error_pass)){echo $error_pass;}  ?>
    <button class="button" type="submit"  name="create_user"><span>SIGN UP</span></button>
    </form>
        </div>
    </div>
 <script>
    function check(){
    var username=document.getElementById("username");
    var user_firstname=document.getElementById("user_firstname");
     var user_lastname=document.getElementById("user_lastname");
     var user_email=document.getElementById("user_email");
     var user_password=document.getElementById("user_password");
    if(username.value.length<=0||user_firstname.value.length<=0||user_lastname.value.length<=0||user_email.value.length<=0||user_password<=0)
    {
     document.getElementById("details").innerHTML="Fill all the details";
        return false;
    }
        else
        {
            document.getElementById("details").innerHTML="";
            document.getElementById("details").style.visibility = "hidden";
        }
        var regex1 = /^[A-z0-9@#$%^&*()+?_!-]{3,}$/;
    if(username.value.length>0 && (!regex1.test(username.value)))
        {
            document.getElementById("cusername").innerHTML="invalid username";
           
        }
         else
        {
            document.getElementById("cusername").innerHTML="";
            document.getElementById("cusername").style.visibility = "hidden";
        }
       var regex2 = /^[A-z]+[\s]{0,1}[A-z]{2,15}$/;
    if(user_firstname.value.length>0 && (!regex2.test(user_firstname.value)))
        {
            document.getElementById("cfirst").innerHTML="invalid firstname";
           
        }
         else
        {
            document.getElementById("cfirst").innerHTML="";
            document.getElementById("cfirst").style.visibility = "hidden";
        }
      var regex3 = /^[A-z]+[\s]{0,1}[A-z]{2,15}$/;
    if(user_lastname.value.length>0 && (!regex3.test(user_lastname.value)))
        {
            document.getElementById("clast").innerHTML="invalid lastname";
           
        }
         else
        {
            document.getElementById("clast").innerHTML="";
            document.getElementById("clast").style.visibility = "hidden";
        }
      var regex4 = /^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/;
    if(user_email.value.length>0 && (!regex4.test(user_email.value)))
        {
            document.getElementById("cemail").innerHTML="invalid email";
            
        } 
         else
        {
            document.getElementById("cemail").innerHTML="";
            document.getElementById("cemail").style.visibility = "hidden";
        }
         var regex5 = /^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/;
    if(user_password.value.length>0 && (!regex5.test(user_password.value)))
        {
            document.getElementById("cpass").innerHTML="invalid password";
            
        }
         else
        {
            document.getElementById("cpass").innerHTML="";
            document.getElementById("cpass").style.visibility = "hidden";
        }
        if((!regex1.test(username.value))||(!regex2.test(user_firstname.value))||(!regex3.test(user_lastname.value))||(!regex4.test(user_email.value))||(!regex5.test(user_password.value)))
            {
                return false;
            }
    
    }
    
    </script>   
    
    
    
    
    
    
    
</body>
</html>