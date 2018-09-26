
<?php include "include/header.php" ?>
<?php include "yoga.css" ?>
<?php	
if(isset($_SESSION['user_role']))
{
    ?>
<div class="srch-btn">
      <form action="yoga_search.php" method="post">
			<input type="text"  name="search" class="search-area"  placeholder="YOGA NAME" onkeyup="stoppedTyping()">
               <input type="submit"  name="submit" class="search-button" value="Search" id="start_button" >
           </form>
	    </div>
 
 
    <script>
    function stoppedTyping(){
        if(this.value.length > 0) { 
            document.getElementById('start_button').disabled = false; 
        } else { 
            document.getElementById('start_button').disabled = true;
        }
    }
</script>
 <?php 
       $query1="SELECT * FROM posts WHERE post_category='yoga'";
    $result1=mysqli_query($connection,$query1);
    while($row=mysqli_fetch_assoc($result1))
    {  ?>
<div class="container">
	<div class="card">
		<div class="front"><img src="image/<?php echo"{$row['post_image']}"; ?> " style="border-radius: 25px 0 0 25px;height: 100%; width: 100%;"></div>
		<div class="back"><?php echo"<h4>{$row['post_title']}</h4>";?><button class="searchbtn">CLICK TO KNOW MORE</button>
	</div>
	</div>

	<div class="card2">
		<div class="front2"><h1>Benefits</h1>
			
          <?php echo"<p>{$row['post_content']}</p> ";?> 
		</div>

	</div>
	
</div>

  <?php  } 

}
else{ ?>

      <script>alert('first login ');</script> 
    
<?php  }?>
</body>
</html>

