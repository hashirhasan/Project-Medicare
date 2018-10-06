
<?php include "include/header.php" ?>
<?php include "fitness_css.php" ?>
<?php	
    if(!isset($_SESSION['user_role']))
    {
        header("Location:home.php");
    }
 if(isset($_SESSION['user_role']))
{
  ?>

      <div class="srch-btn">
    <form action="fitness_search.php" method="post">
     <input type="text" id="mytext"  name="search" class="search-area"  placeholder="FITNESS NAME" onkeyup="enabled()" >
     <button type="submit"  name="submit" class="search-button"  id="start_button"  disabled>Search</button>
   </form>
 </div>


        <!--javacript for enabling the button "search"-->



 <script type="text/javascript">
  function enabled(){
    if(document.getElementById("mytext").value==="") { 
            //console.log(document.getElementById("mytext").value);
            document.getElementById('start_button').disabled = true; 
          } else { 
            document.getElementById('start_button').disabled = false;
          }
        }
      </script>

<div class="bkg-image">
<div class="container">
    <?php 
	$query1="SELECT * FROM posts WHERE cat_title='Fitness zone'";
    $result1=mysqli_query($connection,$query1);
    while($row=mysqli_fetch_assoc($result1))             //for displaying the contents of the posts related to articles
    {  ?>
		<div>
		<h1><?php echo"{$row['post_title']}";?></h1>
		
		<img src="image/<?php echo"{$row['post_image']}"; ?> ">
		<a href="#" class="box1">
            <p><?php echo"{$row['post_content']}";?></p> </a>
    </div>
	<?php }?>
</div>
</div>
    <?php    }
?>
</body>
</html>