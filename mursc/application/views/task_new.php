<html lang="fr">
    <meta charset="utf-8">
    <div id="container" class="col-lg-offset-1">

        <fieldset class="col-lg-5 scheduler-border">
            <legend class="scheduler-border">New Task</legend>

            <?php
            if (ISSET($succes)) {
                echo $succes;
            }
            if (ISSET($error)) {
                echo $error;
            }
            ?>

            <?php
            echo form_open('task_controller/new_task', "class='form-horizontal'");

            echo '<div class="row"><div class="col-lg-4">' . form_label('Name :', 'name') . '</div><div class="col-lg-6">' . form_input(array('name' =>'username','class' => 'form-control')) . '</div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Status :', 'status') . '</div><div class="col-lg-6">' . form_dropdown('status', $status,'', 'class="form-control"') . '</div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Cost :', 'cost') . '</div><div class="col-lg-6">' . form_dropdown('cost', $fibonacci, '', 'class="form-control"') . '</div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Developer :', 'dev') . '</div><div class="col-lg-6">' . form_dropdown('dev', $dev_list, '', 'class="form-control"') . '</div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Dependencies :', 'dep') . '</div><div class="col-lg-6">' . form_multiselect('dep[]', $task_list, '','class="form-control"') . '</div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('US :', 'us') . '</div><div class="col-lg-6">' . form_multiselect('us[]', $us_list, '','class="form-control"') . '</div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Date start :', 'date_start') . '</div><div class="col-lg-6"><input class="form-control" type="date" name="date_start" placeholder="aaaa/mm/dd" /></div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Date end :', 'date_end') . '</div><div class="col-lg-6"><input class="form-control" type="date" name="date_end" placeholder="aaaa/mm/dd" /></div></div>';
            echo br(1);
            echo '<div class="row"><div class="col-lg-4">' . form_label('Description :', 'desc') . '</div><div class="col-lg-6">' . form_textarea('desc','','class="form-control"') . '</div></div>';

            echo br(1);
            echo '<div class="row"><div class="text-center">' . form_submit("create", "Create", "class='btn btn-primary'") . '</div></div>';
            echo form_close();
            ?>

        </fieldset>

    </div>

</body>

</html>
