<?php
if(isset($_POST['create_user']))
{ 
   $username=$_POST['username'];
    $user_role=$_POST['user_role'];
    $image=$_FILES['image']['name'];
   $image_temp=$_FILES['image']['tmp_name'];
   $user_firstname=$_POST['user_firstname'];
   $user_lastname=$_POST['user_lastname'];
     $user_email=$_POST['user_email'];
     $user_password=$_POST['user_password'];
      $user_password=md5($user_password);
     move_uploaded_file($image_temp,"../image/$image"); 
  $query="INSERT INTO users(username,user_role,user_image,user_firstname,user_lastname,user_email,user_password) "; 
  $query .="VALUES('$username','$user_role','$image','$user_firstname','$user_lastname','$user_email','$user_password')";
    $result=mysqli_query($connection,$query);
    if(!$result){
        die("query failed". mysqli_error($connection));
    }
}



?>
<div class="row">
<div class="col-4"></div>
    <div class="col-7">
<form action="" method="post" enctype="multipart/form-data">
     <div>
    <h2><label for="username" >Username</label></h1><br>
       <input class="form" type="text" name="username" required>  
    </div><br><br>
    <div>
         <select name="user_role">
        <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        
        </select>
    </div><br><br>
     <div>
    <h2><label for="image" >User Image</label></h1><br>
    <input class="form" type="file" name="image">
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
    <input class="form"  style="background-color:blue; color:white;"type="submit" name="create_user" value="Add User">
    </div>

</form>
    </div>
    <div class="col-1"></div>
</div>