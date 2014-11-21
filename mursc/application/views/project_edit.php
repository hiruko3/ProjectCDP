<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> Edit <?php echo $project->projectname; ?> </h1>
        <br/>

        <div class='row'>
            <div class='col-md-4'>
                <?php echo anchor('user/projectList', ' Return to the projects list', 'class="btn btn-default fa fa-arrow-left "'); ?>
            </div>
            <div class='col-md-2'>
                
               <div class='row'><div class='col-md-1'></div><div class='col-md-2'><?php echo '<a class="btn btn-primary" href="' . base_url() . 'project_controller/send_invitation/' . $project->id . '" ><i class="fa fa-envelope"></i> Invite new members </a> &nbsp;'; ?></div></div>   
            </div>
            <div class='col-md-2'>
                <?php echo anchor('project_controller/index_project/' . $project->id, ' ', 'class="btn btn-default fa fa-eye "'); ?>
            </div>
        </div>
        <br /><br />

        <div class='row'>
            <?php
            foreach ($validMsg as $msg) {
                echo "<i class='fa fa-check-square text-success'" . $msg . "</i>";
                echo "</br>";
            }
            ?>

            <?php
            foreach ($errorMsg1 as $msg) {
                echo "<i class='fa fa-times-circle text-danger'" . $msg . "</i>";
                echo "</br>";
            }
            ?>

            <?php
            foreach ($errorMsg2 as $msg) {
                echo "<i class='fa fa-times-circle text-danger'" . $msg . "</i>";
            }
            ?>
            <br/>


            <?php
            //echo validation_errors();
            echo form_open(base_url() . "project/edit_project/" . $project->id, "class='col-lg-6 form-horizontal'");

            echo form_fieldset('General settings');
            ?>
            <label  class="col-lg-5" for="projectname">Project name * :</label>
            <div class="col-lg-5">
                <p>
                    <input class="form-control" type="text" name="projectname" id="projectname" value="<?php echo $project->projectname; ?>"</input>
                </p>
            </div>

            <label for="type" class="col-lg-5" > Type * : </label>
            <div class="col-lg-5">
                <p>
                    <select  class="form-control" id="type" name="type">
                        <option value="public" <?php if($project->type == 'public'){ echo 'SELECTED';}?>> Public </option>
                        <option value="private"  <?php if($project->type == 'private'){ echo 'SELECTED';}?>> Private </option>
                    </select>
                </p>
            </div>

            <label  class="col-lg-5" for="giturl">Git url : </label>
            <div class="col-lg-5">
                <p>
                    <input class="form-control" type="text" name="giturl" id="giturl" value="<?php echo $project->giturl; ?>"</input>
                </p>
            </div>

            <label for="description"  class="col-lg-5" > Description * : </label>
            <textarea  class="form-control" id="description"  name="description" style="width: 390px; height: 111px; resize: none;" ><?php echo $project->description; ?></textarea>
<?php echo form_fieldset_close(); ?>
            ____________________________________________________________________________
            <br/>
<?php echo form_fieldset('Staff'); ?>
            <fieldset class="col-lg-offset-1">
                <div class="col-lg-11">
                    <?php
                    $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                    $this->table->set_template($tmpl);
                    $this->table->set_heading('Name', 'Status', 'Action');
                    $this->table->add_row(array('data' => 'Contributors', 'colspan' => 3, 'style' => 'font-size : 16; font-weight : bold; text-align : center;'));
                    foreach ($list_member as $m) {
                        $this->table->add_row($m['username'], form_dropdown('status_member_' . $m['user_id'], $status_array, $m['status_id']), '<label>' . form_checkbox('dismiss_member_' . $m['user_id'], 1, FALSE) . ' dismiss</label>');
                    }
                    $this->table->add_row(array('data' => 'Candidates', 'colspan' => 3, 'style' => 'font-weight : bold; text-align : center;'));
                    foreach ($list_candidate as $c) {
                        $this->table->add_row($c['username'], form_dropdown('status_candidate_' . $c['user_id'], $status_array, ''), '<label>' . form_radio("candidature_" . $c['user_id'], 'accept', FALSE) . ' accept </label>' . ' ' . '<label>' . form_radio("candidature_" . $c['user_id'], 'reject', FALSE) . ' reject </label>' . ' ' . '<label>' . form_radio("candidature_" . $c['user_id'], 'none', TRUE) . ' none </label>');
                    }
                    $this->table->add_row(array('data' => 'Invitated', 'colspan' => 3, 'style' => 'font-weight : bold; text-align : center;'));
                    foreach ($list_invited as $i) {
                        $this->table->add_row($i['username'], form_dropdown('status_invited_' . $i['user_id'], $status_array, $i['status_id']), '<label>' . form_checkbox('close_invitation_' . $i['user_id'], 1, FALSE) . ' cancel</label>');
                    }

                    echo $this->table->generate();
                    ?>
                </div>
            </fieldset>
                    <?php echo form_fieldset_close(); ?>

            <br/>
            <br/>

            <p>
<?php
echo form_submit("create", "Validate", "class='btn btn-primary col-md-offset-6'");
echo form_reset("reset", "Reset", "class='btn btn-primary col-md-offset-1'");
echo form_close();
?>
            </p>



        </div>
        <div class='row'><div class='col-md-3'></div><div class='col-md-2'><?php echo '<a onclick="return confirm(\'Are you sure you want to delete the project ' . $project->projectname . ' ?\');" class="btn btn-danger" href="' . base_url() . 'project/delete_project/' . $project->id . '" ><i class="icon-trash icon-large"></i> Delete this project </a> &nbsp;'; ?></div></div>
    </div>
</body>

</html>
