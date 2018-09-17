
<?php
  if(isset($_GET['p_id'])){
      $post_id=$_GET['p_id'];
    $query="SELECT * FROM posts WHERE post_id=$post_id";
    $result=mysqli_query($connection,$query);
   if(!$result){
       die("query failed". mysqli_error());
   }
    while($row=mysqli_fetch_assoc($result))
    {   
       
        $post_title=$row['post_title'];
        $post_date=$row['post_date'];
        $post_image=$row['post_image'];
        $post_content=$row['post_content'];
        $post_tags=$row['post_tags'];
    }
  }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div>
    <h2><label for="title" >Post_Title</label></h1><br>
    <input class="form"value="<?php echo $post_title;?>" type="text" name="title">
    </div><br><br>
    <div>
        <select>
        <?php 
            echo"<option>{$post_id}</option>";
            ?>
  
        </select></div><br><br>
    <div>
    <img style="width:100px;" src="../image/<?php echo $post_image?>"><br>
        <input class="form" type="file" name="image">
    </div><br><br>
    <div>
    <h2><label for="content" >Post_content</label></h1><br>
        <textarea class="form"  type="text" cols='30' rows='10' name="content"><?php echo $post_content;?></textarea>
    <div>
    <h2><label for="tags" >Post_Tags</label></h1><br>
       <input class="form" value="<?php echo $post_tags;?>" type="text" name="tag">  
    </div><br><br>
   
    <input class="form"  style="background-color:blue;"type="submit" name="update_post" value="Update">
    </div>

</form>
<?php   
if(isset($_POST['update_post'])){
    
     $title=$_POST['title'];
     $image=$_FILES['image']['name'];
   $image_temp=$_FILES['image']['tmp_name'];
    $content=$_POST['content'];
    $tags=$_POST['tag']; 
    move_uploaded_file($image_temp,"../image/$image"); 
    if(empty($image))
    {
        $query="SELECT * FROM posts WHERE post_id=$post_id";
        $result=mysqli_query($connection,$query);
        if(!result){

        die("query failed" .mysqli_error($connection));
                        
        }
        while($row=mysqli_fetch_assoc($result)){
            $image=$row['post_image'];
        }
        
    }
    
    $query="UPDATE posts SET ";
    $query .="post_title='$title', ";
    $query .="post_date=now(), ";
    $query .="post_image='$image', ";
    $query .="post_content='$content', ";
    $query .="post_tags='$tags' ";
    $query .="WHERE post_id=$post_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed" .mysqli_error($connection));
    }
 header("Location:posts.php?source=edit_post&p_id=$post_id");
}


?>

