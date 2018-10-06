

<!doctype>
<html>
    <head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>forgot pass</title>
    </head>
    <body>
<form action="" method="post">
    <label>enter ur new password</label>
<input type="text" name="pass">
    <input type="submit" name="submit" value="submit">
                                                                    

</form>
  
    </body>
</html>



<?php include"connect.php"?>
<?php ob_start(); ?>
<?php session_start();?>

<?php  
if(isset($_GET['email']))                                       
{    
     $email=$_GET['email'];
    
   if(isset($_POST['submit']))
   {
        $new_pass=$_POST['pass'];
        $new_pass=md5($new_pass);
        $new_query="UPDATE users SET ";
        $new_query.="user_password='$new_pass' ";
        $new_query.="WHERE user_email='$email'";
       $new_result=mysqli_query($connection,$new_query);
       ?>
<script>swal('Updated','your password has been changed!','success');</script>
<?php
}
}
    ?>