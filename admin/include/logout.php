<?php session_start(); ?>
<?php session_destroy(); ?>                 <!--for ending the session  -->
<?php
// $_SESSION['username']= $enter_username;
//      $_SESSION['user_password']= $enter_password;
//      $_SESSION['user_role']= $user_role;
header("Location:../../home.php");       //updating the location
?>