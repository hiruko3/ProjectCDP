<html lang="fr">
    <head>
        <title>Projects as contributor</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <div id="container">

        <?php
        if (ISSET($succes)) {
            echo "<div class='succes'>" . $succes . "</div>";
        }
        if (ISSET($error)) {
            echo "<div class='error'>" . $error . "</div>";
        }
        ?>

        <br/>

        <fieldset class="col-lg-offset-1">
            <h3> As a contributor : ( <?php echo count($projects_list_as_contributor); ?> )</h3>
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  id="table_contributor" class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'My status', 'Type', 'Description', 'Git Url', 'Actions');
                foreach ($projects_list_as_contributor as $project) {
                    // interdire l access au bouton "demissionner" si on est le dernier project manager
                    if ($project['status'] == 'project manager' && $project['nb_manager'] < 2)
                        $quit_button = '<span onclick="return alert(\' Impossible : you are the last project manager\nif you want to quit, please destroy the project or nominate an other project manager.\');" class="btn btn-default"><i class="fa fa-close"></i> Quit </span> &nbsp';
                    else
                        $quit_button = '<a onclick="return confirm(\'Are you sure you want to quit the project ' . $project['projectname'] . ' ?\');" class="btn btn-danger" href="' . base_url() . 'user_controller/quit_project/' . $project['id'] . '" ><i class="fa fa-close"></i> Quit </a> &nbsp';
                    ////
                    $this->table->add_row($project['projectname'], '' . $project['status'], '' . $project['type'] . '', character_limiter($project['description'], 20), substr($project['giturl'], 0, 15), '<a class="btn btn-primary" href="' . base_url() . 'project/index_project/' . $project['id'] . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                             <a class="btn btn-primary" href="' . base_url() . 'project/edit_project/' . $project['id'] . '"><i class="fa fa-cog"></i> Edit </a> &nbsp;'
                            . $quit_button);
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>