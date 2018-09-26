<?php include('form_process.php'); ?>
<!--<link rel="stylesheet" type="text/css" href="form.css">-->
<div class="container">  
  <form id="contact" action="<?= $_SERVER['PHP_SELF'];?>" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    
      <input placeholder="Your name" type="text" tabindex="1" required name="name" value="<?= $name?>" autofocus>
      <span class="error" ><?= $name_error ?></span>
    
      <input placeholder="Your Phone Number" type="text" tabindex="4" name="phone" value="<?= $phone?>" required>
      <span class="error" ><?= $phone_error ?></span>
  
      <input placeholder="Your Email Address" type="text" tabindex="2" name="email" value="<?= $email?>" required>
      <span class="error" ><?= $email_error ?></span>
  
    
      <input placeholder="Password" type="password" tabindex="3" name="password" value="<?= $password?>" id="myInput" required>
      <span class="error"><?= $password_error ?></span><br/>
   
   
    
      <input placeholder="Confirm Password" type="password" tabindex="4" name="cpassword" value="<?= $cpassword?>" id="mycInput" required>
      <span class="error"><?= $cpassword_error ?></span><br/>
    
     <input type="checkbox" onclick="myFunction()">Show Password
    
    
      <textarea placeholder="Type your Message Here...."  type="text" name="message" value="<?= $message?>" tabindex="5" required></textarea>
  
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
  
    <div class="success"><?= $success; ?></div>
  </form>
 <script>
function myFunction() {
    var x = document.getElementById("myInput");
    var y = document.getElementById("mycInput");
    if (x.type == "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
     if (y.type == "password") {
        y.type = "text";
    } else {
        y.type = "password";
    }
}
</script>

  
</div>