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
    <script type="text/javascript" src= '<?php echo base_url('application/js/dragndrop.js')?>'></script>
 </body>
</html>