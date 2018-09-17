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
            padding-top: 50px;
           
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
         <li><a href=""></a></li>
          <li><a href=""></a></li>
        </ul></div><br>
    <div class="admin" >
    <h1 style="text-align:center;">WELCOME TO ADMIN</h1><br>
    </div>
</body>
</html>