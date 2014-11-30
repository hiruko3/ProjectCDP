<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <title>Sign up Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>

 <body>
  <div id="container">
    <h1> Sign up </h1>
    <?php

      echo validation_errors();

      echo form_open ('login/sign_up_validation');

      echo "<p> Email : ";
      echo form_input("username", $this->input->post('username'));
      echo "</p>";

      echo "<p> Email : ";
      echo form_input("email", $this->input->post('email'));
      echo "</p>";

      echo "<p>Password : ";
      echo form_password("password",$this->input->post(md5('password')));
      echo "</p>";

      echo "<p>Confirm Password : ";
      echo form_password("cpassword",$this->input->post(md5('cpassword')));
      echo "</p>";

      echo "<p>";
      echo form_submit("login_submit","Login");
      echo "</p>";

       
      echo form_close();

    ?>
  </div>
 </body>
</html>