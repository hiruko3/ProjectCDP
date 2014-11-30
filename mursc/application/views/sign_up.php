<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sign up Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <body>
        <div id="container" class="col-lg-offset-1" >

            <?php echo br(4); ?>

            <div class="form_login col-lg-4 col-lg-offset-3">


                <div class="text-center">
                    <h2>Welcome to Mursc project</h2>
                </div>
                <?php echo br(2); ?>

                <fieldset class="scheduler-border">
                    <legend class="scheduler-border ">Sign up</legend>

                    <?php
                    echo validation_errors();

                    echo form_open('login/sign_up_validation');

                    echo "<p> Username : ";
                    echo form_input(['name' => 'username', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post('username')]);
                    echo "</p>";

                    echo "<p> Email : ";
                    echo form_input(['name' => 'email', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post('email')]);
                    echo "</p>";

                    echo "<p> Password : ";
                    echo form_input(['name' => 'password', 'type' => 'password', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post(md5('password'))]);
                    echo "</p>";

                    echo "<p> Password confirmation : ";
                    echo form_input(['name' => 'confirm_password', 'type' => 'password', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post(md5('confirm_password'))]);
                    echo "</p>";

                    echo "<div>" . form_submit('signup_submit', 'Sign Up', "class='btn btn-success'");

                    echo form_close();
                    ?>
                    
                    &nbsp;&nbsp; <a href = '<?php echo base_url() . "login" ?>'>Sign in </a>

                    </fieldset>
                </div>
            </div>
    </body>
</html>