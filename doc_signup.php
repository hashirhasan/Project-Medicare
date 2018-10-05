<?php include "connect.php" ?>

<?php

  $error_username=NULL; 

  $error_pass=NULL;

  $error_user_email=NULL;

  $error_email_wrong=NULL;

  $message=NULL;

  $message_error=NULL;

   $error_doctorname=NULL;

$error_fees=NULL;

 // $error_firstname=NULL;

//$error_username_valid=null;

if(isset($_POST['create_user']))

{

//   echo "Successfully Registered";

    $username=$_POST['username'];

    $doctorname=$_POST['doctorname'];

    //$user_lastname=$_POST['user_lastname'];

    $user_email=$_POST['user_email'];

    $user_password=$_POST['user_password'];

    $timing = $_POST['timing'];

    $address = $_POST['address'];

    $fees = $_POST['fees'];

    $specialization = $_POST['specialization'];

    $exp = $_POST['exp'];

    $qualifications = $_POST['qualifications'];

    $services = $_POST['services'];

    $username_query="SELECT * FROM users WHERE username='$username'";

     $user_email_query="SELECT * FROM users WHERE user_email='$user_email'";

  



    $username_result=mysqli_query($connection,$username_query);

    $user_email_result=mysqli_query($connection,$user_email_query);

     if(mysqli_num_rows($username_result)>0)

    {

        $error_username="<h4 style='color:red;font-size:17px;'>username already exists</h4>";

    }
    
    
 else{
         $error_username="";
    }
     if(!preg_match("/^[A-z0-9@#$%^&*()+?_!-]{3,}$/",$username))

    {

       $error_username_valid="<h4 style='color:red;font-size:17px;'>Invalid Username</h4>";

    }
else{
         $error_username_valid="";
    }


    if(!preg_match("/^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/",$user_email))

    {

       $error_email_wrong="<h4 style='color:red;font-size:17px;'>Invalid Email</h4>";

    }
else{
         $error_email_wrong="";
    }
        

        if(mysqli_num_rows($user_email_result)>0)

        {

           $error_user_email="<h4 style='color:red;font-size:17px;'>user email already exists</h4>";  

        }

        else{
         $error_user_email="";
    }

    

        if(!preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/",$user_password))

        {

           $error_pass="<h4 style='color:red;font-size:17px;'>Your password is too common</h4>";

        }

        else{
         $error_pass="";
    }

      

      if(!preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$doctorname))

      {

          $error_doctorname="<h4 style='color:red;font-size:17px;'>Invalid name format</h4>";

      }
     else{
         $error_doctorname="";
    }

    if($fees<0)
    {
        $error_fees="<h4 style='color:red;font-size:17px;'>Fees Should not be negative</h4>";
    }
 else{
         $error_fees="";
    }
        

    $username=mysqli_real_escape_string($connection,$username);

    $user_password=mysqli_real_escape_string($connection,$user_password);

    $doctorname=mysqli_real_escape_string($connection,$doctorname);
  

      if(preg_match("/^[A-z0-9@#$%^&*()+?_!-]{3,}$/",$username) and preg_match("/^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/",$user_password) and preg_match("/^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/",$user_email) and preg_match("/^[A-z]+[\s]{0,1}[A-z]{2,15}$/",$doctorname) and mysqli_num_rows($username_result)==0 and mysqli_num_rows($user_email_result)==0 and $fees>0)

    { 

        ?>



<?php include"send_mail.php"?>



<?php
error_reporting(0);
          $user_password=md5($user_password);
          
          $filename=$_FILES["photo"]["name"];
          $tmpname=$_FILES["photo"]["tmp_name"];
          $folder = "image/".$filename;
          
          move_uploaded_file($tmpname,$folder);

    $query="INSERT INTO users(username,user_role,user_email,user_password,token) "."VALUES('$username','doctor','$user_email','$user_password','$token')";

    if (mysqli_query($connection, $query)) {
               $last_uid ="SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
      }
          
    $doctor = "INSERT INTO doctors (doc_name,doc_timing,doc_address,doc_fees,doc_exp,doc_qualifications,doc_services,doc_img)"."VALUES ('$doctorname','$timing','$address','$fees','$exp','$qualifications','$services','$filename')";

               if (mysqli_query($connection, $doctor)) {
               $last_id ="SELECT doc_id FROM doctors ORDER BY doc_id DESC LIMIT 1";
              }

              $docuser = "INSERT INTO user_doctor (doc_id,user_id)";
                 $docuser.="VALUES('$last_id','$last_uid')";

                
              $specialistid = $connection->query("SELECT specialization.specialist_id AS id 
                              FROM specialization WHERE specialization.specialist_name = '$specialization'");

                
                while ($rows = mysqli_fetch_assoc($specialistid)) {
                 $sid = $rows['id'];
                }
                
                $specialist = "INSERT INTO doctor_specialization (doc_id,specialist_id)";
                 $specialist.="VALUES('$last_id','$sid')"; 

    $result=mysqli_query($connection,$query);

    $docresult=mysqli_query($connection,$doctor);

    $docuserresult=mysqli_query($connection,$docuser);

    $specialistresult=mysqli_query($connection,$specialist);

    if(!$result && !$docresult && !$specialistresult && !$docuserresult){

    die("query failed". mysqli_error($connection));

    }



 

}

      

}

 

?>







<!DOCTYPE html>

<html>

<head>

    <title>login</title>

    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="doc_signup.css">

</head>

<body>
     <h1 style="color:#392F5A; position:absolute;top:10%;left:53%;">Join MediCare</h1>
    
    <div class="container">
        <div style="position:absolute;margin-left:35%;margin-top:.3%;">
 
            <input type="radio" value="doctor" name="user" checked><span style="font-size:20px;color:red;">Doctor</span>
            <input type="radio" value="user"  onclick="window.location='signup.php';" name="user">User
    </div>
        
          <div class="signup">

               <?php if(isset( $message)){echo  $message;}  ?>

               <?php if(isset( $message_error)){echo  $message_error;}  ?>

           <!-- <h4><a href="signup.php" class="line">Sign Up</a></h4>

            <h4><a href="login.php" class="line">Login</a></h4>-->

    

<form action="doc_signup.php" method="post" onsubmit="return check()" enctype="multipart/form-data">

    <input class="form" type="text" onblur="check2()"  name="doctorname" id="doctorname" placeholder="Doctor Name" title="avoid spaces" required>

  <?php if(isset($error_doctorname)){echo $error_doctorname;} ?>
  <span style="color:red" id="cdoc"></span>
      <input class="form" type="text" onblur="check1()" name="username" id="username"  placeholder="Username" title="Avoid spaces" required> 

 <?php if(isset( $error_username)){echo  $error_username;} ?>

     <?php if(isset( $error_username_valid)){echo  $error_username_valid;} ?>
 <span style="color:red" id="cusername"></span>
    

      <!-- <input class="form" type="text" name="user_lastname" placeholder="Last Name" required>-->  

    

       <input class="form" type="text" onblur="check4()" name="user_email" placeholder="Email" id="user_email" required>  

    <?php if(isset($error_user_email)){echo $error_user_email;}  ?>

    <?php if(isset($error_email_wrong)){echo $error_email_wrong;}  ?>
 <span style="color:red" id="cemail"></span>
       <input class="form" type="password" name="user_password" onblur="check5()" id="user_password" placeholder="Password" required  title="special characters and numbers are required">

     <?php if(isset($error_pass)){echo $error_pass;}  ?>
<span style="color:red" id="cpass"></span>
     <input class="form" type="text" placeholder="Timings" name="timing" required/>
  
      <input class="form" type="text" placeholder="Address" name="address" required/>
    <td style="font-size:20px;">Specialization</td>
          <select class="form" name="specialization">
            <option>Select</option>
            <?php
            $list = $connection->query("SELECT * FROM specialization");
            while ($rows = $list->fetch_assoc()) {
            ?>
            <option><?php echo $rows["specialist_name"]; ?></option>
            <?php
            }
            ?>
          </select>
    
    <div class="leftpart">
      <input class="form" type="text" placeholder="Fees" name="fees" required/>
    
      <?php if(isset( $error_fees)){echo  $error_fees;} ?>
    
      

      <input class="form" type="text" placeholder="Expierence" name="exp" required/>
      
      <input class="form" type="text" placeholder="Qualifications" name="qualifications" required/>

      <input class="form" type="text" placeholder="Services" name="services" required/>
        <h4 style="color:#513C35;">Upload Your Image</h4>
  
        <div class="form"><input type="file" name="photo" accept="image/*" required /></div>
        <button  type="submit" name="create_user"><span>SIGN UP</span></button>
    </div>
    </form>

        </div>

    </div>


    <script>
    function check()
     {
    var username=document.getElementById("username");
    var user_firstname=document.getElementById("doctorname");
     var user_email=document.getElementById("user_email");
     var user_password=document.getElementById("user_password");
    if(username.value.length<=0||doctorname.value.length<=0||user_email.value.length<=0||user_password<=0)
    {
     document.getElementById("details").innerHTML="Fill all the details";
        return false;
    }
        else
        {
            document.getElementById("details").innerHTML="";
            document.getElementById("details").style.visibility = "hidden";
        }
     }
       function check1(){
            var username=document.getElementById("username");
         var regex1 = /^[A-z0-9@#$%^&*()+?_!-]{3,}$/;
    if(username.value.length>0 && (!regex1.test(username.value)))
        {
             document.getElementById("cusername").style.visibility = "visible";
            document.getElementById("cusername").innerHTML="invalid username";
           
        }
         else
        {
            document.getElementById("cusername").innerHTML="";
            document.getElementById("cusername").style.visibility = "hidden";
        }
       }
      function check2(){
       var user_firstname=document.getElementById("doctorname"); 
       var regex2 = /^[A-z]+[\s]{0,1}[A-z]{2,15}$/;
    if(user_firstname.value.length>0 && (!regex2.test(user_firstname.value)))
        {
             document.getElementById("cdoc").style.visibility = "visible";
            document.getElementById("cdoc").innerHTML="invalid doctorname";
           
        }
         else
        {
            document.getElementById("cdoc").innerHTML="";
            document.getElementById("cdoc").style.visibility = "hidden";
        }
      }
      
      function check4(){
            var user_email=document.getElementById("user_email");
    
      var regex4 = /^[A-z0-9._-]+@[a-z]+\.[a-z].{2,5}$/;
    if(user_email.value.length>0 && (!regex4.test(user_email.value)))
        {
              document.getElementById("cemail").style.visibility ="visible";
            document.getElementById("cemail").innerHTML="invalid email";
            
        } 
         else
        {
            document.getElementById("cemail").innerHTML="";
            document.getElementById("cemail").style.visibility = "hidden";
        }
      }
      function check5(){
           var user_password=document.getElementById("user_password");
         var regex5 = /^(?=.*[a-z])(?=.*\d)(?=.*[@_#$^&*()+<,>!]).{5,13}$/;
    if(user_password.value.length>0 && (!regex5.test(user_password.value)))
        {
            document.getElementById("cpass").style.visibility ="visible";
            document.getElementById("cpass").innerHTML="invalid password";
            
        }
         else
        {
            document.getElementById("cpass").innerHTML="";
            document.getElementById("cpass").style.visibility = "hidden";
        }
      }


    </script>   
    

        
</body>

</html>