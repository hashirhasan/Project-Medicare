<?php include"connect.php"?>
<?php 
if(isset($_GET['user_email']))
{
    $user_cmpass=1;
    $token='';
   $query="UPDATE users SET ";
    $query.="user_cmpass=$user_cmpass,";
    $query .="token='$token'";
    $query_result=mysqli_query($connection,$query);
    if(!$query_result){
        die("query failed".mysqli_error($connection));
    }
    echo "<h2 style='margin:200px 0px 0px 400px;color:blue;'>Your Email Has Been Verified!!</h2>";
}