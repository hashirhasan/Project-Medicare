
<?php include "include/header.php" ?>
<?php include "yoga.css" ?>

<?php	
if(isset($_SESSION['user_role']))
{                                                             //helps to search a specific yoga aasan
  ?>                                                             
  <div class="srch-btn">
    <form action="yoga_search.php" method="post">
     <input type="text" id="mytext"  name="search" class="search-area"  placeholder="YOGA NAME" onkeyup="enabled()" >
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


      <!--selecting all the posts of yoga and displaying them-->



      <?php 
      $query1="SELECT * FROM posts WHERE cat_title='Yoga Aasans'";
      $result1=mysqli_query($connection,$query1);
      while($row=mysqli_fetch_assoc($result1))
        {  ?>
          <div class="container">
           <div class="card">
            <div class="front"><img src="image/<?php echo"{$row['post_image']}"; ?>" 
              style="border-radius: 25px 0 0 25px;height: 100%; width: 100%;">
            </div>
               <div class="back"><?php echo"<h4>{$row['post_title']}</h4>";?><button class="searchbtn"><a target="_blank" href="<?php echo $row['post_link']; ?>">CLICK TO KNOW MORE</a></button>
                
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
    else{

      ?>

      <script>
          swal("Medicare Says:", "First Please Login!"). then(function(){
  window.location = "home.php";
             })
     </script> 

      <?php
     
    }?>
  </body>
  </html>

