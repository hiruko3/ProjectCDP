<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> <?php echo 'View ' . $userstory->userstoryname; ?> </h1>
        <br/>

        <div class='row'>
            <div class='col-md-3'>
                <?php echo anchor(base_url() . 'userstory_controller/index/' . $project_id, ' Return to backlog', 'class="btn btn-default fa fa-arrow-left "'); ?>
            </div>
            <div class='col-md-1'></div>
        </div>

        <?php echo br(3); ?>

        <div class='row'>

            <?php echo form_fieldset(''); ?>
            <fieldset class="col-lg-offset-1">
                <div class="col-lg-11">
                    <?php
                    echo br(2);

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

                    echo br(2);

                    echo '<h3> Tasks : </h3>';
                    
                    echo br(1);

                    $this->table->set_template(array('table_open' => '<table border="1" id="table_task" class="table table-responsive table-bordered">'));
                    $this->table->set_heading('Name', 'Status', 'Developer', 'Action');
                    foreach ($tasks_list_associated as $t) {
                        $this->table->add_row(form_label($t->taskname, 5), character_limiter($t->statut, 5), character_limiter($t->dev_name, 5), '<a class="btn btn-primary" href="' . base_url() . 'task_controller/view/' . $t->id . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;');
                    }

                    echo $this->table->generate();
                    ?>
                </div>
            </fieldset>
            <?php echo form_fieldset_close(); ?>
        </div>
    </div>
</html>