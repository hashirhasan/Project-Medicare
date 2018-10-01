<?php include "include/header.php" ?>


   
        <div class="home-search">
            <div class="home-seach-box">
                <form action="medicine.php" onsubmit="return check()" method="POST" enctype="multipart/form-data">
                <input class="home-search-area" id="search" type="text" placeholder="Medicines/Disease" name="search">
                <div id="List"></div>
               <input type="SUBMIT" class="home-search-button" value="Search">
               </form>
            </div> 
            
        </div>
<div class="typewriter">
  <h1>We Serve, What You Prefer...</h1>


<script type="text/javascript">
          function check(){
            var len = document.getElementById('search').value;
          if (len.length =='' || len.length <= '1' ) {
          return false;
          }
        }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('search').keyup(function(){
                    var search = $(this).val();
                    if(search != '')
                    {
                        $.ajax({
                            url:"medicine.php",
                            method:"POST",
                            data:{search:search},
                            success:function(data)
                            {
                                $('#List').fadeIn();
                                $('#List').html(data);
                            }
                        });
                    }
                });
                $(document).on('click','li',function(){
                   $('search').val($(this).text());
                   $('List').fadeOut();
                });
            });
        </script>
</div>
</body>
</html>