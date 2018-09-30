<?php include "include/adminheader.php"?>

   
            <div class="row">
                <div class="col-1"></div>
                <div class="col-8">
               <?php  
                    
                    if(isset($_GET['source']))
                    {
                        
                        $source=$_GET['source'];
                
                    }else
                    {
                        $source="";
                    }
                    switch($source)
                    {
                        case 'add_post': 
                            
                            include"include/add_post.php";
                            break;
                            
                             case 'edit_post':
                            include"include/edit_post.php";
                            break;
                            
                        default:
                            include"include/view_post.php";
                                break;
                            
                            
                    }
                    
                    ?>
                
                 </div>
                <div class="col-3"></div>
             </div>
    </div>
    </div>
</body>
</html>