<html lang="fr">
    <meta charset="utf-8">
    <div id="container">
        <?php echo br(3); form_fieldset('User Stories'); ?>
        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <div class='col-md-2'><a class='btn btn-primary' href=<?php echo base_url() . 'project/' . $project->id . '/new_userstory' ?>><i class='fa fa-plus'></i> Create a new US </a> &nbsp;</div>

                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Name', 'Status', 'Description', 'Cost', 'Start date', 'End date', 'Action');
                foreach ($list_us as $us) {
                    $this->table->add_row(form_label($us->userstoryname), form_label($us->statut), form_label($us->description), form_label($us->cost), form_label($us->datestart), form_label($us->dateend), '<a class="btn btn-primary" href="' . base_url() . 'project/' . $project->id . '/userstory/index_userstory/' . $us->id . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                             <a class="btn btn-primary" href="' . base_url() . 'project/' . $project->id . '/userstory/edit_userstory/' . $us->id . '"><i class="fa fa-cog"></i> Edit </a> &nbsp;
                             <a onclick="return confirm(\'Are you sure you want to delete the user story ' . $us->userstoryname . ' ?\');" class="btn btn-danger" href="' . base_url() . 'project/' . $project->id . '/userstory/delete_userstory/' . $us->id . '" ><i class="fa fa-close"></i> Delete </a> &nbsp;');
                }

                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>