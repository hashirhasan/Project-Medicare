
<?php include "connect.php" ?>
<?php
    
if(isset($_POST['create_user'])){
//   echo "Successfully Registered";
    $username=$_POST['username'];
    $user_role=$_POST['user_role'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $username=mysqli_real_escape_string($connection,$username);
    $user_password=mysqli_real_escape_string($connection,$user_password);
    $user_firstname=mysqli_real_escape_string($connection,$user_firstname);
    $user_lastname=mysqli_real_escape_string($connection,$user_lastname);
    $user_role=mysqli_real_escape_string($connection,$user_role);
//    $salt_query="SELECT randsalt FROM users";
//    $salt_result=mysqli_query($connection,$salt_query);
//     if(!$salt_result){
//    die("query failed". mysqli_error($connection));
//    }
//    $row=mysqli_fetch_assoc($salt_result);
//    $randsalt=$row['randsalt'];
//    $user_password=crypt($user_password,$randsalt);
    $user_password=md5($user_password);
    $query="INSERT INTO users(username,user_role,user_firstname,user_lastname,user_email,user_password) "; 
    $query .="VALUES('$username','subscriber','$user_firstname','$user_lastname','$user_email','$user_password')";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed". mysqli_error($connection));
    }
    header("location:login.php");
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
    
<form action="register.php" method="post" enctype="multipart/form-data">
     <div>
    <h2><label for="username" >Username</label></h1><br>
       <input class="form" type="text" name="username" required>  
    </div><br><br>
    
    <div>
    <h2><label for="firstname" >Firstname</label></h1><br>
    <input class="form" type="text" name="user_firstname">
    </div><br><br>
    <div>
    <h2><label for="lastname" >Lastname</label></h1><br>
       <input class="form" type="text" name="user_lastname">  
   </div><br><br>
       
   <div>
    <h2><label for="e-mail" >E-mail</label></h1><br>
       <input class="form" type="text" name="user_email" required>  
    </div><br><br>
    <div>
    <h2><label for="password" >Password</label></h1><br>
       <input class="form" type="password" name="user_password">  
    </div><br><br>
   
        <div>
    <input class="form"  style="background-color:blue;"type="submit" name="create_user" value="Register">
    </div>
    </form>
</body>
</html>