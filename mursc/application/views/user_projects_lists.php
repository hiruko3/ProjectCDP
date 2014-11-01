<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> My Projects Lists </h1>

        <br/>

        <?php
        echo anchor('project/new_project', ' Create a new project', 'class="btn btn-primary fa fa-plus"');
        ?>

        <h3> As a contributor: ( <?php echo $number_projects_as_contributor ?> )</h3>

        <br/>

        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'My status', 'Type', 'Description','Git Url','Actions');
                foreach ($projects_list_as_contributor as $project) {
                    $this->table->add_row($project['projectname'], ''.$project['status'], ''.$project['type'].'', $project['description'], $project['giturl'],
                            '<a class="btn btn-primary" href="'.base_url().'project/index_project/'.$project['id'].'"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                             <a class="btn btn-primary" href="'.base_url().'project/edit_project/'.$project['id'].'"><i class="fa fa-cog"></i> Edit </a> &nbsp;
                             <a onclick="return confirm(\'Are you sure you want to delete the project '.$project['projectname'].' ?\');" class="btn btn-danger" href="'.base_url().'project/delete_project/'.$project['id'].'" ><i class="icon-trash icon-large"></i> Supprimer </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>


        <h3> As a follower: ( <?php echo $number_projects_as_follower ?> )</h3>

        <br/>

        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'My status', 'Type', 'Description','Git Url','Actions');
                foreach ($projects_list_as_follower as $project) {
                    $this->table->add_row($project['projectname'], ''.$project['status'], ''.$project['type'].'', $project['description'], $project['giturl'],
                            '<a class="btn btn-primary" href="#"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                            <a class="btn btn-danger" href="#"><i class="icon-trash icon-large"></i> Supprimer </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
        </fieldset>

        <h3> Invitations: ( <?php echo $number_invitations ?> )</h3>

        <br/>

        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'Proposed status', 'Type', 'Description','Git Url','Actions');
                foreach ($invitations_list as $i)
                {
                    $this->table->add_row($i['projectname'], '' . $i['proposed_status'], '' . $i['type'] . '', $i['description'], $i['giturl'],
                        '<a class="btn btn-primary" href="'.base_url().'project/index_project/'.$i['id'].'"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                        <a class="btn btn-success" href="'.base_url().'user_controller/validate_invitation/'.$i['id'].'"><i class="fa fa-check"></i> Accept </a> &nbsp;
                        <a class="btn btn-danger" href="'.base_url().'user_controller/reject_invitation/'.$i['id'].'" ><i class="fa fa-close"></i> Reject </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>

    </div>

</body>
</html>
