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
    if(mysqli_num_rows($result)==0)
    {
        $notlogin="<p id='checks' style='color:red;'>no such entry in database</p>";
    }
    else
    {
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
else
   {
    $notlogin="<p style='color:red;' id='checks'>Invalid Match/Password or Username Incorrect</p>";
   
  }
 
}
}
    
    ?>


        <!DOCTYPE html>
        <html>
        <head>
            <a href="home.php"><img class="logo" src="image/medi4.svg"></a>
        <title>login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="login-signup.css">
             <style>
            .logo{
            position: absolute;
            padding: 3px 0px 0px 8px; 
            height: 70px;
            width: 150px;
            top: 3px;
        }
            </style>
        </head>
        <body>
            
        <div class="container">
          
        <div class="signup">
              
        <h4><a style="display: inline-block; color: red; border-radius: 5px;" href="login.php" class="line">Login</a></h4>
        <h4><a href="signup.php" class="line">Sign Up</a></h4>
            <?php if(isset($notlogin)){echo $notlogin;}  ?>
        <form action="" method="post" enctype="multipart/form-data">
        <input class="form" type="text" id="text" name="username"  placeholder="Username"  onkeyup="enabled()">  
        <input class="form"   type="password" id="password" name="user_password" placeholder="Password" > 
           
        <button class="button" type="submit" id="start_button" name="login_user" disabled><span>LOG IN</span></button><span> <a href = "forgot_mail.php">forgot password ?</a></span>
        <h4 style="color:#513C35; font-faimly:arial;" >Don't Have Account!!<br>Please Signup First</h4>
        </form>

        </div>
        </div>
        </body>
        </html>
    <script type="text/javascript">
  function enabled(){
    if(document.getElementById("text").value==="") { 
            //console.log(document.getElementById("mytext").value);
            document.getElementById('start_button').disabled = true; 
          } else { 
            document.getElementById('start_button').disabled = false;
          }
        }
        
        
        function checks(){
            if(document.getElementById('text').value!=""){
                   document.getElementById("checks").innerHTML="";
            document.getElementById("checks").style.visibility = "hidden";
            }
        }
      </script>






























