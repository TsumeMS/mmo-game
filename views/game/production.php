<?php
	$buildings = getProduction();
?>

<div id="production">
    <form method="POST" action="?f=saveToFile" class="flex-form">
        <input type="hidden" name="data[fileName]" value="buildings">
        <?php foreach ($buildings as $buildingName => $building) : ?>
            <div id="<?php echo $buildingName; ?>">
                <div class="production-item">
                    <?php cout($buildingName); ?>
                    <span class="level"><?php cout('LEVEL'); ?> <strong><?php echo(isset($building->level) ? $building->level : '1'); ?></strong></span>
                    <p>Produkcja <span><?php echo(isset($building->production) ? $building->production : '10'); ?></span> / godz.</p>
                    <input type="hidden" class="building_level" value="<?php echo(isset($building->level) ? $building->level : '1'); ?>" name="data[<?php echo $buildingName; ?>_level]">
                    <input type="hidden" class="building_production" value="<?php echo(isset($building->production) ? $building->production : '10'); ?>" name="data[<?php echo $buildingName; ?>_production]">
                </div>
                <div class="production-item">
                    <button type="submit" onclick="upgradeBuilding(event, 'production')">Rozbuduj</button>
                    <span class="price">
                        <img src="assets/img/<?php echo getImage('wood') ?>" width="24">
                        <strong>10</strong>
                    </span>
                    <span class="price">
                        <img src="assets/img/<?php echo getImage('stone') ?>" width="24">
                        <strong>10</strong>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    </form>
</div>
