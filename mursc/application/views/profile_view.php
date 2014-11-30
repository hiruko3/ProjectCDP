<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Profile Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"  >
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('application/css/profile_settings.css')?>'>
 </head>

 <body>
  <div id="container">
    <h1> Change your password </h1>
    <?php
    
      echo validation_errors();

      $attributes = array('id' => 'settings');
      echo form_open('profile_settings/replace_old_password', $attributes);

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

      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

       <a href = '<?php echo base_url()."login/member" ?>'> Votre profil! </a>

  </div>
 </body>
</html>