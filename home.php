<?php include "include/header.php" ?>                     <!--including the navigation bar of the website--> 


   
        <div class="home-search">
            <div class="home-seach-box">
                <form action="medicine.php" onsubmit="return check()" method="POST" enctype="multipart/form-data">
                <input class="home-search-area" id="search" type="text" placeholder="Medicines/Disease" name="search">
                
               <input type="SUBMIT" class="home-search-button" value="Search">
               </form>
            </div> 
            
        </div>
<div class="typewriter">
  <h1>We Serve, What You Prefer...</h1>


 <script type="text/javascript">              // disabling the search button when nothing is entered  
          function check(){
            var len = document.getElementById('search').value;
          if (len.length =='' || len.length <= '1' ) {
          return false;
          }
        }
        </script>
      
</div>

<?php include"footer.php" ?>
</body>
<style>
    ::placeholder{
        color: grey;
    }
</style>
</html>