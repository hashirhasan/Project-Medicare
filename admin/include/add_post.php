<?php
if(isset($_POST['create_post']))
{ 
   $title=$_POST['title'];
    $date=date('y-m-d');
    $image=$_FILES['image']['name'];
   $image_temp=$_FILES['image']['tmp_name'];
    $content=$_POST['content'];
    $tags=$_POST['tag'];
    $category=$_POST['category'];
    
    move_uploaded_file($image_temp,"../image/$image"); 
  $query="INSERT INTO posts(post_title,post_category,post_date,post_image,post_content,post_tags) "; 
  $query .="VALUES(' $title','$category',now(),'$image','$content','$tags')";
    $result=mysqli_query($connection,$query);
}



?>


<form action="" method="post" enctype="multipart/form-data">
    <div>
    <h2><label for="title" >Post_Title</label></h1><br>
    <input class="form" type="text" name="title">
    </div><br><br>
    <div>
    <select required>
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
    <h2><label for="image" >Post_image</label></h1><br>
    <input class="form" type="file" name="image">
    </div><br><br>
    <div>
    <h2><label for="content" >Post_content</label></h1><br>
        <textarea class="form" cols='30' rows='10' name="content"></textarea>
   </div><br><br>
    <div>
    <h2><label for="tags" >Post_Tags</label></h1><br>
       <input class="form" type="text" name="tag">  
    </div><br><br>
   
    <input class="form"  style="background-color:blue;"type="submit" name="create_post" value="submit">
    </div>



</form>