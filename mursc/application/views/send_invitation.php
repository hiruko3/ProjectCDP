<html lang="fr">
    <meta charset="utf-8">
    <div id="container" class="col-lg-offset-1">

        <h2> Invite a new member </h2>
        <br/>

        <div class='container col-lg-offset-1'>
            <div class='row'>

                <?php
                    if(ISSET($success)){echo $success;}
                    if(ISSET($error)){echo $error;}

                    echo form_open(base_url() . 'project_controller/send_invitation/' . $project_id, 'form_invitation');
                    echo '<div class="col-md-2">' . form_input(array('name'=>'username', 'placeholder'=>'username', 'class' =>'form-control')) . '</div>';
                    echo '<div class="col-md-3">' . form_dropdown('status_id', $status_array,'','class ="form-control"') . '</div>';
                    echo '<div class="col-md-1">' . form_submit("invite", "Invite", "class='btn btn-primary col-md-offset-6'") . '</div>';
                    echo form_close();
                ?>
            </div> <!-- row -->
        </div> <!-- container -->
    </body>
</html>
