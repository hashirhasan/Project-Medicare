<?php include "include/header.php" ?>
    <div class="row">
    <div style="padding-left: 30px"><br>
        <div class="col-8">
    <?php 
            
            if(isset($_POST['submit']))
                {
                    $search=$_POST['search'];
                $query1="SELECT * FROM posts WHERE post_category='yoga'and post_tags LIKE '%$search%' ";
                 $result1=mysqli_query($connection,$query1);
                 if(!$result1){
                     die("query failed ". mysqli_error($connection));
                 }
                    $count=mysqli_num_rows($result1);
                    if($count==0){
                        echo"<h1>no result</h1>";
                    }
                    else
                    {
    
    while($post=mysqli_fetch_assoc($result1))
    {
        
        ?>
      <?php echo"<h1>{$post['post_title']}</h1>";?>
    	  <?php echo"<h2>{$post['post_date']}</h2><br>";?>
    	<img style="width:50%;" src="image/<?php echo"{$post['post_image']}"; ?>">
    	  <?php echo"<p>{$post['post_content']}</p> ";?> 
        
  <?php  } 
          
          }
            }?>
    
        </div>
        <?php
         if(isset($_SESSION['user_role']))
        {?>
          <div class="col-4">
                <form action="yoga_search.php" method="post">
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