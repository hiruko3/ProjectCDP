<!DOCTYPE HTML>
<html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1"  >
    <link rel="stylesheet" type="text/css" href='<?php echo base_url('application/css/sprint.css')?>'>
    <title>Sprint</title>
 </head>

 <body>
 	<form method="post" action="">
	<input type="text" name="titre" id="dev" />

	<input type="button" id="subDev" onclick="ajouterLigne()" value="Ajouter" />
	</form>

 	<table class="table">
   	<caption><b>Garrent</b></caption>
   	<thead id="thead">
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
   </tbody>
</table>

    <div class="draggable" id="taskDrag" onmouseover="document.getElementById('deleteTask1').style.display = 'inline';"
    onmouseout="document.getElementById('deleteTask1').style.display = 'none';">
      <img src ='<?php echo base_url('ressources/delete.svg')?>'
       id="deleteTask1" width= "10px" height="10px" class="suppIcon" 
       style = "display : none" draggable="false" alt="delete"
       onclick="deleteThisTask('deleteTask'+1)">
      #tache6</div>

    <div class="draggable" id="taskDrag" onmouseover="document.getElementById('deleteTask2').style.display = 'inline';"
    onmouseout="document.getElementById('deleteTask2').style.display = 'none';"
    onclick= "displayTask()">
      <img src ='<?php echo base_url('ressources/delete.svg')?>'
       id="deleteTask2" width= "10px" height="10px" class="suppIcon" 
       style = "display : none" draggable="false" alt="delete"
       onclick="deleteThisTask('deleteTask'+2)">
      #tache7</div>

    <?php
      echo br(3);
      /*foreach($tasks as $t)
      {
        echo "<div class='draggable'><a class='btn btn-default' href=" . base_url() . "task_controller/displayTask/" . $t->id . ">" . $t->taskname . "</a></div> ";
      }*/

      /*foreach($userstories as $us_id => $us)
      {
        if($us_id != -1)
        {
          $us_bdd = new userstory();
          $us_bdd->get_by_id($us_id);
          echo '<ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter($us_bdd->userstoryname, 20) . '</div></div>';
        }
        else{ echo '<ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter('no userstory', 20) . '</div></div>'; } // traitement des
        foreach($us as $task)
        {
          echo '<li class="draggable"><a class="btn btn-default" href=' . base_url() . 'task_controller/displayTask/' . $task->id . '>' . $task->taskname . '</a></li> ';
        }
        echo '</ul>';
      }*/

      foreach($userstories as $us_id => $us)
      {
        if($us_id != -1)
        {
          $us_bdd = new userstory();
          $us_bdd->get_by_id($us_id);
          echo '<div class="row"><ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter($us_bdd->userstoryname, 20) . '</div></div>';
        }
        else{ echo '<div class="row"><ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter('no userstory', 20) . '</div></div>'; } // traitement des
        foreach($us as $task)
        {
          echo '<li class="btn btn-default"><div class="draggable">#' . $task->taskname . '</div></li> ';
        }
        echo '</ul></div>';
      }
    ?>

    <script type="text/javascript" src= '<?php echo base_url('application/js/dragndrop.js')?>'></script>
 </body>
</html>