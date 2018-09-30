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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<style type="text/css">
          *{
                padding:0;
                margin:0;
              box-sizing: border-box;
            }
            body {
            background:#083D77;
            font-family: arial;
            padding: 10px;
            }
		.navbar ul{
			list-style: none ;
           
		}
      ul li {
      	 background-color:#2F2F2F;
      	width:10.7vw;
      	float: left;
      	padding: 0.625vw;
        text-align: center; 
          
     
      }
        ul li ul{
            position: absolute;
            display: none;
            margin-left:-10px;
            margin-top:9.99px; 
        }
        ul li:hover>ul{
            display: block;
            
        }
        ul li a:hover{
            color:#DA4167;
        }
      
         ul li a{
       text-decoration: none;
       color: white;
       display: block;
             text-transform: uppercase;
      }
   .admin{
    
       padding: 50px 50px 0px 50px;
           
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
    
        table{
            
        }
        
    table, th,td {
        border: 1px solid black;
         border-collapse: collapse;
       
    }
    th, td {
        padding: 15px;
        overflow:hidden;
        text-overflow: ellipsis; 
        }
        
        table th {
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	color:#FFFFFF;
	background-color: #5A94CE; /*#66CCFF*/
	
}
/*
        #appadd {
  white-space: nowrap;
overflow: hidden;
width: 180px;
height: 30px;
text-overflow: ellipsis; 
}
*/
        
        .form{
            padding:10px;
            width:500px;
        }
        
.para{
 
    background-color: white;
    margin:5% 100px 0px 130px;
    border: 2px solid black;
}



	</style>
</head>
<body>
    <div class="navbar" style="padding:30px 0px 10px 20px;">
    <ul>
        <li><a href="../home.php">Home</a></li>
        <li><a href="categories.php">Categories</a></li>
         <li><a href="">Posts <i class="fas fa-paste"></i> <i class="fas fa-caret-down"></i></a>
            <ul>
             <li><a href="posts.php">view posts <i class="fas fa-eye"></i></a></li><br>
                <li><a href="posts.php?source=add_post">add posts <i class="fas fa-plus"></i></a></li>
               </ul>
       </li>
          <li><a href="">Users <i class="fas fa-users"></i>  <i class="fas fa-caret-down"></i></a>
        <ul>
         <li><a href="users.php">view users <i class="fas fa-street-view"></i></a></li><br>
                <li><a href="users.php?source=add_user">add user <i class="fas fa-user-edit"></i></a></li>
               </ul>
        </li>
         <li><a href="admin_profile.php">Admin Profile <i class="fas fa-user"></i></a>
          <li style="margin-left:28.125vw;"> <a href="index.php"><?php echo $_SESSION['username']; ?> <i class="fas fa-unlock-alt"></i> <i style=" margin-left:10px;"class="fas fa-caret-down"></i></a>
              <ul>
                <li><a href="include/logout.php">Logout <i class="fas fa-lock"></i></a></li>
               </ul>
        </li>
        </ul></div>
    <div class="para">
     <div class="admin" >
 
   <h1 style="text-align:center;">WELCOME TO ADMIN <small style="color:red;">  <?php echo $_SESSION['username']; ?></small></h1><br>
            <hr style="width:43.75vw;background-color:blue; position:absolute; margin-left:14.37vw;">
             <br>