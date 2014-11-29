
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"  >
            <title>Login Page</title>
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
                    <legend class="scheduler-border ">Login</legend>

                    <?php
                    echo validation_errors();
                    ?>

                    <?php
                    echo form_open('login/login_validation');

                    echo "<p> Email : ";
                    echo form_input(['name' => 'email', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post('email')]);
                    echo "</p>";

                    echo "<p>Password : ";
                    echo form_input(['name' => 'password', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post(md5('password'))]);
                    echo "</p>";

                    echo "<p>";
                    echo form_submit("login_submit", "Login", "class='btn btn-primary col-lg-2'");
                    echo "</p>";

                    echo form_close();
                    ?>
                    <div id="container" class="col-lg-3">
                        <a href = '<?php echo base_url() . "login/sign_up" ?>'>Sign up </a>
                    </div>
                </fieldset>
            </div>

        </div>
    </body>
</html>