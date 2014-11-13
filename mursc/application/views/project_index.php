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
            ____________________________________________________________________________
            <br/>   
            <?php echo form_fieldset('Staff'); ?>
            <fieldset class="col-lg-offset-1">
                <div class="col-lg-11">
                    <?php
                    $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                    $this->table->set_template($tmpl);
                    $this->table->set_heading('Name', 'Status');
                    foreach ($list_member as $m) {
                        $this->table->add_row(form_label($m['username']), form_label($m['user_status']));
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

        ____________________________________________________________________________
        <br/>   

        <?php echo form_fieldset('User Stories'); ?>
        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <div class='col-md-2'><a class='btn btn-primary' href=<?php echo base_url() . 'project/' . $project->id . '/new_userstory' ?>><i class='fa fa-plus'></i> Create a new US </a> &nbsp;</div>

                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Name', 'Status', 'Description', 'Cost', 'Start date', 'End date', 'Action');
                foreach ($list_us as $us) {
                    $this->table->add_row(form_label($us->userstoryname), form_label($us->statut), form_label($us->description), form_label($us->cost), form_label($us->datestart), form_label($us->dateend), '<a class="btn btn-primary" href="' . base_url() . 'project/' . $project->id . '/userstory/index_userstory/' . $us->id . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                             <a class="btn btn-primary" href=""><i class="fa fa-cog"></i> Edit </a> &nbsp;
                             <a onclick="return confirm(\'Are you sure you want to delete the user story ' . $us->userstoryname . ' ?\');" class="btn btn-danger" href="' . base_url() . 'project/' . $project->id . '/userstory/delete_userstory/' . $us->id . '" ><i class="fa fa-close"></i> Delete </a> &nbsp;');
                }

                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>