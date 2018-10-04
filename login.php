<?php include "connect.php" ?>
<?php session_start();?>
<?php  
if(isset($_SESSION['user_role']))
{
   header("Location:home.php");
    
}
    ?>



<?php
error_reporting(0);
if(isset($_POST['login_user']))
{
    
    $enter_username=$_POST['username'];
    $enter_password=$_POST['user_password'];
    $enter_username=mysqli_real_escape_string($connection,$enter_username);
    $enter_password=mysqli_real_escape_string($connection,$enter_password);
    
    $query="SELECT * FROM users WHERE username='$enter_username'";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result))
    {
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_role=$row['user_role'];
        $user_cmpass=$row['user_cmpass'];
    }
 
  $enter_password=md5($enter_password);

  if($enter_username===$username and $enter_password===$user_password and $user_cmpass>0)
  { 
      $_SESSION['username']= $enter_username;
      $_SESSION['user_password']= $enter_password;
      $_SESSION['user_role']= $user_role;
      $_SESSION['user_id']= $user_id;
      header("Location:admin");   
  }
else{
   $notlogin="<p style='color:red;'>Invalid Match/Password or Username Incorrect</p>";
   
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
              
        <h4><a style="display: inline-block; color: red; border-radius: 5px;" href="login.php" class="line">Login</a></h4>
        <h4><a href="signup.php" class="line">Sign Up</a></h4>
            <?php if(isset($notlogin)){echo $notlogin;}  ?>
        <form action="" method="post" enctype="multipart/form-data">
        <input class="form" type="text" name="username"  placeholder="Username" >  
        <input class="form"  type="password" name="user_password" placeholder="Password"> 
           
        <button class="button" type="submit" name="login_user"><span>LOG IN</span></button><span> <a href = "forgot_password.php?table=participants">forgot password ?</a></span>
        
        </form>

        </div>
        </div>
        </body>
        </html>
   






























