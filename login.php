<?php include "connect.php" ?>
<?php session_start();?>
<?php  
if(isset($_SESSION['user_role']))
{
   header("Location:home.php");
    
}
    ?>


        <!DOCTYPE html>
        <html>
        <head>
        <title>login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="login_signup.css">
        </head>
        <body>
        <div class="container">
        <div class="signup">
        <h4><a href="login.php" class="line">Login</a></h4>
        <h4><a href="signup.php" class="line">Sign Up</a></h4>
        <form action="" method="post" enctype="multipart/form-data">
        <input class="form" type="text" name="username"  placeholder="Username" >  
        <input class="form"  type="password" name="user_password" placeholder="Password">  
        <button class="button" type="submit" name="login_user"><span>LOG IN</span></button>
        <h5>OR</h5>
        <button class="button" style="background-color: #B71515"><span>Connect with Google</span></button>
        </form>

        </div>
        </div>
        </body>
        </html>
   


<?php
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
      header("Location:admin");   
  }
else{
    header("Location:home.php");
   
}
 
}
    
    ?>




























