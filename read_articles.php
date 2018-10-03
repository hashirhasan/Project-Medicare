
<?php include "include/header.php" ?>
<?php include "read_articles_css.php" ?>


       
<div class="bkg-image">
<div class="container">
    <?php 
	$query1="SELECT * FROM posts WHERE cat_title='Read Articles'";
    $result1=mysqli_query($connection,$query1);
    while($row=mysqli_fetch_assoc($result1))             //for displaying the contents of the posts related to articles
    {  ?>
		<div>
		<h1><?php echo"{$row['post_title']}";?></h1>
		<h5> Posted On:<?php echo"{$row['post_date']}"; ?></h5>
		<img src="image/<?php echo"{$row['post_image']}"; ?> ">
		<a href="#" class="box1">
            <p><?php echo"{$row['post_content']}";?></p> </a>
    </div>
	<?php }?>
</div>
</div>
    
</body>
</html>