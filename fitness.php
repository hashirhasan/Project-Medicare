<?php include "include/header.php" ?>
    <div class="row">
    <div style="padding-left: 30px"><br>
         <?php
     if(isset($_SESSION['user_role']))
{
    ?>
        <div class="col-8">
    <?php 
    $query1="SELECT * FROM posts WHERE post_category='fitness'";
    $result1=mysqli_query($connection,$query1);
    while($post=mysqli_fetch_assoc($result1))
    {
        
        ?>
      <?php echo"<h1>{$post['post_title']}</h1>";?>
    	  <?php echo"<h2>{$post['post_date']}</h2><br>";?>
    	<img style="width:50%;" src="image/<?php echo"{$post['post_image']}"; ?>">
    	  <?php echo"<p>{$post['post_content']}</p> ";?> 
        
  <?php  } ?>
    
        </div>
    <div class="col-4">
        <form action="fitness_search.php" method="post">
            <input type="text" name="search" placeholder="search">
            <input type="submit" name="submit" value="search">
        </form>
        </div>
   <?php
}
        else{?>
           <script>alert('first login ');</script> 
     <?php   }
        ?>
    
    	
    </div>
</body>
</html>