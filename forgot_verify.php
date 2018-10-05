<!doctype>
<html>
    <head>
    <title>forgot pass</title>
    </head>
    <body>
<form action="" method="post">
    <label>PUT UR TOKEN NO</label>
<input type="text" name="token">
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
       $token_id=$_POST['token'];
    $query_check="SELECT * FROM users WHERE user_email='$email'";
    $query_check_result=mysqli_query($connection,$query_check);
    $row=mysqli_fetch_assoc($query_check_result);
     $token_check=$row['token'];
    
    if($token_id===$token_check){
        
    header("location:forgotpass.php?email=$email");

}
}
}
    ?>

