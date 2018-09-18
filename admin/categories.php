<?php include"include/connect.php" ?>
<?php ob_start(); ?>
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
    padding: 10px;
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
          <li><a href=""></a></li>
        </ul>
    </div><br>  
    <div class="admin" >
        <div class="outline">
    <h1 style="text-align:center;">WELCOME TO ADMIN</h1><br>
            <hr style="width:700px; position:absolute; margin-left:400px;">
             <br>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-4">
                <form action="categories.php" method="post">
     <input style="padding:10px;" type="text" name="categories" placeholder="category">
        <input style="padding:10px;" type="submit" name="submit"  value="Add Category"> 
        </form><br><br>
                    
                    <?php 
                    
                    if(isset($_GET['edit'])){
                        $cat_id=$_GET['edit'];
                        include "include/edit_cat.php";
                    }
                    
                    
                    
                    
                    if(isset($_POST['submit'])){
                        $cat_title=$_POST['categories'];
                        if($cat_title==""||empty($cat_title))
                        {
                            echo"first enter the details";
                        }
                        
                        else
                        {
                        
                        $query="INSERT INTO category(cat_title)";
                        $query .="VALUES('$cat_title')";
                        $insert_category=mysqli_query($connection,$query);
                         if(!$insert_category){
                            die("query failed" .mysqli_error($connection));
                        } 
                        }
                    }
                
                    ?>
                    
                    
                    
                </div>
                <div class="col-6">
                    
             <?php   
                        $query="SELECT * FROM category";
                        $select_categories=mysqli_query($connection,$query);
              ?>
                    <table style="width:100%;">
                      
                        <thead>
                    <tr>
                        <th>Category_Id</th>
                        <th>Category_name</th>
                        </tr>
                            </thead>
                        <tbody>
  
                        <?php
                     
                            while($row=mysqli_fetch_assoc($select_categories))
                            
                            {
                           $cat_id=$row['cat_id'];
                           $cat_title=$row['cat_title'];        
                        ?>
                        <tr>  
                       <?php echo" <td>{$cat_id}</td>"; ?>
                        <?php echo"<td>{$cat_title}</td>"; 
                         echo"<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";         
                        echo"<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";    
                            
                            ?>
                            
                            </tr>  
                        <?php  
                             
                            }
                         
                            ?>   
                        </tbody>
                       <?php  
                        if(isset($_GET['delete']))
                        {
                            $cat_id=$_GET['delete'];
                               $query="DELETE FROM category ";
                                $query .="WHERE cat_id=$cat_id";   
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                    die("query failed" .mysqli_error($connection));
                                }
                            header("Location:categories.php");
                            
                        }
                        ?>
      
                    </table>
            </div>
        </div>
    </div>
   
</body>
</html>