<?php include "include/header.php"?>

<!DOCTYPE html>
<html>
<head>
	<title>yoga</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="fitness-option.css">
</head>
    <?php	
if(isset($_SESSION['user_role']))
{
  ?>
<body>
	
<div class="container">
    <div class="card1"><h2>Fitness Tips</h2><a href="fitness.php"><img src="image/food22.jpg"></a></div>
		
    <div class="card2"><h2>Fitness Product</h2><a href="fitness-products.php"><img src="image/work22.jpg"></a></div>

	<!-- <div class="card3"></div> -->
		
</div>

</body>
<?php    }
else
{  ?>
  <script>swal("Medicare Says:", "First Please Login!");</script>

      <?php

    }?>  
    
</html>