<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"  >
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('css/login.css') ?>'>
    <title>Login Page</title>
 </head>

 <body>
  <div id="container">
    <h1> Login </h1>
      <?php
      echo validation_errors();
      ?>

        <fieldset class="col-lg-offset-1">
          <div class="form_login">
            <?php
               echo form_open('login/login_validation');

                echo "<p> Email or Username: ";
                echo form_input("email", $this->input->post('email'));
                echo "</p>";

                echo "<p>Password : ";
                echo form_password("password",$this->input->post(md5('password')));
                echo "</p>";

                echo "<p>";
                echo form_submit("login_submit","Login");
                echo "</p>";


                echo form_close();
                ?>
              </div>
            </fieldset>
       <a href = '<?php echo base_url()."login/sign_up" ?>'> Sign up ! </a>

  </div>
 </body>
</html>
