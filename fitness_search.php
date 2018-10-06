<?php include "include/header.php" ?>
    
<?php include "fitness_css.php" ?>


      <div class="srch-btn">          <!-- helps you to search a specific fitness tip -->
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

    <?php 
            
            if(isset($_POST['submit']))
                {
                    $search=$_POST['search'];
                $query1="SELECT * FROM posts WHERE cat_title='Fitness zone'and post_tags LIKE '%$search%' ";
                 $result1=mysqli_query($connection,$query1);
                 if(!$result1){
                     die("query failed ". mysqli_error($connection));
                 }
                    $count=mysqli_num_rows($result1);
                    if($count==0){
                       ?>
  <script> swal ( "Oops" ,  "No Result Found!" ,  "error" );</script>  
<?php
                        echo"<h1 style=' color:white;margin-top:17% ;margin-left:40%;'>NO Result Found!!</h1>";
                    }
                    else
                    {  ?>
    <div class="bkg-image">
<div class="container">
    <?php
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
       <?php   }
            }?>
    
     
       
    
</body>
</html>