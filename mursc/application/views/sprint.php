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

    <div class="draggable" >#6</div>
    <div class="draggable" >#7</div>
    <script type="text/javascript" src= '<?php echo base_url('application/js/dragndrop.js')?>'></script>
 </body>
</html>