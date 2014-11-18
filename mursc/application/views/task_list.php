<html lang="fr">
    <meta charset="utf-8">
    <div id="container">
        <?php echo br(3); form_fieldset('Tasks'); ?>
        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <div class='col-md-2'><a class='btn btn-primary' href=<?php echo base_url() . 'task_controller/new_task' ?>><i class='fa fa-plus'></i> Create a new task </a> &nbsp;</div>

                <?php
                    if(ISSET($delete_error)){ echo "<div class = 'error'>" . $delete_error . "</div>"; }
                    if(ISSET($delete_succes)){ echo "<div class = 'error'>" . $delete_succes . "</div>"; }

                    $this->table->set_template(array('table_open' => '<table border="1" class="table table-responsive table-bordered">'));
                    $this->table->set_heading('Name', 'Status', 'Developer', 'Action');
                    foreach ($task_list as $t) {
                        $this->table->add_row(form_label($t->taskname, 5),
                            character_limiter($t->statut, 5),
                            character_limiter($t->dev_name, 5),
                            '<a class="btn btn-primary" href="' . base_url() . 'task_controller/view/' . $t->id . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                                 <a class="btn btn-primary" href="' . base_url() . 'task_controller/edit_task/' . $t->id . '"><i class="fa fa-cog"></i> Edit </a> &nbsp;
                                 <a onclick="return confirm(\'Are you sure you want to delete the task ' . $t->taskname . ' ?\');" class="btn btn-danger" href="' . base_url() . 'task_controller/delete_task/' . $t->id . '" ><i class="fa fa-close"></i> Delete </a> &nbsp;');
                    }

                    echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>