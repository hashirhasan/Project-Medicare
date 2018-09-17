<?php include "connect.php" ?>
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
        ?><li><a href="admin">Admin</a></li>
<!--
        <li><a href=""> home</a></li>
         <li><a href="">yoga</a></li>
         <li><a href="">login</a></li>
          <li><a href="">ayurveda</a></li>
-->
        </ul>
    </div><br>
    <div class="row">
    <div style="padding-left: 30px"><br>
        <div class="col-8">
    <?php 
    $query1="SELECT * FROM posts";
    $result1=mysqli_query($connection,$query1);
    while($post=mysqli_fetch_assoc($result1))
    {
        
        ?>
      <?php echo"<h1>{$post['post_title']}</h1>";?>
    	  <?php echo"<h2>{$post['post_date']}</h2><br>";?>
    	<img style="width:50%;" src="image/<?php echo"{$post['post_image']}"; ?>">
    	  <?php echo"<p>{$post['post_content']}</p> ";?> 
        
  <?php  } ?>
    
        </div>
    <div class="col-4">
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="search">
            <input type="submit" name="submit" value="search">
        </form>
        </div>
   
    
    	
    </div>
</body>
</html>