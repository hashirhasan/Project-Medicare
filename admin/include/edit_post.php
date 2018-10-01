
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
        $cat_title=$row['cat_title'];
        $post_date=$row['post_date'];
        $post_image=$row['post_image'];
        $post_content=$row['post_content'];
        $post_tags=$row['post_tags'];
    }
  }
?>


<?php   
if(isset($_POST['update_post'])){
    
     $title=$_POST['title'];
     $category=$_POST['category'];
     $image=$_FILES['image']['name'];
   $image_temp=$_FILES['image']['tmp_name'];
    $content=$_POST['content'];
    $tags=$_POST['tag'];
      if(empty($image))
    {  
         $message_update="<h3 style='color:blue'>Post updated!!</h3>";
        $query="SELECT * FROM posts WHERE post_id=$post_id";
        $result=mysqli_query($connection,$query);
        if(!$result){

        die("query failed" .mysqli_error($connection));
                        
        }
        while($row=mysqli_fetch_assoc($result)){
            $image=$row['post_image'];
        }
        
    }
    
 $file_ext=explode('.',$image);
  $ext=strtolower(end($file_ext));
 
 $act_ext=array('jpg','jpeg','png');
 if(in_array($ext,$act_ext)){
      $message_update="<h3 style='color:blue'>Post updated!!</h3>";
     move_uploaded_file($image_temp,"../image/$image");
 }
    else {
     $error_text="<h3 style='color:blue'>you cannot upload the file of this type</h3>";
         $query="SELECT * FROM posts WHERE post_id=$post_id";
        $result=mysqli_query($connection,$query);
        if(!$result){

        die("query failed" .mysqli_error($connection));
                        
        }
        while($row=mysqli_fetch_assoc($result)){
            $image=$row['post_image'];
        }
    }
    
   
    
    $query="UPDATE posts SET ";
    $query .="post_title='$title', ";
    $query .="cat_title='$category', ";
    $query .="post_date=now(), ";
    $query .="post_image='$image', ";
    $query .="post_content='$content', ";
    $query .="post_tags='$tags' ";
    $query .="WHERE post_id=$post_id";
    $result=mysqli_query($connection,$query);
    if(!$result){
    die("query failed" .mysqli_error($connection));
    }
// header("Location:posts.php?source=edit_post&p_id=$post_id");
   
}


?>
<div class="col-2"></div>
<div class="col-10">
<form action="" method="post" enctype="multipart/form-data">
    <?php if(!empty($_FILES['image']['name'])) {if(isset($error_text)){echo $error_text;}}?>
    <?php if(isset($message_update)){echo $message_update;}?>
    <div>
    <h2><label for="title" >Post Title</label></h1><br>
    <input class="form"value="<?php echo $post_title;?>" type="text" name="title">
    </div><br><br>
    <div>
        <select name="category">
        <?php 
            echo"<option>{$cat_title}</option>";
            $cat_query="SELECT * FROM category";
     $cat_query_result=mysqli_query($connection,$cat_query);   
    while($row=mysqli_fetch_assoc($cat_query_result))
    { if($row['cat_title']!==$cat_title)
    {
        echo "<option>{$row['cat_title']}</option>";
    }
    }  ?>
  
        </select></div><br><br>
    <div>
    <img style="width:100px;" src="../image/<?php echo $post_image?>"><br>
        <input class="form" type="file" name="image">
    </div><br><br>
    <div>
    <h2><label for="content" >Post Content</label></h1><br>
        <textarea class="form"  type="text" cols='30' rows='10' name="content"><?php echo $post_content;?></textarea>
    <div>
    <h2><label for="tags" >Post Tags</label></h1><br>
       <input class="form" value="<?php echo $post_tags;?>" type="text" name="tag">  
    </div><br><br>
   <div>
    <input class="form"  style="background-color:blue; color:white;"type="submit" name="update_post" value="Update">
    </div>

</form>
</div>