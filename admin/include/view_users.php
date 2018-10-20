 <table>
                    <thead>
                    <tr>
                       
                         <th>User Image</th>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Admin</th>
                        <th>Subscriber</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        
                        </tr>
                  </thead>
                    <tbody>
                     <?php 
                        
                        $query="SELECT * FROM users";
                        $result=mysqli_query($connection,$query);
                       if(!$result){
                           die("query failed". mysqli_error());
                       }
                        while($row=mysqli_fetch_assoc($result))                         //for viewing all the users in the database
                        {   
                            $user_id=$row['user_id'];
                            $user_image=$row['user_image'];
                            $username=$row['username'];
                            $user_firstname=$row['user_firstname'];
                            $user_lastname=$row['user_lastname'];
                            $user_email=$row['user_email'];
                            $user_role=$row['user_role'];
                         echo"<tr>";
                          
                              echo"<td><img style='width:100px;'src='../image/$user_image'></td>";
                            echo"<td>{$username}</td>";
                            echo"<td>{$user_firstname}</td>";
                            echo"<td>{$user_lastname}</td>";
                            echo"<td>{$user_email}</td>";
                             echo"<td>{$user_role}</td>";
                          
                            
                            echo"<td><a href='users.php?change_role_to_admin={$user_id}'>Admin</a></td>";
                            
                          echo"<td>";
                             if($_SESSION['user_id']!==$user_id )
                                   {
                                     echo  "<a href='users.php?change_role_to_subscriber={$user_id}'>Subscriber</a>";
                                       }
                                       echo"</td>";
                            echo"<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";// link for editing the details of the user
                          
                        
                            echo"<td>";
                             if($_SESSION['user_id']!==$user_id )
                                   {
                                     echo  "<a onClick=\"javascript: return confirm('Are you sure you want to delete this user?');\" href='users.php?delete={$user_id}'>Delete</a>";// link for deletion 
                                       }
                                       echo"</td>";
                          
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
                            $user_id=$_GET['delete'];
                               $query="DELETE FROM users ";
                                $query .="WHERE user_id=$user_id";   
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                     die("query failed" .mysqli_error($connection));
                                      }
                            header("Location:users.php");
                                    }
                                }
                        }


                   if(isset($_GET['change_role_to_admin']))                                  //link to change the subscriber to admin
                        {
                            $user_id=$_GET['change_role_to_admin'];
                               $query="UPDATE users SET ";
                                $query .="user_role='admin'";
                                $query .="WHERE user_id=$user_id";   
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                    die("query failed" .mysqli_error($connection));
                                }
                            header("Location:users.php");
                            
                        }

                    if(isset($_GET['change_role_to_subscriber']))         //link to change the  admin  to subscriber
                        {
                            $user_id=$_GET['change_role_to_subscriber'];
                               $query="UPDATE users SET ";
                                $query .="user_role='subscriber'";
                                $query .=" WHERE user_id=$user_id";   
                                $result=mysqli_query($connection,$query);
                                if(!$result){
                                    die("query failed" .mysqli_error($connection));
                                }
                            header("Location:users.php");
                            
                        }
?>
                