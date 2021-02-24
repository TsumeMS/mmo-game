<?php
	$buildings = readFromFile('buildings');
?>

<div id="production">
	<div class="production-item" id="timberHouse">
		Dom drwala
		<span class="level">Poziom <strong><?php echo($buildings->timberHouse->level); ?></strong></span>
		<p>Produkcja <span><?php echo($buildings->timberHouse->production); ?></span> / godz.</p>
		<button>Rozbuduj</button>
	</div>
	<div class="production-item" id="query">
		Kamieniołom
		<span class="level">Poziom <strong><?php echo($buildings->query->level); ?></strong></span>
		<p>Produkcja <span><?php echo($buildings->query->production); ?></span> / godz.</p>
		<button>Rozbuduj</button>
	</div>
	<div class="production-item" id="well">
		Studnia
		<span class="level">Poziom <strong><?php echo($buildings->well->level); ?></strong></span>
		<p>Produkcja <span><?php echo($buildings->well->production); ?></span> / godz.</p>
		<button>Rozbuduj</button>
	</div>
	<div class="production-item" id="farm">
		Farma
		<span class="level">Poziom <strong><?php echo($buildings->farm->level); ?></strong></span>
		<p>Produkcja <span><?php echo($buildings->farm->production); ?></span> / godz.</p>
		<button>Rozbuduj</button>
	</div>
</div>