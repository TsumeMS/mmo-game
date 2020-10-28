<?php
	$building = isset($_GET['b']) ? $_GET['b'] : 'resources';
?>

<div class="buildings">
	<ul>
		<li class="building">
			<a class="<?php echo($building == 'resources' ? 'active' : ''); ?>" href="?v=dashboard&b=resources">Magazyn</a>
		</li>
		<li>
			<a class="<?php echo($building == 'laboratorie' ? 'active' : ''); ?>" href="?v=dashboard&b=laboratorie">Laboratorium</a>
		</li>
		<li>
			<a class="<?php echo($building == 'production' ? 'active' : ''); ?>" href="?v=dashboard&b=production">Produkcja</a>
		</li>
	</ul>
</div>