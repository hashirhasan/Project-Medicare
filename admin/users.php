<?php include "include/adminheader.php" ?>
   
            <div class="row">
              
                <div class="col-7">
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
                        case 'add_user': 
                            
                            include"include/add_user.php";
                            break;
                            
                             case 'edit_user':
                            include"include/edit_user.php";
                            break;
                            
                        default:
                            include"include/view_users.php";
                                break;
                      }
                    
                    ?>
                
                 </div>
                <div class="col-5"></div>
             </div>
    </div>
    </div>
</body>
</html>