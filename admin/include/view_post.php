 <table>
                    <thead>
                    <tr>
                        <th>post_title</th>
                        <th>post_date</th>
                        <th>post_image</th>
                        <th>post_content</th>
                        <th>post_tags</th>
                        </tr>
                  </thead>
                    <tbody>
                     <?php 
                        
                        $query="SELECT * FROM posts";
                        $result=mysqli_query($connection,$query);
                       if(!$result){
                           die("query failed". mysqli_error());
                       }
                        while($row=mysqli_fetch_assoc($result))
                        {   
                            $post_id=$row['post_id'];
                            $post_title=$row['post_title'];
                            $post_date=$row['post_date'];
                            $post_image=$row['post_image'];
                            $post_content=$row['post_content'];
                            $post_tags=$row['post_tags'];
                         echo"<tr>";
                            echo"<td>{$post_title}</td>";
                            echo"<td>{$post_date}</td>";
                            echo"<td><img style='width:100px;'src='../image/$post_image'></td>";
                            echo"<td>{$post_content}</td>";
                            echo"<td>{$post_tags}</td>";
                            echo"<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                            echo"<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                             echo"</tr>";
                            
                        }
                        
                    ?>
                    </tbody>
                    </table>
<?php 
                     if(isset($_GET['delete']))
                        {
                            $post_id=$_GET['delete'];
                               $query="DELETE FROM posts ";
                                $query .="WHERE post_id=$post_id";   
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                    die("query failed" .mysqli_error($connection));
                                }
                            header("Location:posts.php");
                            
                        }
?>
                