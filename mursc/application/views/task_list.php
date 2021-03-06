<html lang="fr">
    <meta charset="utf-8">
    <div id="container">
        <?php form_fieldset('Tasks'); ?>

        <fieldset class="col-lg-offset-1">

            <div class='col-md-3'>
                <?php
                    if($this->session->userdata('my_relation') == 'member' && $this->session->userdata('my_status') == 'project manager') // acl product manager only
                    {
                        echo br(3) . "<a class='btn btn-primary' href=" . base_url() . "task_controller/new_task><i class='fa fa-plus'></i> Create a new task </a> &nbsp;";
                    }
                ?>
                &nbsp;
            </div>

            <?php echo br(3); ?>

            <div class="col-lg-3">
                <?php echo form_label('Filter by :', 'filter_task'); ?>      
                <select  class="form-control" id="statut_filter" name="statut_filter">
                    <option value="No filter" > No Filter </option>
                    <option value="Not ready" > Not ready </option>
                    <option value="Ready" > Ready </option>
                    <option value="In progress" > In progress </option>
                    <option value="Done" > Done </option>
                </select>
            </div>
            
            <div class="col-lg-2 col-lg-offset-2">
                <?php 
                echo form_label('Search :', 'search_task_label');  
                 $input_search = array(
                                'name'        => 'search_task_input',
                                'id'          => 'search_task_input',
                                'class'       => 'form-control',
                                'value'       => '',
                                );
                      echo form_input($input_search); ?>     
            </div>

            <div class="col-lg-11">
                <?php
                echo br(2);
                if (ISSET($delete_error)) {
                    echo "<div class = 'error'>" . $delete_error . "</div>";
                }
                if (ISSET($delete_succes)) {
                    echo "<div class = 'error'>" . $delete_succes . "</div>";
                }

                $this->table->set_template(array('table_open' => '<table border="1" id="table_task" class="table table-responsive table-bordered">'));
                $this->table->set_heading('Name', 'Status', 'Developer');
                foreach ($task_list as $t) {
                    $this->table->add_row('<a href="' . base_url() . 'task_controller/displayTask/' . $t->id . '"><i class="fa icon-eye-open"></i>&nbsp;' . $t->taskname . '</a>', character_limiter($t->statut, 5), character_limiter($t->dev_name, 5));

                }

                echo $this->table->generate();
                ?>
            </div>
        </fieldset>
    </div>
</html>

<script type="text/javascript" src= '<?php echo base_url('application/js/search_and_filter_TASK.js')?>'></script>
