<?php include "connect.php" ?>
<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>MEDICARE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
        *{
	padding:0;
	margin:0;
  box-sizing: border-box;
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
               
        
body{
    background-image: url("image/cover25-100.jpg");
    background-size: cover;
    background-repeat: no-repeat;

    }
header{
height:98px;
width: 100%;
background-color: #3DA2F8;
box-shadow: 0px 8px 5px 0 rgba(0,0,0,0.5);
}
.logo{
    padding: 3px 0px 0px 8px; 
    height: 90px;
    width: 180px;

}
/*nav{
    position: absolute;
    height: 50px;
    margin-top: 0px;
    margin-left: 100px;
    width: 85%;
     padding: 40px 150px 20px 60px; 
    background-color: #00569F;
}*/
header ul{
	display: inline;
	float: left;
    position: absolute;
    height: 15px;
    width: ;
    margin-top: 3%;
    margin-left: 2%;
    padding: 1.5vh 10px 1.67vw 0; 
    background-color: #00569F;
    border-radius: 15px 0 0 15px;
    border: 2px solid #1C65A4;
}
header ul li{
	display: inline;
	list-style-type: none;
    margin-left: 7.9vh;
    margin-right: 3.8vh;
}
header ul li a{
	color:white ;
	text-decoration: none;
	font-family:Arial, Helvetica, sans-serif;
	font-size: 15px;
    font-weight: 10px;

} 

header ul li a:hover{
    color: #F97C76;
    transition: all 0.1s ease-in;
        }
.search{
    position: absolute;
    top: 40%;
    left: 35%;
    
}
.search-box{
    width: 100%;

    position: relative;
}
.search-area{
    float: left;
    width: 150%;

    border: 3px solid  #1C65A4;
    border-radius: 15px;
    padding: 11px 70px 11px 11px;
    font-size: 16px;
}
/*.menu-type{
    list-style: none;
    width: 75%;
    height: 100px;
    margin: 0px auto;
}
.menu-type ul li {
    list-style: none;
    background-color: white;
    width: 8%;
    position: absolute;
    top:40%;
    left: 30%;
    padding: 11px 70px 11px 11px;
    border: 3px solid  #1C65A4;
}
.menu-type ul ul li{
    list-style: none;
    position: relative;
    top:50%;
    left: 30%;
    
}
.menu-type ul{
    
}*/
.search-button{
    position: absolute;
    top: 13.6vh;
    left: 14.3vw;
    transform:translate(-50%, -50%);
    background: #00569F;
    color:white;
    font-weight: 10px;
    width: 130px;
    height: 48px;
    border: 2px solid #1C65A4;
    border-radius: 12px;
    font-size: 20px;
    
}
.search-button:hover{
    background:white ;
    color: red;
    cursor: pointer;
    transition: 0.6s;
}

.login-button{
    position: absolute;
    top: 2.67%;
    left: 87%;
    transform:translate(-50%, -50%);
    background:  #00569F;
    color:white;
    font-weight: 4px;
    width: 20%;
    height: 41.3px;
    border: 2px solid #1C65A4;
    /*border-radius: 12px;*/
    font-size: 18px;
    letter-spacing: 1px;
    margin-top: 3%;
    border-radius: 0 15px 15px 0; 
    
}



.login-button:hover{
    background:white ;
    color: red;
    cursor: pointer;
    transition: 0.6s;
}
        

nav ul li{position: absolute;
	font-size: 30px;
	left:85%;
	top: 4%;
	list-style-type: none;
	text-decoration: none;
	padding: 20px;
	cursor: pointer;
/*    background:  #00569F;*/
}



nav ul li ul.sub-nav {
  position: fixed;
  top: 13%;
  left: 82%;
  width: 12%;
  height: 110px;
  background:  #00569F;
  border-top: 1px solid #3d3f50;
  visibility: hidden;
  opacity: 0;
}

nav ul li ul.sub-nav li {
	position: relative;
  color: white;
  font-size: 14px;
  width: 100%;
  padding: 15px 0;
  left: 0;
  text-decoration: none;
  list-style-type: none;
  text-align: center;
}

nav ul li ul.sub-nav li:hover {
  color: #ea3b50;
  cursor: pointer;
}

nav ul li:hover ul.sub-nav {
  visibility: visible;
  opacity: 1;
}
        
        
    
        
       </style>
</head>
<body>
   <header class="header">
        <img class="logo" src="image/medi4.svg">
        
    <ul>
        <li><a  href="home.php">Home</a></li>
        <?php 
        $query="SELECT * FROM category";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $sub=$row['cat_title'];
            $cat_link=$row['cat_link'];
echo "<li><a  href='{$cat_link}'>{$sub}</a></li>";
            
        }
         if(isset($_SESSION['user_role']))
{
 if($_SESSION['user_role']==='admin')
       echo" <li><a href='admin'>Admin</a></li>";
}
      ?>
       </ul>
          </header>
    
    <?php  
       if(isset($_SESSION['user_role'])){echo"<nav>";
    echo"<ul>";
     echo"<li><a style='text-decoration:none;color:white' href='home.php'>{$_SESSION['username']}</a>";
       echo"<ul class='sub-nav'>";
        	echo"<a style='text-decoration: none;' href='fb.com'>";
          echo"<li>Profile</li></a>";
           echo"<a style='text-decoration: none;' href='admin/include/logout.php'>";
           echo"<li>Logout</li></a>";
          echo"</ul>";
      echo"</li></ul></nav>";
    
    
    
    
    } else{echo "<a href='login.php'><input type='button' class='login-button' value='Login / Sign Up'></a>";} 
       ?>
      
 

 
  