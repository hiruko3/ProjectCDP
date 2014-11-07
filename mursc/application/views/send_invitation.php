<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> Invite new members </h1>
        <br/>

        <div class='container'>
            <div class='row'>

                <?php
                    echo anchor('project_controller/edit_project/' . $project_id, ' Return to the projects parameters', 'class="btn btn-default fa fa-arrow-left "');
                    echo br(2);

                    if(ISSET($success)){echo $success;}
                    if(ISSET($error)){echo $error;}

                    echo form_open(base_url() . 'project_controller/send_invitation/' . $project_id, 'form_invitation');
                    echo '<div class="col-md-2">' . form_input(array('name'=>'username', 'placeholder'=>'username')) . '</div>';
                    echo '<div class="col-md-1">' . form_dropdown('status_id', $status_array, '') . '</div>';
                    echo '<div class="col-md-2">' . form_submit("invite", "Invite", "class='btn btn-primary col-md-offset-6'") . '</div>';
                    echo form_close();
                ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </body>
</html>
