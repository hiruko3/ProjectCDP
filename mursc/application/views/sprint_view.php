<!DOCTYPE HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1"  >
        <link rel="stylesheet" type="text/css" href='<?php echo base_url('application/css/sprint.css') ?>'>
        <title>Sprint</title>
    </head>

    <body onload="addDraggable();
            addDropper()">

        <div class="text-center">

            <h2> Gantt (for Google Chrome )</h2>
        </div>

        <br/>
        <div class='text-center'>
            <?php echo anchor('sprint_controller/get_another_gantt/' . $before, ' ', 'class="btn btn-default fa fa-arrow-left"'); ?>
            <label class="col-lg-offset-1"> <?php echo "   " . $week; ?> </label>
            <?php echo anchor('sprint_controller/get_another_gantt/' . $after, ' ', 'class="btn btn-default fa fa-arrow-right col-lg-offset-1"'); ?>
        </div>
        <br/>

        <form method="post" action="">
            <input type="text" name="titre" id="dev" />
            <input type="button" id="subDev" onclick="ajouterLigne()" value="Add developper" />
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
                $id_task = 100;
                $ligne = 1;
                if (sizeof($gantt_lines) != 0) {

                    foreach ($gantt_lines as $line) {
                        echo '<tr id="ligne' . $ligne . '" >';
                        echo '<td>';
                        echo '<img onclick="deleteLigne(ligne' . $ligne . ')" src="' . base_url() . 'ressources/delete.svg" width="10px" height="10px" id="deleteLigneTab">';
                        echo $line['developper_name'];
                        echo '</td>';
                        if ($line['lundi'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask1' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask1' . $ligne . $id_task . '\').style.display = \'none\';" draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask1' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 1' . $ligne . $id_task . ')">'
                            . $line['lundi']
                            . '</div>'
                            . '</td>';
                        }
                        if ($line['mardi'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask2' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask2' . $ligne . $id_task . '\').style.display = \'none\';"  draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask2' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 2' . $ligne . $id_task . ')">'
                            . $line['mardi']
                            . '</div>'
                            . '</td>';
                        }
                        if ($line['mercredi'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask3' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask3' . $ligne . $id_task . '\').style.display = \'none\';"  draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask3' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 3' . $ligne . $id_task . ')">'
                            . $line['mercredi']
                            . '</div>'
                            . '</td>';
                        }
                        if ($line['jeudi'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask4' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask4' . $ligne . $id_task . '\').style.display = \'none\';"  draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask4' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 4' . $ligne . $id_task . ')">'
                            . $line['jeudi']
                            . '</div>'
                            . '</td>';
                        }
                        if ($line['vendredi'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask5' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask5' . $ligne . $id_task . '\').style.display = \'none\';"  draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask5' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 5' . $ligne . $id_task . ')">'
                            . $line['vendredi']
                            . '</div>'
                            . '</td>';
                        }
                        if ($line['samedi'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask6' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask6' . $ligne . $id_task . '\').style.display = \'none\';"  draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask6' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 6' . $ligne . $id_task . ')">'
                            . $line['samedi']
                            . '</div>'
                            . '</td>';
                        }
                        if ($line['dimanche'] == '') {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper"></div>'
                            . '</td></tr>';
                        } else {
                            echo '<td class="active" id="tobeDropped" height="50px">'
                            . '<div class="dropper">'
                            . '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask7' . $ligne . $id_task . '\').style.display = \'inline\';" onmouseout="document.getElementById(\'deleteTask7' . $ligne . $id_task . '\').style.display = \'none\';"  draggable="true">'
                            . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask7' . $ligne . $id_task . '" width="10px" height="10px" class="suppIcon" style="display: none;" draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\' + 7' . $ligne . $id_task . ')">'
                            . $line['dimanche']
                            . '</div>'
                            . '</td></tr>';
                        }
                        $ligne++;
                    }
                }
                ?>

            </tbody>
        </table>

        </br></br></br>


        <fieldset class="col-lg-10">
            <h4> Tasks of project by US : </h4> 
            <table border="1" class="table table-responsive table-bordered" > 

                <tr> 
                    <th> US </th> 
                    <th> Tasks </th> 
                </tr> 

                    <?php
                    foreach ($userstories as $us_id => $us) {
                        if ($us_id != -1) {
                            $us_bdd = new userstory();
                            $us_bdd->get_by_id($us_id);
							echo '<tr>';
                            echo'<td>';
                            echo form_label('<a href=' . base_url() . 'userstory_controller/index_userstory/' . $us_bdd->id . '>' . $us_bdd->userstoryname . ' </a>');
                            echo'</td>';
                            echo '<td>';
                            foreach ($us as $task) {
                                echo '<div class="draggable" id="taskDrag" onmouseover="document.getElementById(\'deleteTask' . $task->id . '\').style.display = \'inline\';'
                                . '" onmouseout="document.getElementById(\'deleteTask' . $task->id . '\').style.display = \'none\';"  draggable="true">'
                                . '<img src="' . base_url() . 'ressources/delete.svg" id="deleteTask' . $task->id . ''
                                . '" width="10px" height="10px" class="suppIcon" style="display: none;"'
                                . ' draggable="false" alt="delete" onclick="deleteThisTask(\'deleteTask\'+' . $task->id . ')">'
                                . $task->taskname
                                . '</div>';
                                echo ' ';
                            }
                            echo '</td>';
							echo '</tr>';
                        }
                    }
                    ?> 
            </table>
        </fieldset>

        </br></br></br></br></br></br>

        <div class="text-center col-lg-11">
            <button onclick="get_gantt(<?php echo $numweek . ',' . $that_week_or_not; ?>)" class="btn btn-success ">
                <i class="fa fa-floppy-o"></i> Save Gantt
            </button>
            <?php echo anchor(base_url('sprint_controller/delete_gantt/' . $numweek), ' Delete Gantt', 'class="btn btn-danger fa fa-times"'); ?>
        </div>

        <script type="text/javascript" src= '<?php echo base_url('application/js/dragndrop.js') ?>'></script>
        <script type="text/javascript" src= '<?php echo base_url('application/js/get_gantt.js') ?>'></script>
    </body>
</html>