 <style>
  td,th{
            padding: 15px;
        }
        
        
        
 #appadd {
    white-space: nowrap;
    overflow: hidden;
    width: 20px;
    height: 40px;
    text-overflow: ellipsis; 
}

table.gridtable {
	
	font-family: tahoma;
	line-height:15px;
	font-size:12px;
	color:#333333;
	border-width: 1px;
	
	border-color: #666666;
	border-collapse: collapse;
	
}
table.gridtable th {
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	color:#FFFFFF;
	background-color: #5A94CE; /*#66CCFF*/
	
}
table.gridtable td {
	border-width: 1px;
	border-style: solid;
	border-color: #666666;
	background-color: transparent;
	
}


</style>



<table width="1000px" style="table-layout:fixed;" class="gridtable" >
                    <thead>
                    <tr>
                        <th>post title</th>
                        <th>post date</th>
                        <th>post category</th>
                        <th>post image</th>
                        <th >post content</th>
                        <th >post tags</th>
                         <th>Edit</th>
                         <th>Delete</th>
                        </tr>
                  </thead>
                    <tbody>
                     <?php 
                        
                        $query="SELECT * FROM posts";
                        $result=mysqli_query($connection,$query);
                       if(!$result){
                           die("query failed".mysqli_error());
                       }
                        while($row=mysqli_fetch_assoc($result))
                        {   
                            $post_id=$row['post_id'];
                            $cat_title=$row['cat_title'];
                            $post_title=$row['post_title'];
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_content=$row['post_content'];
                            $post_tags=$row['post_tags'];
                         echo"<tr>";
                            echo"<td >{$post_title}</td>";
                            echo"<td id='appadd'>{$post_date}</td>";
                            echo"<td id='appadd'>{$cat_title}</td>";
                            echo"<td id='appadd'><img style='width:100px;'src='../image/$post_image'></td>";
                            echo"<td id='appadd'>{$post_content}</td>";
                            echo"<td id='appadd' >{$post_tags}</td>";
                            echo"<td id='appadd'><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";     // link  for editing the                                                                                                       posts
                            echo"<td id='appadd'><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";//link for deletion
                             echo"</tr>";
                            
                        }
                        
                    ?>
                    </tbody>
                    </table>
<?php 
                     if(isset($_GET['delete']))
                        {
                             if(isset($_SESSION['user_role']))
                                {
                                    if($_SESSION['user_role']==='admin')
                                    {
                            $post_id=$_GET['delete'];                   //delete the users
                               $query="DELETE FROM posts ";
                                $query .="WHERE post_id=$post_id";   
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                    die("query failed" .mysqli_error($connection));
                                }
                            header("Location:posts.php");
                            
                                  }
                                }
                        }
?> 
                