<?php include "connect.php" ?>
<?php session_start();?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>MEDICARE</title>
    <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <meta charset="utf-8">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">
        *{
	padding:0;
	margin:0;
  box-sizing: border-box;
}
 
html {
  scroll-behavior: smooth;
  overflow-y: scroll;

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
    margin: 0;
    top: 0;
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
    height: 17px;
    
    margin-top: 3%;
   margin-left: 2%;
    padding: 1.5vh 0.8vw 1.7vw 0; 
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
.home-search{
    position: absolute;
    top: 40%;
    left: 35%;
    
}
 @media(max-width: 800px){
  .home-search{
    position: absolute;
    top: 40%;
    left: 15%;
  }
}

/*.home-search-box{
    width: 100%;

    position: relative;
}
        */
.home-search-area{
    float: left;
    width: 150%;

    border: 3px solid  #1C65A4;
    border-radius: 15px;
    padding: 11px 70px 11px 11px;
    font-size: 16px;
    outline: none;
}
        
@media screen and (max-width: 1100px){
  .home-search-area{
    width: 90%
    outline:none;
    border: 3px solid  #1C65A4;
        border-radius: 10px;

  }
}


@media(max-width: 1000px){
  .home-search-area{
    width: 70%
    outline:none;
    border: 3px solid  #1C65A4;
        border-radius: 10px;

  }
}


@media(max-width: 800px){
  .home-search-area{
    width: 40%
    outline:none;
    border: 3px solid  #1C65A4;
        border-radius: 10px;

  }
}


@media(max-width: 600px){
  .home-search-area{
    width: 20%
    outline:none;
    border: 3px solid  #1C65A4;
        border-radius: 10px;

  }
}


@media screen and (max-width: 400px){
  .home-search-area{
    width: 10%
    outline:none;
    border: 3px solid  #1C65A4;
        border-radius: 10px;

  }
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
.home-search-button{
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
    outline: none;
}
@media(max-width: 1100px){
  .home-search-button{
    position: absolute;
    top: 14.6vh;
    transform:translate(-50%, -50%);
    background: #00569F;
    color:white;
    font-weight: 10px;
    width: 130px;
    height: 48px;
    border: 2px solid #1C65A4;
    border-radius: 12px;
    font-size: 20px;
    outline: none;
  }
}        
        
.home-search-button:hover{
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
    color:  #00569F;
}
  
        nav ul li:hover{
  color: white;
}

  @media(max-width: 500px){
  nav ul li{
  position:absolute;
  font-size: 30px;
  left: 53%;
  top: 4%;
  list-style-type: none;
  text-decoration: none;
  padding: 0 0 40px 0 ;
  cursor: pointer;
  color:  #00569F;
}
}


nav ul li a:hover{
  color: white;
}


nav ul li ul.sub-nav {
  position: sticky;
  margin-top: 20%;
  margin-left:-45%;
  width: 200%;
  height: 50px;
  background:  #00569F;
  border-top: 1px solid #3d3f50;
  visibility: hidden;
  opacity: 0;
    box-shadow: 0px 8px 5px 0 rgba(0,0,0,0.5);
    
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
    transition: 0.9s;
}
 
        

.typewriter{
  position: absolute;
  top: 64%;
  left: 28%; 
}


.typewriter h1 {
  color: #fff;
  font-family: 'Cabin', sans-serif;
  font-size: 35px;
  color: #00569F;
  overflow: hidden;
  /*border-right: .15em solid orange;*/ /*cursor*/
  white-space: nowrap;
  margin: 0 auto;
  letter-spacing: .15em;
  animation: 
    typing 3.5s steps(30, end), /*30frames and come to end*/
    blink-caret .5s step-end;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}


#top{
  font-size:50px;
  position: fixed;
  bottom: 40px;
  right: 40px;
  color: #00569F;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  cursor: pointer;
  background: #fff;
  box-shadow: 2px 4px 16px rgba(0, 0, 0, 0.3);
  text-align: center;
}







 svg{
    position:relative;
    width:25px;
    height: 25px;
    margin-top: 2%;
    left: 5%;
    background-attachment: fixed;
    border-radius: 4px;
 }

.side-nav{
  height:100%;
  width:0;
  position:fixed;
  z-index:1;
  top:0;
  left:0;
  background-color:#1C65A4;
  opacity:0.9;
  overflow-x:hidden;
  padding-top:60px;
  transition:0.5s;
}

.side-nav a{
  padding:10px 10px 10px 30px;
  text-decoration:none;
  font-size:22px;
  color:white;
  display:block;
  transition:0.3s;
}

.side-nav a:hover{
  color:#F97C76;
}

.side-nav .btn-close{
  position:absolute;
  top:0;
  right:22px;
  font-size:36px;
  margin-left:50px;
}


@media(max-width:1350px){
  .navbar-nav{display:none;}
  header ul{display: none;}
}

@media(min-width:1299px){
  .open-slide{display:none}
  
}  
        

        
       </style>
</head>
<body class="bkg-img">
   <header id="top1" class="header">
       <a  href="home.php"><img class="logo" src="image/medi4.svg"></a>
        
    <ul>
        <li><a  href="home.php">Home</a></li>
        <?php 
        $query="SELECT * FROM category ORDER BY cat_id ASC";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $sub=$row['cat_title'];
            $cat_link=$row['cat_link'];
echo "<li><a  href='{$cat_link}'>{$sub}</a></li>";
            
        }
        
    ?>
        
 <li><a  href="doctors.php">Consult to Doctors</a></li>
        <?php
         if(isset($_SESSION['user_role']))
{
 if($_SESSION['user_role']==='admin')
 {
     echo "<li><a href='admin'>Admin</a></li>";
 }
     if($_SESSION['user_role']==='subscriber'){
              echo "<li><a href='user_profile.php'>Profile</a></li>"; 
           }
    
}
          
      ?>
       </ul>
        <nav class="navbar">
    <span class="open-slide">
      <a href="#" onclick="openSlideMenu()">
        <svg >
            <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
            <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
            <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
        </svg>
      </a>
    </span>
    </nav>
       <div id="side-menu" class="side-nav">
    <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
           
           
            <a  href="home.php">Home</a>
        <?php 
        $query="SELECT * FROM `category` ORDER BY `cat_id` ASC";
        $result=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $sub=$row['cat_title'];
            $cat_link=$row['cat_link'];
