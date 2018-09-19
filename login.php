<?php include "connect.php" ?>
<?php session_start();?>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <br>
    <div>
    <h2><label for="username" >Username</label></h1><br>
       <input class="form" type="text" name="username"  placeholder="Enter Username" >  
    </div><br><br>
 <h2><label for="password" >Password</label></h1><br>
       <input class="form"  type="password" name="user_password" plaeholder="Enter Password">  
    </div><br><br>
    <div>

    <input class="form"  style="background-color:blue;" type="submit" name="login_user" value="Login">
    </div>

</form>

<?php
if(isset($_POST['login_user']))
{
    $enter_username=$_POST['username'];
    $enter_password=$_POST['user_password'];
    $query="SELECT * FROM users";
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
 
    
  if($enter_username===$username && $enter_password===$user_password)
  {
      $_SESSION['username']= $enter_username;
      $_SESSION['user_password']= $enter_password;
      $_SESSION['user_role']= $user_role;
   header("Location:admin");   
  }
    else
   {
       header("Location:home.php");   
    }
}
}
    
    
    
    ?>