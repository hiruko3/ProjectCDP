<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Sign up Page</title>
 </head>

 <body>
  <div id="container">
    <h1> Sign up </h1>
    <?php

      echo validation_errors();

      echo form_open ('login/sign_up_validation');

      echo "<p>Email: ";
      echo form_input('email', $this->input->post('email'));
      echo "</p>";

      echo "<p>Password: ";
      echo form_password('password', $this->input->post(md5('password')));
      echo "</p>";

      echo "<p>Password confirmation: ";
      echo form_password('confirm_password');
      echo "</p>";

      echo "<p>";
      echo form_submit('signup_submit', 'Sign Up');

      echo "</p>";
       
      echo form_close();

    ?>
  </div>
 </body>
</html>