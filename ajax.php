
<?php include "connect.php" ?>

<?php
  $error_username=NULL; 
  
//  $error_user_email=NULL;
//  $user_email=$_POST['user_email'];
//$user_email_query="SELECT * FROM users WHERE user_email='$user_email'";
  $user_name= isset($_POST[''])? $_POST[''] : "";
    
     
        if(!isset($user_name))
        {
        $username_query="SELECT * FROM users WHERE username='$user_name'";


        $username_result=mysqli_query($connection,$username_query);
//        $user_email_result=mysqli_query($connection,$user_email_query);
         if(mysqli_num_rows($username_result)>0)
        {
            $error_username="<span style='color:red;font-size:17px;'>username already exists</span>";
        }
            
    }else{
            $error_username="error"; 
        }
echo json_encode(
    array(
'error'=>true,
    'message'=>$error_username
)    
);
//    echo "ok";
//        if(mysqli_num_rows($user_email_result)>0)
//        {
//           $error_user_email="<h4 style='color:red;font-size:17px;'>user email already exists</h4>";  
//        }

?>
