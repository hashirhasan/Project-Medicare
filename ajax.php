
<?php include "connect.php" ?>

<?php
  $error_username=""; 
  
//  $error_user_email=NULL;
//  $user_email=$_POST['user_email'];
//$user_email_query="SELECT * FROM users WHERE user_email='$user_email'";
//  $user_name= isset($_GET['username'])? $_GET['username'] : "";
$user_name = $_GET['username'];
    
     
        if(isset($user_name))
        {
        $username_query="SELECT * FROM users WHERE username='$user_name'";


        $username_result=mysqli_query($connection,$username_query);
            
//        $user_email_result=mysqli_query($connection,$user_email_query);
         if(mysqli_num_rows($username_result)>0)
        {
            $error_username="username already exists";
        } 
        }

echo json_encode(
    array(
'error'=>true,
    'message'=>$error_username
)    
);

?>
