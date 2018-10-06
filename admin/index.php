 <?php include "include/adminheader.php"?>    <!--navbar of the admin page  -->
  
<?php
    $result_count_cat=mysqli_query($connection,"SELECT count(*) as total from category");
    $data_cat=mysqli_fetch_assoc($result_count_cat);
$result_count_post=mysqli_query($connection,"SELECT count(*) as total from posts");
    $data_post=mysqli_fetch_assoc($result_count_post);
   $result_count_user=mysqli_query($connection,"SELECT count(*) as total from users");
    $data_user=mysqli_fetch_assoc($result_count_user); 
    
    ?>
<div class="row">
<div class="col-4">
<h1>Categories:<span><?php echo $data_cat['total']; ?></span></h1>
</div>
<div class="col-4">
<h1>Total Posts:<span><?php echo $data_post['total']; ?></span></h1>
</div>
<div class="col-4">
<h1>Total Users:<span><?php echo $data_user['total']; ?></span></h1>
</div>
</div>

    </div>
</body>
</html>