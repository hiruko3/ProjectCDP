<html lang="fr">
    <meta charset="utf-8">

    <div id="container" class="col-lg-offset-1 col-lg-11">

        <h2>Edit project</h2>

        <?php echo br(1); ?>

        <?php echo anchor('project_controller/index_project/' . $project->id, ' Return to the project', 'class="btn btn-default fa fa-eye "'); ?>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo '<a class="btn btn-primary" href="' . base_url() . 'project_controller/send_invitation/' . $project->id . '" ><i class="fa fa-envelope"></i> Invite new members </a> &nbsp;'; ?>
        &nbsp;&nbsp;&nbsp;
        <?php echo '<a onclick="return confirm(\'Are you sure you want to delete the project ' . $project->projectname . ' ?\');" class="btn btn-danger" href="' . base_url() . 'project/delete_project/' . $project->id . '" ><i class="icon-trash icon-large"></i> Delete this project </a> &nbsp;'; ?>

        <?php echo br(2); ?>

        <fieldset class="col-lg-5 scheduler-border">
            <legend class="scheduler-border">General settings</legend>

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


                <?php
                //echo validation_errors();
                echo form_open(base_url() . "project/edit_project/" . $project->id, "class='col-lg-11 form-horizontal'");
                ?>
                <label  for="projectname">Project name * :</label>
                <div>
                    <p>
                        <input class="form-control" type="text" name="projectname" id="projectname" value="<?php echo $project->projectname; ?>"</input>
                    </p>
                </div>

                <label for="type"  > Type * : </label>
                <div>
                    <p>
                        <select  class="form-control" id="type" name="type">
                            <option value="public" <?php
                            if ($project->type == 'public') {
                                echo 'SELECTED';
                            }
                            ?>> Public </option>
                            <option value="private"  <?php
                            if ($project->type == 'private') {
                                echo 'SELECTED';
                            }
                            ?>> Private </option>
                        </select>
                    </p>
                </div>

                <label   for="giturl">Git url : </label>
                <div >
                    <p>
                        <input class="form-control" type="text" name="giturl" id="giturl" value="<?php echo $project->giturl; ?>"</input>
                    </p>
                </div>

                <label for="description" > Description * : </label>
                <textarea  class="form-control" id="description"  name="description" style="width: 390px; height: 111px; resize: none;" ><?php echo $project->description; ?></textarea>
                <?php echo form_fieldset_close(); ?>
        </fieldset>
        <div class="col-lg-5 col-lg-offset-1">
        <fieldset class="scheduler-border" >
            <legend class="scheduler-border">Staff</legend>

                <div>
                    <?php
                    $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                    $this->table->set_template($tmpl);
                    $this->table->set_heading('Name', 'Status', 'Action');
                    $this->table->add_row(array('data' => 'Contributors', 'colspan' => 3, 'style' => 'font-size : 16; font-weight : bold; text-align : center;'));
                    foreach ($list_member as $m) {
                        // on ne peut pas toucher au project manager
                        if ($m['status_id'] == 0) {
                            $content_status = 'project manager';
                            $content_actions = NULL;
                        } else {
                            $content_status = form_dropdown('status_member_' . $m['user_id'], $status_array, $m['status_id']);
                            $content_actions = '<label>' . form_checkbox('dismiss_member_' . $m['user_id'], 1, FALSE) . ' dismiss</label>';
                        }

                        $this->table->add_row($m['username'], $content_status, $content_actions);
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
            <?php echo form_fieldset_close(); ?>

        </fieldset>
</div>
        <div class="text-center col-lg-11">
            </br>
            <p>
                <?php
                echo form_submit("create", "Validate", "class='btn btn-primary'");
                echo '&nbsp;&nbsp;' . form_reset("reset", "Reset", "class='btn btn-primary'");
                echo form_close();
                ?>
            </p>
        </div>
    </div>
</body>

</html>
