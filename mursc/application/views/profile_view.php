<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Profile Settings</title>
 </head>

 <body>
  <div id="container">
    <h1> Change your password </h1>
    <?php
    
      echo validation_errors();

      echo form_open('profile_settings/replace_old_password');

      echo "<p> Enter Previous password : ";
      echo form_password("old_password", $this->input->post(md5('old_password')));
      echo "</p>";

      echo "<p>Enter New Password : ";
      echo form_password("new_password",$this->input->post(md5('new_password')));
      echo "</p>";

      echo "<p>Confirm new Password : ";
      echo form_password("confirm_new_password");
      echo "</p>";

      echo "<p>";
      echo form_submit("profile_submit","validate");
      echo "</p>";


      echo form_close();

      ?>

       <a href = '<?php echo base_url()."login/member" ?>'> Votre profil! </a>

  </div>
 </body>
</html>