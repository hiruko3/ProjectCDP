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
   	<caption>Sprint</caption>
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

    <!-- <div class="draggable" >#6</div>
    <div class="draggable" >#7</div> -->
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
          echo '<ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter($us_bdd->userstoryname, 20) . '</div></div>';
        }
        else{ echo '<ul><div class="col-md-2"><div class="btn btn-primary">' . character_limiter('no userstory', 20) . '</div></div>'; } // traitement des
        foreach($us as $task)
        {
          echo '<li class="btn btn-default"><div class="draggable">#' . $task->taskname . '</div></li> ';
        }
        echo '</ul>';
      }
    ?>

    <script type="text/javascript" src= '<?php echo base_url('application/js/dragndrop.js')?>'></script>
 </body>
</html>