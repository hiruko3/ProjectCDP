<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<meta charset="utf-8">
	</head>
	<body>
		<div class="container">
			<h3>My projects</h3>

			<?php foreach($projects as $id => $param) { ?>
			<div class='row'>
				<div class='span2'>
					<?php echo $param['name']; ?>
				</div>
				<div class='span3'>
					<?php echo $param['status']; ?>
				</div>
				<div class='span3'>
					<?php echo "<input type='button' name='linkProject' value='view' onclick='self.location.href=\"project.php?id=" . $id . "\"' onclick>" ; ?>
				</div>
			</div>
			<?php } ?>

			<h3>My invitations</h3>
			<?php foreach($invitations as $id => $param) { ?>
			<div class='row'>
				<div class='span2'>
					<?php echo $param['p_name']; ?>
				</div>
				<div class='span3'>
					<?php echo $param['proposed_status']; ?>
				</div>
				<div class='span1'>
					<?php echo "<input type='button' name='accept_invit' value='join' onclick='self.location.href=\"join_project.php?id=" . $id . "\"' onclick>" ; ?>
				</div>
				<div class='span1'>
					<?php echo "<input type='button' name='reject_invit' value='reject' onclick='self.location.href=\"reject_project.php?id=" . $id . "\"' onclick>" ; ?>
				</div>
			</div>
			<?php } ?>

			<h3>Create new project</h3>
			<div class='row'>
				<form method='get' action='send_candidacy'>
					<div class='span5'>
						<input type='text'name='p_name' placeholder='project' style="height:auto;" />
					</div>
					<div class='span3'>
						<input type="submit" value="join" />
					</div>
				</form>
			</div>

		</div>
	</body>
</html>
