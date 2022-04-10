<?php
    $buildings = getResources();
?>

<div id="resources">
    <form method="POST" action="?f=saveToFile" class="flex-form">
        <?php
            foreach ($buildings as $name => $building) :
        ?>
        <div class="resources-item" id="<?php echo $name; ?>">
            <span><img src="<?php echo getImage($name); ?>" width="32"></span>
            <label><?php cout($name); ?></label>
            <span class="quantity">
                Ilość
                <strong><?php echo(isset($building->quantity) ? (int)$building->quantity : '0'); ?></strong> /
                <?php echo((isset($building->level) ? $building->level : 1) * 50); ?>
            </span>
            <small class="level">Poziom <span><?php echo(isset($building->level) ? $building->level : '1'); ?></span></small>
            <input type="hidden" name="<?php echo $name?>-quantity" value="<?php echo(isset($building->quantity) ? $building->quantity : '0'); ?>">
            <input type="hidden" name="<?php echo $name?>-level" value="<?php echo(isset($building->level) ? $building->level : '1'); ?>">
            <button type="submit" onclick="upgradeBuilding(event, 'resources')">Rozbuduj</button>
        </div>
        <?php endforeach; ?>
    </form>
</div>
