<!DOCTYPE html>
<html>
<head>
	<title>fitness</title>
	<link rel="stylesheet" type="text/css" href="fitness.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="hp"><h2>Health Products</h2></div>
	<div class="health-product">
		
		<?php
        $mysqli = NEW MySQLI("localhost","root","","medicare");
        $result = $mysqli->query("SELECT * FROM Products");
        while ($rows = $result->fetch_assoc()) {
        ?>
		<div class="container">

	<div>
		<img src="../fitness/<?php echo $rows['Product_image'];?>">
		<h3><?php echo $rows['Product_name'];?></h3>
		<h4>price: ₹<?php echo $rows['Product_price'];?></h4>
		<a href="<?php echo $rows['Product_url'];?>">
		<input type="button" class="buybtn" value="buy"></a>
	</div>
</div>
	<?php
}?>

	<!--<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">
        <h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">

<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">

<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

    <div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">

<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">

<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">

<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">

		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>-->
     
</div>
</div>




<div class="hs"><h2>Health Supplements</h2></div>
	<div class="health-supplements"><?php
        $result = $mysqli->query("SELECT * FROM supplements");
        while ($rows = $result->fetch_assoc()) {
        ?>
		<div class="supplements-container">

	<div>
		<img src="../fitness/<?php echo $rows['sup_image'];?>">
		<h3><?php echo $rows['sup_name'];?></h3>
		<h4>price: ₹<?php echo $rows['sup_price'];?></h4>
	    <a href="<?php echo $rows['sup_url'];?>">
		<input type="button" class="buybtn" value="buy"></a>
	</div>
</div>
<?php
}?>
        
        
		
		<!--<div class="supplements-container">

	<div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

    <div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="suple3.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>


	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	

	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>

	
	<div>
		<img src="prod1.jpg">
		<h3>dbshxgbcbxmdbczsjsdbjdbxcheesgbddgkb</h3>
		<h4>Price:</h4>
		<a href="www.google.com">
		<input type="button" class="buybtn" value="Buy"></a>
	</div>-->
     
</div>
</div>







<div class="hv"><h2>Health-Videos</h2></div>
<div class="health-videos">
    <?php
        $result = $mysqli->query("SELECT * FROM videos");
        while ($rows = $result->fetch_assoc()) {
        ?>
		<div class="video-container">

	<div>
		<iframe src="<?php echo $rows['video_url'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p><?php echo($rows['video_title']);?></p>
	</div>
</div>
<?php
}?>
    
    
	

	<!--	<div class="video-container">

	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>

	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>

	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>

	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>


	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>

	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>

	<div>
		<iframe src="https://www.youtube.com/embed/8lQzkwqhKTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. </p>
	</div>-->

</div>
</div>

</body>
</html>