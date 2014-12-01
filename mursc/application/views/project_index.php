<html lang="fr">
    <meta charset="utf-8">
    
     <?php echo br(1); ?>

        <div class='row col-lg-offset-1'>
            <div class='col-md-1'>
                <?php if($this->session->userdata('my_relation') == 'member' && $this->session->userdata('my_status') == 'project manager')
                {
                    echo anchor('project_controller/edit_project/', ' Edit', 'class="btn btn-default fa fa-cog "');
                }
                ?>
            </div>
        </div>
        <?php echo br(2); ?>      

        <div class='row col-lg-offset-1'>
            <?php echo form_open(base_url() . "project/view_project/" . $project->id, "class='col-lg-6 form-horizontal'"); ?>

            <fieldset class="col-lg-offset-1 scheduler-border">
                <legend class="scheduler-border">General Settings</legend>
                    <?php
                    echo br(1);

                    echo form_label('Description of project :', 'description_project');
                    echo "   " . $project->description;

                    echo br(2);

                    echo form_label('Type :', 'type');
                    echo "   " . $project->type;

                    echo br(2);

                    echo form_label('Git url :', 'giturl');
                    echo "   " . $project->giturl;
                    
                    echo form_fieldset_close(); ?>
            </fieldset>


            <?php echo br(3); ?>

            <fieldset class="col-lg-offset-1 scheduler-border">
                <legend class="scheduler-border">Staff</legend>
                <div class="col-lg-11">
                    <?php
                    $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                    $this->table->set_template($tmpl);
                    $this->table->set_heading('Name', 'Status');
                    foreach ($list_member as $m) {
                        $this->table->add_row($m['username'], $m['user_status']);
                    }

                    echo $this->table->generate();
                    ?>
                </div>
            </fieldset>
            <?php
            echo form_fieldset_close();
            echo form_close();
            ?>
        </div>
    </div>
</html>