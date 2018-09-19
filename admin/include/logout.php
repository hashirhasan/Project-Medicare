<?php session_start(); ?>
<?php session_destroy(); ?>
<?php
// $_SESSION['username']= $enter_username;
//      $_SESSION['user_password']= $enter_password;
//      $_SESSION['user_role']= $user_role;
header("Location:../../home.php");
?>