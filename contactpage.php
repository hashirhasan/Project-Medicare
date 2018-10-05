<?php session_start(); ?>
<?php include('contact_process.php'); ?>

<link rel="stylesheet" type="text/css" href="contact_css.css">

<div class="container">  
  
<form id="contact" action="<?= $_SERVER['PHP_SELF'];?>" method="post">

<h3>Quick Contact</h3>
<h4>Contact us today, and get reply with in 24 hours!</h4>

<fieldset>
<input placeholder="Your name" type="text" tabindex="1" required name="name" value="<?= $name?>" autofocus>
<span class="error" ><?= $name_error ?></span>
</fieldset>

<fieldset>
<input placeholder="Your Phone Number" type="text" tabindex="2" name="phone" value="<?= $phone?>">
<span class="error" ><?= $phone_error ?></span>
</fieldset>
  
<fieldset>
<input placeholder="Your Email Address" type="text" tabindex="3" name="email" value="<?= $email?>" autocomplete="off" >
<span class="error" ><?= $email_error ?></span>
</fieldset>
    
<fieldset>
<textarea placeholder="Type your Message Here...."  type="text" name="message" value="<?= $message?>" tabindex="6" ></textarea>
</fieldset>
      
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      <button id="contact-submit" data-submit="...Sending"><a style="text-decoration:none;" href="doctors.php">back</a></button>
   
    <div class="success"><?= $success; ?></div>
  </form>
  
</div>