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
            <h3> Candidatures : ( <?php echo count($candidacy_list); ?> )</h3>
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
                $this->table->set_heading('Projectname', 'Type', 'Description', 'Git Url', 'Actions');
                foreach ($candidacy_list as $i) {
                    $this->table->add_row($i['projectname'], '' . $i['type'] . '', character_limiter($i['description'], 20), substr($i['giturl'], 0, 15), '<a class="btn btn-primary" href="' . base_url() . 'project/index_project/' . $i['id'] . '"><i class="fa icon-eye-open"></i> View </a> &nbsp;
                        <a class="btn btn-danger" href="' . base_url() . 'user_controller/delete_candidacy/' . $i['id'] . '" ><i class="fa fa-close"></i> Delete </a> &nbsp;');
                }
                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
