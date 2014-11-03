<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> My Projects List: ( <?php echo count($projects_list_as_contributor) + count($projects_list_as_follower) + count($invitations_list) + count($candidacy_list); ?> )</h1>
        <?php
            if(ISSET($succes)){echo "<div class='succes'>" . $succes . "</div>";}
            if(ISSET($error)){echo "<div class='error'>" . $error . "</div>";}
        ?>

        <h3> Create or join </h3>

        <?php echo form_open(base_url() . 'user_controller/send_candidacy/', array('name'=>'form_candidacy')); ?>
        <div class='row'><div class='col-md-2'><?php echo form_input(array('name'=>'project_name', 'placeholder'=>'project')) ?></div></div>
        <?php echo form_close();?>

        <div class='row'>
            <div class='col-md-2'><a class='btn btn-primary' href='#' onClick=form_candidacy.submit()><i class='fa fa-envelope-o'></i> Send a candidacy </a> &nbsp;</div>
            <div class='col-md-1'>OR</div>
            <div class='col-md-2'><a class='btn btn-primary' href='project/new_project'><i class='fa fa-plus'></i> Create a new project </a> &nbsp;</div>
        </div>

        <h3> As a contributor: ( <?php echo count($projects_list_as_contributor); ?> )</h3>

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
                             <a onclick="return confirm(\'Are you sure you want to quit the project '.$project['projectname'].' ?\');" class="btn btn-danger" href="'.base_url().'user_controller/quit_project/'.$project['id'].'" ><i class="fa fa-close"></i> Quit </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>


        <h3> As a follower: ( <?php echo count($projects_list_as_follower); ?> )</h3>

        <br/>

        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'My status', 'Type', 'Description','Git Url','Actions');
                foreach ($projects_list_as_follower as $project) {
                    $this->table->add_row($project['projectname'], ''.$project['status'], ''.$project['type'].'', $project['description'], $project['giturl'],
                            '<a class="btn btn-primary" href="'.base_url().'project/index_project/'.$project['id'].'"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                            <a onclick="return confirm(\'Are you sure you want to quit the project '.$project['projectname'].' ?\');" class="btn btn-danger" href="'.base_url().'user_controller/quit_project/'.$project['id'].'" ><i class="fa fa-close"></i> Quit </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
        </fieldset>

        <h3> Invitations: ( <?php echo count($invitations_list); ?> )</h3>

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

        <h3> Candidatures: ( <?php echo count($candidacy_list); ?> )</h3>

        <br/>

        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'Type', 'Description','Git Url','Actions');
                foreach ($candidacy_list as $i)
                {
                    $this->table->add_row($i['projectname'], '' . $i['type'] . '', $i['description'], $i['giturl'],
                        '<a class="btn btn-primary" href="'.base_url().'project/index_project/'.$i['id'].'"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                        <a class="btn btn-danger" href="'.base_url().'user_controller/delete_candidacy/'.$i['id'].'" ><i class="fa fa-close"></i> Delete </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>

    </div>

</body>
</html>
