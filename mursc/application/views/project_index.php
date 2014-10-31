<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> <?php echo $project->projectname; ?></h1>

        <?php
        echo br(1);
        echo anchor('user/projectList', ' Return to the projects list', 'class="btn btn-default fa fa-arrow-left "');
        echo br(2);
        ?>

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