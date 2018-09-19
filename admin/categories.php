
<?php include "include/adminheader.php"?>

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