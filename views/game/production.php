<?php
	$buildings = readFromFile('buildings');
?>

<div id="production">
    <form method="POST" action="?f=saveToFile" class="flex-form">
        <input type="hidden" name="data[fileName]" value="buildings">
        <div class="production-item" id="timberHouse">
            Dom drwala
            <span class="level">Poziom <strong><?php echo(isset($buildings->timberHouse->level) ? $buildings->timberHouse->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->timberHouse->production) ? $buildings->timberHouse->production : '10'); ?></span> / godz.</p>
            <button type="submit" onclick="upgradeBuilding(event, 'production')">Rozbuduj</button>
            <input type="hidden" class="building_level" value="<?php echo(isset($buildings->timberHouse->level) ? $buildings->timberHouse->level : '1'); ?>" name="data[timberHouse_level]">
            <input type="hidden" class="building_production" value="<?php echo(isset($buildings->timberHouse->production) ? $buildings->timberHouse->production : '10'); ?>" name="data[timberHouse_production]">
        </div>
        <div class="production-item" id="query">
            Kamieniołom
            <span class="level">Poziom <strong><?php echo(isset($buildings->query->level) ? $buildings->query->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->query->production) ? $buildings->query->production : '10'); ?></span> / godz.</p>
            <button type="submit" onclick="upgradeBuilding(event, 'production')">Rozbuduj</button>
            <input type="hidden" class="building_level" value="<?php echo(isset($buildings->query->level) ? $buildings->query->level : '1'); ?>" name="data[query_level]">
            <input type="hidden" class="building_production" value="<?php echo(isset($buildings->query->production) ? $buildings->query->production : '10'); ?>" name="data[query_production]">
        </div>
        <div class="production-item" id="well">
            Studnia
            <span class="level">Poziom <strong><?php echo(isset($buildings->well->level) ? $buildings->well->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->well->production) ? $buildings->well->production : '10'); ?></span> / godz.</p>
            <button type="submit" onclick="upgradeBuilding(event, 'production')">Rozbuduj</button>
            <input type="hidden" class="building_level" value="<?php echo(isset($buildings->well->level) ? $buildings->well->level : '1'); ?>" name="data[well_level]">
            <input type="hidden" class="building_production" value="<?php echo(isset($buildings->well->production) ? $buildings->well->production : '10'); ?>" name="data[well_production]">
        </div>
        <div class="production-item" id="farm">
            Farma
            <span class="level">Poziom <strong><?php echo(isset($buildings->farm->level) ? $buildings->farm->level : '1'); ?></strong></span>
            <p>Produkcja <span><?php echo(isset($buildings->farm->production) ? $buildings->farm->production : '10'); ?></span> / godz.</p>
            <button type="submit" onclick="upgradeBuilding(event, 'production')">Rozbuduj</button>
            <input type="hidden" class="building_level" value="<?php echo(isset($buildings->farm->level) ? $buildings->farm->level : '1'); ?>" name="data[farm_level]">
            <input type="hidden" class="building_production" value="<?php echo(isset($buildings->farm->production) ? $buildings->farm->production : '10'); ?>" name="data[farm_production]">
        </div>
    </form>
</div>
