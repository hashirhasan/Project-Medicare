<?php include "connect.php" ?>
<?php session_start();?>
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
        
      ul li a{
      	background-color: grey;
      	width:200px;
      	float: left;
      	padding: 10px;
       text-decoration: none;
       color: white;
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
       </style>
</head>
<body>
    <div class="navbar">
    <ul>
        <li><a href="home.php">Home</a></li>
        <?php 
        $query="SELECT * FROM category";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $sub=$row['cat_title'];
            $cat_link=$row['cat_link'];
echo "<li><a href='{$cat_link}'>{$sub}</a></li>";
            
        }
        ?>
        <?php
        if(isset($_SESSION['user_role']))
{
 if($_SESSION['user_role']==='admin')
       echo" <li><a href='admin'>Admin</a></li>";
}
    ?>
    </ul>
    </div><br>
