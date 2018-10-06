 
 <form action="" method="post">
          <?php  
          if(isset($_GET['edit'])){                                             
              $cat_id=$_GET['edit'];
              $category=$_GET['category'];
              $query="SELECT * FROM category WHERE cat_id={$cat_id}";
              $edit_query=mysqli_query($connection,$query);
               if(!$edit_query){
        die("query failed" .mysqli_error($connection));                
        }
              while($row=mysqli_fetch_assoc($edit_query)){          //for displaying the category for editing
                  $title=$row['cat_title'];
                  $cat_id=$row['cat_id'];
              }
              ?>
             <input value="<?php if(isset($title)){echo $title;} ?>" style="padding:10px;" type="text" name="categories" placeholder="category">
             
         <?php }?>
           <input style="padding:10px;" type="submit" name="edit_cat"  value="Edit Category">
         
          <?php
          if(isset($_POST['edit_cat']))
          { 
            $title=$_POST['categories'];
              $post_query="UPDATE posts SET cat_title='{$title}' WHERE cat_title='$category'";    //for deleting all the post related to specific                                                                                            category
               $update_post_query=mysqli_query($connection,$post_query); 
             if(!$update_post_query){
        die("query failed" .mysqli_error($connection));                
        }
            $query="UPDATE category SET cat_title='{$title}' WHERE cat_id=$cat_id";            //for editing a paricular category
            $update_query=mysqli_query($connection,$query); 
             if(!$update_query){
        die("query failed" .mysqli_error($connection));                
        }
              header("location:categories.php");
          }
            ?>
</form>