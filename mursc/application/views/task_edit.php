<html lang="fr">
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <title>Task edit</title>
 </head>
    <div id="container" class="col-lg-offset-1">
        <h2> <?php echo 'Edit task : ' . $task->taskname; ?> </h2>        
        <?php
          echo validation_errors();
          echo br(1);
        ?>

        <div class='row'>
            <div class='col-md-1'>
                <?php echo anchor(base_url() . 'task_controller/displayTask/' . $task->id, ' View', 'class="btn btn-default fa fa-eye"'); ?>
            </div>
        </div>   

        <?php echo br(1); ?>

        <?php
          if(ISSET($success)){ echo '<i class="fa fa-check-square text-success"> ' . $success . '</i>'; }
          if(ISSET($error)){ echo '<i class="fa fa-times-circle text-danger"> ' . $error . '</i>'; }
        ?>

        <br/>

        <?php
        echo form_open(base_url() . 'task_controller/taskSettings/' . $task->id, "class='col-lg-7 form-horizontal'");
        ?>

        <div class='row'>
          <label  class="col-lg-5" for="taskname">Name : </label>
          <div class="col-lg-5">
              <p>
                  <input class="form-control" type="text" name="taskname" id="taskname" value="<?php echo $task->taskname; ?>" </input>
              </p>
          </div>
        </div>

        <div class='row'>
          <label for="status" class="col-lg-5" > Status : </label>
          <div class="col-lg-5">
              <p>
                  <select  class="form-control" id="status" name="status">
                      <option value="not ready" <?php if ($task->statut == 'not ready'){ echo 'SELECTED'; } ?> > Not ready </option>
                      <option value="ready" <?php if ($task->statut == 'ready'){ echo 'SELECTED'; } ?> > Ready </option>
                      <option value="in progress" <?php if ($task->statut == 'in progress'){ echo 'SELECTED'; } ?> > In progress </option>
                      <option value="dev done" <?php if ($task->statut == 'dev done'){ echo 'SELECTED'; } ?> > Dev done </option>                    
                      <option value="done" <?php if ($task->statut == 'done'){ echo 'SELECTED'; } ?> > Done </option>
                  </select>
              </p>
          </div>
        </div>

        <div class='row'>
          <label for="cost" class="col-lg-5" > Cost * : </label>
          <div class="col-lg-5">
            <?php echo form_dropdown('cost', $fibonacci, $task->cost); ?>
          </div>
        </div>

        <div class='row'>
          <label  class="col-lg-5" for="dev">Developer : </label>
          <div class="col-lg-5">
              <p>
                <?php echo form_dropdown('dev', $project_devs, $task_dev); ?>
              </p>
          </div>
        </div>

        <div class='row'>
          <label for="description"  class="col-lg-5" > Description : </label>
          <textarea  class="form-control" id="description"  name="description" style="width: 390px; height: 111px; resize: none;" ><?php echo $task->description; ?></textarea>
        </div>
        
        <div class='row'>
          <label for="datestart"  class="col-lg-5" > Date start : </label>
          <div class="col-lg-5">
              <p>
                  <input type="date" name="datestart" value="<?php echo $task->datestart; ?>" >
              </p>
          </div>
        </div>

        <div class='row'>
          <label for="dateend"  class="col-lg-5" > Date end : </label>
          <div class="col-lg-5">
              <p>
                  <input type="date" name="dateend" value="<?php echo $task->dateend; ?>">
              </p>
          </div>
        </div>

        <?php
          echo '<div class="row"><div class="col-lg-5">' . form_label('Userstories assiocated :', 'us_associated') . '</div><div class="col-lg-2">' . form_multiselect('us[]', $us_list, $us_associated) . '</div></div>';
          echo br();
          echo '<div class="row"><div class="col-lg-5">' . form_label('Dependencies :', 'dep') . '</div><div class="col-lg-2">' . form_multiselect('dep[]', $task_list, $task_dependencies) . '</div></div>';
        ?>

        <?php echo br(6); ?>

        <div class="text-center">

          <?php
          echo "<p>";
          echo form_submit("edit", "Apply", "class='btn btn-primary'");
          echo "</p>";
          echo form_close();
          ?>
        </div>
    </div>
  </body>
</html>
