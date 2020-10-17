<?php
	$building = !empty($_GET['b'])?$_GET['b']:'resources';
?>
<div class="content">
	<?php 
		if(file_exists('views/game/buildings.php')) {
			include_once 'views/game/buildings.php';
		}
		if(file_exists("views/game/$building.php")) {
			include_once "views/game/$building.php";
		}
	?>
</div>