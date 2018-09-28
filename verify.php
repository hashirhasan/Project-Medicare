<?php include"connect.php"?>
<?php 
if(isset($_GET['user_email']))
{
    $user_cmpass=1;
    $token_key='';
    $query_check="SELECT * FROM users";
    $query_check_result=mysqli_query($connection,$query_check);
    while($row=mysqli_fetch_assoc($query_check_result))
    {
        $token_check=$row['token'];
    }
    if($_GET['token']===$token_check){
        
    
   $query="UPDATE users SET ";
    $query.="user_cmpass=$user_cmpass,";
    $query .="token='$token_key'";
    $query_result=mysqli_query($connection,$query);
    if(!$query_result){
        die("query failed".mysqli_error($connection));
    }
    echo "<h2 style='margin:200px 0px 0px 400px;color:blue;'>Your Email Has Been Verified!!</h2>";
}
    else
    {
       echo "<h2 style='margin:200px 0px 0px 400px;color:blue;'>Your Link Has Been Expired!!</h2>"; 
    }
}