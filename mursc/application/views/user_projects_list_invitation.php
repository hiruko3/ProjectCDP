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
            <h3> Invitations : ( <?php echo count($invitations_list); ?> )</h3>
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'Proposed status', 'Type', 'Description', 'Git Url', 'Actions');
                foreach ($invitations_list as $i) {
                    $this->table->add_row($i['projectname'], '' . $i['proposed_status'], '' . $i['type'] . '', character_limiter($i['description'], 20), substr($i['giturl'], 0, 15), '<a class="btn btn-primary" href="' . base_url() . 'project/index_project/' . $i['id'] . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                        <a class="btn btn-success" href="' . base_url() . 'user_controller/validate_invitation/' . $i['id'] . '"><i class="fa fa-check"></i> Accept </a> &nbsp;
                        <a class="btn btn-danger" href="' . base_url() . 'user_controller/reject_invitation/' . $i['id'] . '" ><i class="fa fa-close"></i> Reject </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>