<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"  >
        <link rel="stylesheet" type="text/css" href='<?php echo base_url('application/css/sprint.css') ?>'>
        <title>Sprint</title>
    </head>

    <body>

        <div class="text-center">
            <h2> Garrent </h2>
        </div>

        <br/>
        <div class='text-center'>
            <?php echo anchor('sprint_controller/get_another_gantt/'. $before, ' ', 'class="btn btn-default fa fa-arrow-left"'); ?>
            <label class="col-lg-offset-1"> <?php echo "   " . $week; ?> </label>
            <?php echo anchor('sprint_controller/get_another_gantt/'. $after, ' ', 'class="btn btn-default fa fa-arrow-right col-lg-offset-1"'); ?>
        </div>
        <br/>

        <form method="post" action="">
            <input type="text" name="titre" id="dev" />
            <input type="button" id="subDev" onclick="ajouterLigne()" value="Ajouter" />
        </form>

        <br/>

        <table class="table" id="gantt_table">
            <thead id="thead2">
                <tr>
                    <th>Developer</th>
                    <th>Lundi</th>
                    <th>Mardi</th>
                    <th>Mercredi</th>
                    <th>Jeudi</th>
                    <th>Vendredi</th>
                    <th class="active">Samedi</th>
                    <th class="active">Dimanche</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php
                $id_task = 0;

                if(sizeof($gantt_lines) != 0){
                    
                foreach ($gantt_lines as $line) {
                    echo '<td>' . $line['developper_name'] . '</td>';
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask1'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask1'.$id_task.'\').style.display = \'none\';" draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask1'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 1'.$id_task.')">'
                                . $line['lundi']
                                . '</div>'
                           . '</td>';
                    }
                     if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask2'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask2'.$id_task.'\').style.display = \'none\';"  draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask2'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 2'.$id_task.')">'
                                . $line['mardi']
                                . '</div>'
                           . '</td>';
                    }
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask3'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask3'.$id_task.'\').style.display = \'none\';"  draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask3'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 3'.$id_task.')">'
                                . $line['mercredi']
                                . '</div>'
                           . '</td>';
                    }
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask4'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask4'.$id_task.'\').style.display = \'none\';"  draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask4'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 4'.$id_task.')">'
                                . $line['jeudi']
                                . '</div>'
                           . '</td>';
                    }
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask5'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask5'.$id_task.'\').style.display = \'none\';"  draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask5'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 5'.$id_task.')">'
                                . $line['vendredi']
                                . '</div>'
                           . '</td>';
                    }
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask6'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask6'.$id_task.'\').style.display = \'none\';"  draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask6'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 6'.$id_task.')">'
                                . $line['samedi']
                                . '</div>'
                           . '</td>';
                    }
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask7'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask7'.$id_task.'\').style.display = \'none\';"  draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask7'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 7'.$id_task.')">'
                                . $line['dimanche']
                                . '</div>'
                           . '</td>';
                    }
                    if ($line == '') {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper"></div>'
                           . '</td>';
                    } else {
                        echo '<td class="active" id="tobeDropped" height="50px">'
                                . '<div class="dropper">'
                                . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask8'.$id_task.'\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask8'.$id_task.'\').style.display = \'none\';" draggable="true">'
                                . '<img src="'.base_url().'ressources/delete.svg" id="deleteTask8'.$id_task.'" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 8'.$id_task.')">'
                                . $line['dimanche']
                                . '</div>'
                           . '</td></tr>';
                    }
                }
                }
                ?>

            </tbody>
        </table>

        <form method="post" action="">
            <input type="button" id="subDev" onclick="get_gantt()" value="Save Gant" />
        </form>

        <div class="draggable" id="taskDrag" onmouseover="document.getElementById('deleteTask1').style.display = 'inline';"
             onmouseout="document.getElementById('deleteTask1').style.display = 'none';">
            <img src ='<?php echo base_url('ressources/delete.svg') ?>'
                 id="deleteTask1" width= "10px" height="10px" class="suppIcon" 
                 style = "display : none" draggable="false" alt="delete"
                 onclick="deleteThisTask('deleteTask' + 1)">#tache6</div>

        <div class="draggable" id="taskDrag" onmouseover="document.getElementById('deleteTask2').style.display = 'inline';"
             onmouseout="document.getElementById('deleteTask2').style.display = 'none';"
             onclick= "displayTask()">
            <img src ='<?php echo base_url('ressources/delete.svg') ?>'
                 id="deleteTask2" width= "10px" height="10px" class="suppIcon" 
                 style = "display : none" draggable="false" alt="delete"
                 onclick="deleteThisTask('deleteTask' + 2)">#tache7</div>

<?php
echo br(3);

foreach ($userstories as $us_id => $us) {
    if ($us_id != -1) {
        $us_bdd = new userstory();
        $us_bdd->get_by_id($us_id);
        echo '<div class="row"><ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter($us_bdd->userstoryname, 20) . '</div></div>';
    } else {
        echo '<div class="row"><ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter('no userstory', 20) . '</div></div>';
    } // traitement des
    foreach ($us as $task) {
        echo '<li class="btn btn-default"><div class="draggable">#' . $task->taskname . '</div></li> ';
    }
    echo '</ul></div>';
}
?>

        <script type="text/javascript" src= '<?php echo base_url('application/js/dragndrop.js') ?>'></script>
        <script type="text/javascript" src= '<?php echo base_url('application/js/get_gantt.js') ?>'></script>
    </body>
</html>