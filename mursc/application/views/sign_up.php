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

      echo "<div class='row'><div class='col-md-1'>Username</div>";
      echo "<div class='col-md-2'>" . form_input('username', $this->input->post('username')) . "</div></div>";

      echo "<div class='row'><div class='col-md-1'>Email</div>";
      echo "<div class='col-md-2'>" . form_input('email', $this->input->post('email')) . "</div></div>";

      echo "<div class='row'><div class='col-md-1'>Password</div>";
      echo "<div class='col-md-2'>" . form_password('password', $this->input->post(md5('password'))) . "</div></div>";

      echo "<div class='row'><div class='col-md-1'>Password confirmation</div>";
      echo "<div class='col-md-2'>" . form_password('confirm_password') . "</div></div>";

      echo "<div class='row'><div class='col-md-1'></div>";
      echo "<div class='col-md-2'>" . form_submit('signup_submit', 'Sign Up') . "</div></div>";
       
      echo form_close();

    ?>
  </div>
 </body>
</html>