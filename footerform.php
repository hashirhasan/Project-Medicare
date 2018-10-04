<?php include('footerform_process.php'); ?>
<html>
  <head>
      <link href='https://fonts.googleapis.com/css?family=Rajdhani|Pacifico' rel='stylesheet' type='text/css'/>
      <link href='footerform.css' rel='stylesheet' type='text/css'/>
  </head>
<body>
  <section>
    <div class="overlay">
    <div class="wrapper">
    <div class="title">
    Feel free to get in touch<br/>
     We are here assist you.
    </div>
    <form class="form" action="<?= $_SERVER['PHP_SELF'];?>" method="post" >
      <input type="text" class="name field-in font" placeholder="Your Name" name="name" value="<?= $name?>" required/>
      <span class="error" ><?= $name_error ?></span>
      <input type="text" class="email field-in font" placeholder="Email" name="email" value="<?= $email?>" required/>
      <span class="error" ><?= $email_error ?></span>

      <textarea class="message field-in font" placeholder="Message" name="message" value="<?= $message?>" required></textarea> 
      
      <button type="submit" name="submit" class="submit font">Submit</button>
        <div class="success"><?= $success; ?></div>
        
    </form>  	
    <div class="shadow"></div>
  </div>
  </div>
  </section>
</body>
</html>