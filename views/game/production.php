<?php
	$buildings = getProduction();
?>

<div id="production">
    <form method="POST" action="?f=saveToFile" class="flex-form">
        <input type="hidden" name="data[fileName]" value="buildings">
        <?php foreach ($buildings as $buildingName => $building) : ?>
            <div class="production-item" id="<?php echo $buildingName; ?>">
                <?php cout($buildingName); ?>
                <span class="level">Poziom <strong><?php echo(isset($building->level) ? $building->level : '1'); ?></strong></span>
                <p>Produkcja <span><?php echo(isset($building->production) ? $building->production : '10'); ?></span> / godz.</p>
                <button type="submit" onclick="upgradeBuilding(event, 'production')">Rozbuduj</button>
                <input type="hidden" class="building_level" value="<?php echo(isset($building->level) ? $buildings->level : '1'); ?>" name="data[<?php echo $buildingName; ?>_level]">
                <input type="hidden" class="building_production" value="<?php echo(isset($buildings->production) ? $building->production : '10'); ?>" name="data[<?php echo $buildingName; ?>_production]">
            </div>
        <?php endforeach; ?>
    </form>
</div>
