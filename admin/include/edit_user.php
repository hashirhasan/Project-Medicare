
<?php
  if(isset($_GET['user_id'])){
      $user_id=$_GET['user_id'];
    $query="SELECT * FROM users WHERE user_id=$user_id";
    $result=mysqli_query($connection,$query);
   if(!$result){
       die("query failed". mysqli_error($connection));
   }
    while($row=mysqli_fetch_assoc($result))
    {    
    $username=$row['username'];
    $user_role=$row['user_role'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_email=$row['user_email'];
    }
}
?>
<div class="col-4"></div>
<div class="col-8">
<form action="" method="post" enctype="multipart/form-data">
    <div>
    <h2><label for="username" >Username</label></h1><br>
    <input class="form"value="<?php echo $username;?>" type="text" name="username">
    </div><br><br>
    <div>
        <select name="user_role">
      
            <option><?php echo $user_role;?></option>
        <?php    
            if($user_role=="admin")
            {
                echo"<option>subscriber</option>";
            }  
            else if($user_role=="subscriber")
            {
                echo"<option>admin</option>";
            }  
            ?>
            
        </select></div><br><br>
   
   <div>
    <h2><label for="firstname" >Firstname</label></h1><br>
     <input class="form" value="<?php echo $user_firstname;?>" type="text" name="user_firstname">  
   </div><br><br>
    <div>
    <h2><label for="lastname" >Lastname</label></h1><br>
       <input class="form" value="<?php echo $user_lastname;?>" type="text" name="user_lastname">  
    </div><br><br>
       <div>
    <h2><label for="email" >Email</label></h1><br>
       <input class="form" value="<?php echo $user_email;?>" type="text" name="user_email">  
    </div><br><br>
    <div>
    <input class="form"  style="background-color:blue; color:white;"type="submit" name="update_user" value="Update User">
    </div>
</form>
    </div>
<?php   
if(isset($_POST['update_user'])){
   
    $username=$_POST['username'];
    $user_role=$_POST['user_role'];
   $user_firstname=$_POST['user_firstname'];
   $user_lastname=$_POST['user_lastname'];
   $user_email=$_POST['user_email'];
    
    $query="UPDATE users SET ";
    $query .="username='$username', ";
    $query .="user_role='$user_role', ";
    $query .="user_firstname='$user_firstname', ";
    $query .="user_lastname='$user_lastname', ";
    $query .="user_email='$user_email' ";
    $query .="WHERE user_id=$user_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed" .mysqli_error($connection));
    }
 header("Location:users.php");
}
?>


