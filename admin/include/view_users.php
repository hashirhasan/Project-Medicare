 <table>
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Role</th>
                        </tr>
                  </thead>
                    <tbody>
                     <?php 
                        
                        $query="SELECT * FROM users";
                        $result=mysqli_query($connection,$query);
                       if(!$result){
                           die("query failed". mysqli_error());
                       }
                        while($row=mysqli_fetch_assoc($result))
                        {   
                            $user_id=$row['user_id'];
                            $username=$row['username'];
                            $user_firstname=$row['user_firstname'];
                            $user_lastname=$row['user_lastname'];
                            $user_email=$row['user_email'];
                            $user_role=$row['user_role'];
                         echo"<tr>";
                            echo"<td>{$user_id}</td>";
                            echo"<td>{$username}</td>";
                            echo"<td>{$user_firstname}</td>";
                            echo"<td>{$user_lastname}</td>";
                            echo"<td>{$user_email}</td>";
                             echo"<td>{$user_role}</td>";
                            echo"<td><a href='users.php?change_role_to_admin={$user_id}'>Admin</a></td>";
                            echo"<td><a href='users.php?change_role_to_subscriber={$user_id}'>Subscriber</a></td>";
                            echo"<td><a href='users.php?source=edit_user&user_id={$user_id}'>Edit</a></td>";
                            echo"<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this user?');\" href='users.php?delete={$user_id}'>Delete</a></td>";
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


                   if(isset($_GET['change_role_to_admin']))
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

                    if(isset($_GET['change_role_to_subscriber']))
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
                