echo "<a  href='{$cat_link}'>{$sub}</a>";
            
        }
        
    ?>
        
 <a  href="doctors.php">Consult to Doctors</a>
        <?php
         if(isset($_SESSION['user_role']))
{
 if($_SESSION['user_role']==='admin')
 {
     echo "<a href='admin/index.php'>Admin</a>";
 }
     if($_SESSION['user_role']==='subscriber'){
              echo "<a href='user_profile.php'>Profile</a>"; 
           }
    
}
           
 ?>  
       </div>
      <script>
    function openSlideMenu(){
      document.getElementById('side-menu').style.width = '250px';
      document.getElementById('main').style.marginLeft = '250px';
    }

    function closeSlideMenu(){
      document.getElementById('side-menu').style.width = '0';
      document.getElementById('main').style.marginLeft = '0';
    }
  </script>     
           
           
          </header>
    
    <?php  
       if(isset($_SESSION['user_role'])){
    echo"<nav>";
    echo"<ul>";
     echo"<li><a style='text-decoration:none; text-transform:capitalize;' href='home.php'>{$_SESSION['username']}</a>";
       echo"<ul class='sub-nav'>";
        	
           echo"<a style='text-decoration: none;' href='admin/include/logout.php'>";
           echo"<li>Logout</li></a>";
          echo"</ul>";
      echo"</li></ul></nav>";
    
    
    
    
    } else{echo "<a href='login.php'><input type='button' class='login-button' value='Login / Sign Up'></a>";} 
       ?>
      
 

 
  <a style="z-index:4; " id="top" href="#top1"><i class="fa fa-arrow-up"></i></a>