<?php
if(isset($_POST['create_post']))                          //used for adding the post 
{ 
   $title=$_POST['title'];
    $date=date('y-m-d');
    $image=$_FILES['image']['name'];
   $image_temp=$_FILES['image']['tmp_name'];
    $content=$_POST['content'];
    $tags=$_POST['tag'];
    $category=$_POST['category'];
    $link=$_POST['link'];
    $file_ext=explode('.',$image);
  $ext=strtolower(end($file_ext));
 
 $act_ext=array('jpg','jpeg','png');                                 //for adding the files which includes only these extensions
 if(in_array($ext,$act_ext)){
     $message_update="<h3 style='color:blue'>Post added!!</h3>";
    move_uploaded_file($image_temp,"../image/$image");
      $query="INSERT INTO posts(post_title,cat_title,post_date,post_image,post_content,post_tags,post_link) "; 
  $query .="VALUES(' $title','$category',now(),'$image','$content','$tags','$link')";
    $result=mysqli_query($connection,$query);
 }
 else{
     $error_text="<h3 style='color:blue'>you cannot upload the file of this type</h3>";
 }
 
}



?>
<div class="col-2"></div>
<div class="col-10">
     <?php if(!empty($_FILES['image']['name'])) {if(isset($error_text)){echo $error_text;}}?>
     <?php if(!empty($_POST['category'])) {if(isset($message_update)){echo $message_update;}}?>
<form action="" method="post" enctype="multipart/form-data">
    <div>
      
    <h2><label for="title" >Post Title</label></h1><br>
    <input class="form" type="text" name="title">
    </div><br><br>
    <div>
    <select name="category" required>
        <option>select category</option>
        <?php
    $cat_query="SELECT * FROM category";
     $cat_query_result=mysqli_query($connection,$cat_query);   
    while($row=mysqli_fetch_assoc($cat_query_result))
    { 
    
       echo "<option>{$row['cat_title']}</option>";
  }?>
    </select>
    </div><br><br>
    <div>
    <h2><label for="image" >Post Image</label></h1><br>
    <input class="form" type="file" name="image">
    </div><br><br>
    
    <div>
    <h2><label for="content" >Post Content</label></h1><br>
        <textarea class="form" cols='40' rows='20' name="content"></textarea>
   </div><br><br>
    <div>
    <h2><label for="tags" >Post Tags</label></h1><br>
       <input class="form" type="text" name="tag">  
    </div><br><br>
    <div>
   <h2><label for="tags" >Post link</label><small style="color:red">(optional)</small></h1><br>
       <input class="form"  type="text" name="link">  
    </div><br><br>
    <div>
    <input class="form"  style="background-color:blue; color:white;" type="submit" name="create_post" value="Add Post">
    </div>



</form>
</div>