<?php include "include/adminheader.php" ?>
  
<?php
       if(isset($_SESSION['username']))
        {
            $username=$_SESSION['username'];
            $query="SELECT * FROM users WHERE username ='{$username}'";
             $result=mysqli_query($connection,$query);
           if(!$result){
               die("query failed". mysqli_error($connection));
           }
            while($row=mysqli_fetch_assoc($result))
            {   
             $user_id=$row['user_id'];
            $username=$row['username'];
            $user_role=$row['user_role'];
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_password=$row['user_password'];
            }
        }

if(isset($_POST['update_profile'])){
   
    $username=$_POST['username'];
    $user_role=$_POST['user_role'];
   $user_firstname=$_POST['user_firstname'];
   $user_lastname=$_POST['user_lastname'];
   $user_email=$_POST['user_email'];
   $user_password=$_POST['user_password'];
    $query="UPDATE users SET ";
    $query .="username='$username', ";
    $query .="user_role='$user_role', ";
    $query .="user_firstname='$user_firstname', ";
    $query .="user_lastname='$user_lastname', ";
    $query .="user_email='$user_email',";
    $query .="user_password='$user_password' ";
    $query .="WHERE username='$username'";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed" .mysqli_error($connection));
    }
 
}
 ?>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
             
                   <form action="" method="post" enctype="multipart/form-data">
    <div>
    <h2><label for="username" >Username</label></h1><br>
    <input class="form"value="<?php echo $username;?>" type="text" name="username">
    </div><br><br>
    <div>
        <select name="user_role">
      
            <option><?php echo $user_role;?></option>
        <?php    
            if($user_role="admin")
            {
                echo"<option>subscriber</option>";
            }  
            else if($user_role="subscriber")
            {
                echo"<option>admin</option>";
            }  
            ?>
            
        </select></div><br><br>
   
    <h2><label for="firstname" >Firstname</label></h1><br>
     <input class="form" value="<?php echo $user_firsttname;?>" type="text" name="user_firstname">  

    <div>
    <h2><label for="lastname" >Lastname</label></h1><br>
       <input class="form" value="<?php echo $user_lastname;?>" type="text" name="user_lastname">  
    </div><br><br>
       <div>
    <h2><label for="email" >Email</label></h1><br>
       <input class="form" value="<?php echo $user_email;?>" type="text" name="user_email">  
    </div><br><br>
    <div>
         <h2><label for="password" >Password</label></h1><br>
       <input class="form" value="<?php echo $user_password;?>" type="password" name="user_password">  
    </div><br><br>
    <div>
    <input class="form"  style="background-color:blue; color:white;"type="submit" name="update_profile" value="Update Profile">
    </div>

</form>
                    

                
                
                 </div>
                <div class="col-3"></div>
             </div>
    </div>
    </div>
</body>
</html>