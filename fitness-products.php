<!DOCTYPE html>
<html>
<head>
	<title>fitness</title>
	<link rel="stylesheet" type="text/css" href="fitnessproducts.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<meta charset="utf-8">
     <style>
        html{
            
            scroll-behavior:smooth;
             overflow-y: scroll;
        }
        
        
#top{
  font-size:50px;
  position: fixed;
  bottom: 40px;
  right: 40px;
  color: #00569F;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  cursor: pointer;
  background: #fff;
  box-shadow: 2px 4px 16px rgba(0, 0, 0, 0.3);
  text-align: center;
}

    
#left{
  font-size:40px;
  position: fixed;
    top:5%;
    left:2%;
  bottom: 40px;
  right: 40px;
  color: #00569F;
  width: 50px;
  height:50px;
  border-radius: 50%;
  cursor: pointer;
  background: #fff;
  box-shadow: 2px 4px 16px rgba(0, 0, 0, 0.3);
  text-align: center;
    padding: 10px 10px 8px 10px;
}

    
    </style>
    
</head>
<body>
<p id="top1"></p>
	<div class="hp"><h2>Health Products</h2></div>                              <!-- showing health products --->
	
	<div class="health-product">
		 
		<div class="container">
		<?php
        $mysqli = NEW MySQLI("localhost","root","","medicare1");
        $result = $mysqli->query("SELECT * FROM Products");
        while ($rows = $result->fetch_assoc()) {
        ?>
	<div>
       
		<img src="image/<?php echo $rows['Product_image'];?>">
		<h3><?php echo $rows['Product_name'];?></h3>
		<h4>Price: ₹<?php echo $rows['Product_price'];?></h4>
		<a target="_blank" href="<?php echo $rows['Product_url'];?>">
		<input type="button" class="buybtn" value="buy"></a>
	</div>
	<?php
}?>
</div>


</div>
</div>




<div class="hs"><h2>Health Supplements</h2></div>                          <!--showing health supplements -->
	<div class="health-supplements">
		<div class="supplements-container">
		<?php
        $result = $mysqli->query("SELECT * FROM supplements");
        while ($rows = $result->fetch_assoc()) {
        ?>
	<div>
		<img src="image/<?php echo $rows['sup_image'];?>">
		<h3><?php echo $rows['sup_name'];?></h3>
		<h4>Price: ₹<?php echo $rows['sup_price'];?></h4>
	    <a target="_blank" href="<?php echo $rows['sup_url'];?>">
		<input type="button" class="buybtn" value="buy"></a>
	</div>
	<?php
}?>
</div>

        
</div>
</div>



<div class="hv"><h2>Health-Videos</h2></div>                             <!--showing youtube health videos -->
<div class="health-videos">
   
		<div class="video-container">
 <?php
        $result = $mysqli->query("SELECT * FROM videos");
        while ($rows = $result->fetch_assoc()) {
        ?>
	<div>
		<iframe src="<?php echo $rows['video_url'];?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		<p><?php echo($rows['video_title']);?></p>
	</div>
	<?php
}?>
</div>

</div>
</div>
 <a style="z-index:4; " id="top" href="#top1"><i class="fa fa-arrow-up"></i></a>
  <a style="z-index:4; " id="left" href="fitness-option.php"><i class="fa fa-arrow-left"></i></a>
</body>
</html>