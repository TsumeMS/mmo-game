<?php
	$buildings = readFromFile('buildings');
?>

<div id="production">
    <form method="POST" action="?f=saveToFile">
        <div class="production-item" id="timberHouse">
            Dom drwala
            <span class="level">Poziom <strong><?php echo(isset($buildings->timberHouse->level) ? $buildings->timberHouse->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->timberHouse->production) ? $buildings->timberHouse->production : '10'); ?></span> / godz.</p>
            <button type="submit">Rozbuduj</button>
            <input type="hidden" value="<?php echo(isset($buildings->timberHouse->level) ? $buildings->timberHouse->level : '1'); ?>" name="timberHouse_level">
            <input type="hidden" value="<?php echo(isset($buildings->timberHouse->production) ? $buildings->timberHouse->production : '10'); ?>" name="timberHouse_production">
        </div>
        <div class="production-item" id="query">
            Kamieniołom
            <span class="level">Poziom <strong><?php echo(isset($buildings->query->level) ? $buildings->query->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->query->production) ? $buildings->query->production : '10'); ?></span> / godz.</p>
            <button type="submit">Rozbuduj</button>
            <input type="hidden" value="<?php echo(isset($buildings->query->level) ? $buildings->query->level : '1'); ?>" name="query_level">
            <input type="hidden" value="<?php echo(isset($buildings->query->production) ? $buildings->query->production : '10'); ?>" name="query_production">
        </div>
        <div class="production-item" id="well">
            Studnia
            <span class="level">Poziom <strong><?php echo(isset($buildings->well->level) ? $buildings->well->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->well->production) ? $buildings->well->production : '10'); ?></span> / godz.</p>
            <button type="submit">Rozbuduj</button>
            <input type="hidden" value="<?php echo(isset($buildings->well->level) ? $buildings->well->level : '1'); ?>" name="well_level">
            <input type="hidden" value="<?php echo(isset($buildings->well->production) ? $buildings->well->production : '10'); ?>" name="well_production">
        </div>
        <div class="production-item" id="farm">
            Farma
            <span class="level">Poziom <strong><?php echo(isset($buildings->farm->level) ? $buildings->farm->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->farm->production) ? $buildings->farm->production : '10'); ?></span> / godz.</p>
            <button type="submit">Rozbuduj</button>
            <input type="hidden" value="<?php echo(isset($buildings->farm->level) ? $buildings->farm->level : '1'); ?>" name="farm_level">
            <input type="hidden" value="<?php echo(isset($buildings->farm->production) ? $buildings->farm->production : '10'); ?>" name="farm_production">
        </div>
    </form>
</div>
