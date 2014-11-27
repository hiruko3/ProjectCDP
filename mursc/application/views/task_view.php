<html lang="fr">
 <head>
   <title>tasks</title>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
    <div id="container">

        <h1> Tasks : </h1>

        <h3> Manage your task </h3>

        <?php
        if(ISSET($succes)){ echo $succes; }
        if(ISSET($error)){ echo $error; }
        ?>

        <div class='row'>
            <div class='col-md-1'><a class='btn btn-primary' href=<?php echo base_url() . 'task_controller/new_task' ?>><i class='fa fa-plus'></i> Create a new Task </a> &nbsp;</div>
        </div>

        <br/>

        <fieldset class="col-lg-offset-1">
            <div class="col-lg-11">
                <?php
                $tmpl = array('table_open' => '<table border="1"  class="table table-responsive table-bordered">');
                $this->table->set_template($tmpl);
               // foreach ($tasks_list as $task) {

                $this->table->set_heading('Task', 'Cost', 'Date', 'Description', 'Assignement', 'Tests', 'Status', 'Edit');

                    $this->table->add_row($task->taskname,$task->cost,$task->datestart.$task->dateend, $task->description, "Dev3", "Not defined", $task->statut,
                    /*$this->table->add_row($task['task'], ''.$task['Number'], ''.$task['Description'].'', $task['Assignement'], $task['Tests'], $task['Status'],*/
                            '<a class="btn btn-primary" href="'.base_url().'task_controller/taskSettings/'.$task->id.'"><i class="fa fa-cog"></i> Edit </a> &nbsp;');
               // }
                echo $this->table->generate();

                ?>
                <a class="btn btn-primary" href="<?php echo base_url().'task_controller/' ?>"><i class="fa fa-cog"></i> Back </a>

            </div>
        </fieldset>

    </div>

</body>
</html>
