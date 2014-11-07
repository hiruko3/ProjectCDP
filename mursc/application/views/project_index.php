<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> <?php echo 'View ' . $project->projectname; ?> </h1>
        <br/>

        <div class='row'>
            <div class='col-md-3'>
                <?php echo anchor('user/projectList', ' Return to the projects list', 'class="btn btn-default fa fa-arrow-left "'); ?>
            </div>
            <div class='col-md-1'></div>
            <div class='col-md-1'>
                <?php echo anchor('project_controller/edit_project/' . $project->id, ' ', 'class="btn btn-default fa fa-cog "'); ?>
            </div>
        </div>
        <br /><br /><br/>

        <div class='row'>
            <?php echo form_open(base_url() . "project/view_project/" . $project->id, "class='col-lg-6 form-horizontal'"); ?>

            <?php echo form_fieldset('General settings'); ?>
            <fieldset class="col-lg-offset-1">
                <div class="col-lg-11">
                    <?php
                    echo br(2);

                    echo form_label('Description of project :', 'description_project');
                    echo "   " . $project->description;

                    echo br(2);

                    echo form_label('Type :', 'type');
                    echo "   " . $project->type;

                    echo br(2);

                    echo form_label('Git url :', 'giturl');
                    echo "   " . $project->giturl;
                    ?>
                </div>
            </fieldset>
            <?php echo form_fieldset_close(); ?>

            <?php echo form_fieldset('Staff'); ?>
            <fieldset class="col-lg-offset-1">
                <div class="col-lg-11">
                    <?php
                        $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                        $this->table->set_template($tmpl);
                        $this->table->set_heading('Name', 'Status');
                        foreach ($list_member as $m)
                        {
                            $this->table->add_row(form_label($m['username']),
                            form_label($m['user_status']));
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