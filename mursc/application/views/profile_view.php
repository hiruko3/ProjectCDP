<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Profile Settings</title>
    </head>

    <body>
        <div id="container" class="col-lg-3 col-lg-offset-1">
            <h2> Change your password </h2>
            </br>
            <?php
            echo validation_errors();
            echo form_open('profile_settings/replace_old_password');
            echo "<p> Enter Previous password : ";
            echo form_password(['name' => 'old_password', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post(md5('old_password'))]);
            echo "</p>";
            echo "<p>Enter New Password : ";
            echo form_password(['name' => 'new_password', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post(md5('new_password'))]);
            echo "</p>";
            echo "<p>Confirm new Password : ";
            echo form_password(['name' => 'confirm_new_password', 'class' => 'form-control', "required" => "required", 'value' => $this->input->post(md5('confirm_new_password'))]);
            echo "</p>";
            ?>

            <div id="container" class="text-center">
                <?php
                echo "<p>";
                echo form_submit("profile_submit", "validate", "class='btn btn-primary'");
                echo "</p>";
                ?>
            </div>
            <?php
            echo form_close();
            ?>

        </div>
    </body>
</html>