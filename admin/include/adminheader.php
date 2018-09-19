<?php include"include/connect.php" ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION['user_role']))
{
 if($_SESSION['user_role']!=='admin')
   header("Location:../home.php");
}
else if(!isset($_SESSION['user_role']))
{
    header("Location:../home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
	<style type="text/css">
          *{
                padding:0;
                margin:0;
              box-sizing: border-box;
            }
        
		.navbar ul{
			list-style: none ;
           
		}
      ul li {
      	 background-color: grey;
      	width:120px;
      	float: left;
      	padding: 10px;
        text-align: center; 
     
      }
        ul ul{
            position: absolute;
            display: none;
            margin-left:-10px; 
        }
        ul li:hover>ul{
            display: block;
        }
         ul li a{
       text-decoration: none;
       color: white;
       display: block;
      }
   .admin{
    
       padding: 50px 50px 0px 50px;
           
        } 
  .outline{
      
         border:2px solid blue;
    
        }
        
        
    .row::after {
    content: "";
    clear: both;
    display: table;
    }

    [class*="col-"] {
    float: left;
    padding: 30px;
    }
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
        
    table, th,td {
        border: 1px solid black;
         border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        }
        .form{
            padding:10px;
            width:500px;
        }



	</style>
</head>
<body>
    <div class="navbar" style="padding:30px 0px 10px 20px;">
    <ul>
        <li><a href="../home.php">Home</a></li>
        <li><a href="categories.php">Categories</a></li>
         <li><a href="">Posts</a>
            <ul>
             <li><a href="posts.php">view posts</a></li><br>
                <li><a href="posts.php?source=add_post">add posts</a></li>
               </ul>
       </li>
          <li><a href="">Users</a>
        <ul>
         <li><a href="users.php">view users</a></li><br>
                <li><a href="users.php?source=add_user">add user</a></li>
               </ul>
        </li>
         <li><a href="profile.php">Profile</a>
          <li style="margin-left:700px;" ><a href="index.php"><?php echo $_SESSION['username']; ?></a>
              <ul>
             <li><a href="">Profile</a></li><br>
                <li><a href="include/logout.php">Logout</a></li>
               </ul>
        </li>
        </ul></div><br>
     <div class="admin" >
        <div class="outline">
   <h1 style="text-align:center;">WELCOME TO ADMIN <small style="color:blue;">  <?php echo $_SESSION['username']; ?></small></h1><br>
            <hr style="width:700px; position:absolute; margin-left:400px;">
             <br>