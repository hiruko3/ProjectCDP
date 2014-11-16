<html lang="fr">
    <meta charset="utf-8">
    <div id="container">

        <h1> New task </h1>

        <br/>

        <?php
        echo anchor(base_url() . 'task_controller/index/' . $project_id, 'Return to tasks list', 'class="btn btn-default fa fa-arrow-left "');
        echo br(2);
        ?>

        <?php
        if(ISSET($succes)){ echo $succes; }
        if(ISSET($error)){ echo $error; }
        ?>
        <br/>


        <?php
        echo form_open('task_controller/new_task', "class='col-lg-6 form-horizontal'");

        echo '<div class="row"><div class="col-lg-2">' . form_label('Name', 'name') . '</div><div class="col-lg-2">' . form_input('name') . '</div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Status', 'status') . '</div><div class="col-lg-2">' . form_dropdown('status', $status, '') . '</div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Cost', 'cost') . '</div><div class="col-lg-2"><input type="number" name="cost" min=0 max=50 value=1 /></div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Developer', 'dev') . '</div><div class="col-lg-2">' . form_dropdown('dev', $dev_list, '') . '</div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Dependencies', 'dep') . '</div><div class="col-lg-2">' . form_multiselect('dep[]', $task_list, '') . '</div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('US', 'us') . '</div><div class="col-lg-2">' . form_multiselect('us[]', $us_list, '') . '</div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Date start', 'date_start') . '</div><div class="col-lg-2"><input type="date" name="date_start" placeholder="aaaa/mm/dd" /></div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Date end', 'date_end') . '</div><div class="col-lg-2"><input type="date" name="date_end" placeholder="aaaa/mm/dd" /></div></div>';
        echo '<div class="row"><div class="col-lg-2">' . form_label('Description', 'desc') . '</div><div class="col-lg-2">' . form_textarea('desc') . '</div></div>';

        echo br(1);
        echo '<div class="row"><div class="col-lg-3">' . form_submit("create", "Create", "class='btn btn-primary col-md-offset-7'") . '</div></div>';
        echo form_close();
        ?>

    </div>

</body>

</html>
