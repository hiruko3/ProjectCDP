<html lang="fr">
    <meta charset="utf-8">

    <?php echo br(1); ?>  

    <div class='row col-lg-offset-1'>

        <h2> <?php echo 'US : ' . $userstory->userstoryname; ?> </h2>

        <?php echo br(1); ?>

        <div class='row'>
            <div class='col-md-1'>
                <?php echo anchor('project/' . $project_id . '/userstory/edit_userstory/' . $userstory->id, ' Edit this user story', 'class="btn btn-default fa fa-cog "'); ?>
            </div>
        </div>   


        <?php echo br(1); ?>

        <fieldset class="col-lg-5 scheduler-border">
            <legend class="scheduler-border">General Settings</legend>
            <?php
            echo form_label('Description of US :', 'description_userstory');
            echo "   " . $userstory->description;

            echo br(2);

            echo form_label('Statut :', 'statut');
            echo "   " . $userstory->statut;

            echo br(2);

            echo form_label('Cost :', 'cost');
            echo "   " . $userstory->cost;

            echo br(2);

            echo form_label('Date start :', 'datestart');
            echo "   " . $userstory->datestart;

            echo br(2);

            echo form_label('Date end :', 'dateend');
            echo "   " . $userstory->dateend;
            ?>
        </fieldset>

        <fieldset class="col-lg-10">
            <h3> Tasks </h3>
            <?php
            $this->table->set_template(array('table_open' => '<table border="1" id="table_task" class="table table-responsive table-bordered">'));
            $this->table->set_heading('Name', 'Status', 'Developer');
            foreach ($tasks_list_associated as $t) {
                $this->table->add_row(form_label('<a href=' . base_url() . 'task_controller/view/' . $t->id . '>' . $t->taskname . '</a>'), character_limiter($t->statut, 10), character_limiter($t->dev_name, 10));
            }
            echo $this->table->generate();
            ?>
        </fieldset>
    </div>
    <?php echo form_fieldset_close(); ?>
</div>
</div>
</html>