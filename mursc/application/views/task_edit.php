<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"  >
    <title>Task Page</title>
 </head>

 <body>
  <div id="container">
    <h1> Task </h1>
      <?php
      if(ISSET($succes)){ echo $succes; }
      if(ISSET($error)){ echo $error; }
      echo validation_errors();
      ?>

        <fieldset class="col-lg-offset-1">
          <div class="form_login">
            <?php
               echo form_open('task_controller/task_edit/'.$t_id);

                echo "<p> Task : ";
                echo form_input("task_name", $this->input->post('task'));
                echo "</p>";

                echo "<p> Date : ";
                $date = array("type"=>"date",
                              "name"=>"task_date",
                              "value"=>$this->input->post('date'));

                echo form_input($date);
                echo "</p>";

                echo "<p> Cost : ";

                $cost = array("type"=>"number",
                              "name"=>"task_cost",
                              "min"=>0,
                              "max"=>40,
                              "value"=>$this->input->post('cost'));

                echo form_input($cost);

                echo "</p>";

                echo "<p> Description : ";
                echo form_input("task_description", $this->input->post('description'));
                echo "</p>";

                echo "<p>";
                echo form_submit("task_submit","validate");
                echo "</p>";


                echo form_close();

                ?>
              </div>
            </fieldset>

  </div>
 </body>
</html>