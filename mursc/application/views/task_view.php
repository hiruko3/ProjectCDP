<html lang="fr">
    <meta charset="utf-8">

    <div class='row col-lg-offset-1'>

        <h2> <?php echo 'Tâche : ' . $task->taskname; ?> </h2>

        <?php echo br(1); ?>

        <div class='row'>
            <div class='col-md-1'>
                <?php echo anchor(base_url() . 'task_controller/taskSettings/' . $task->id, ' Edit', 'class="btn btn-default fa fa-cog "'); ?>
            </div>
        </div>   


        <?php echo br(1); ?>

        <fieldset class="col-lg-5 scheduler-border">
            <legend class="scheduler-border">General Settings</legend>
            <?php
            echo form_label('Description of task :', 'description_task');
            echo "   " . $task->description;

            echo br(2);

            echo form_label('Statut :', 'statut');
            echo "   " . $task->statut;

            echo br(2);

            echo form_label('Cost :', 'cost');
            echo "   " . $task->cost;

            echo br(2);

            echo form_label('Developer :', 'dev');
            $u = new User();
            $u->get_by_id($task->dev_id);
            echo "   " . $u->username;

            echo br(2);

            echo form_label('Date start :', 'datestart');
            echo "   " . $task->datestart;

            echo br(2);

            echo form_label('Date end :', 'dateend');
            echo "   " . $task->dateend;
            ?>
        </fieldset>

        <fieldset class="col-lg-10">
            <h3> Userstories </h3>
            <?php
            $this->table->set_template(array('table_open' => '<table border="1" id="table_task" class="table table-responsive table-bordered">'));
            $this->table->set_heading('Name', 'Status');
            foreach ($us_list as $us)
            {
                $this->table->add_row(form_label('<a href=' . base_url() . 'userstory_controller/index_userstory/' . $us->id . '>' . $us->userstoryname . '</a>'), character_limiter($us->statut, 10));
            }
            echo $this->table->generate();
            ?>
        </fieldset>

        <fieldset class="col-lg-10">
            <h3> Dependencies </h3>
            <?php
            $this->table->set_template(array('table_open' => '<table border="1" id="table_task" class="table table-responsive table-bordered">'));
            $this->table->set_heading('Name', 'Status', 'Developer');
            $user = new User();
            foreach ($task_list as $t)
            {
                $this->table->add_row(form_label('<a href=' . base_url() . 'task_controller/displayTask/' . $t->id . '>' . $t->taskname . '</a>'), character_limiter($t->statut, 10), character_limiter($user->get_by_id($t->dev_id)->username, 10));
            }
            echo $this->table->generate();
            ?>
        </fieldset>

        </div>
            <?php echo form_fieldset_close(); ?>
        </div>
    </div>
</html>
