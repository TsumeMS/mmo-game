<?php
    $buildings = readFromFile('resources');
?>

<div id="resources">
    <form method="POST" action="?f=saveToFile" class="flex-form">
        <div class="resources-item" id="wood">
            <span><img src="assets/img/logs.png" width="32"></span>
            <label>Drewno</label>
            <span class="level">
                Ilość
                <strong><?php echo(isset($buildings->wood->quantity) ? $buildings->wood->quantity : '0'); ?></strong>
                /<?php echo((isset($buildings->wood->level) ? $buildings->wood->level : 1) * 50); ?>
            </span>
            <small class="level">Poziom <?php echo(isset($buildings->wood->level) ? $buildings->wood->level : '1'); ?></small>
            <input type="hidden" name="wood-quantity" value="<?php echo(isset($buildings->wood->quantity) ? $buildings->wood->quantity : '0'); ?>">
            <input type="hidden" name="wood-level" value="<?php echo(isset($buildings->wood->level) ? $buildings->wood->level : '1'); ?>">
            <button type="submit" onclick="upgradeBuilding(event, 'resources')">Rozbuduj</button>
        </div>
        <div class="resources-item" id="stone">
            <span><img src="assets/img/stone.png" width="32"></span>
            <label>Kamień</label>
            <span class="level">
                Ilość
                <strong><?php echo(isset($buildings->stone) ? $buildings->stone->quantity : '0'); ?></strong>
                /<?php echo((isset($buildings->stone->level) ? $buildings->stone->level : 1) * 50); ?>
            </span>
            <small class="level">Poziom <?php echo(isset($buildings->stone->level) ? $buildings->stone->level : '1'); ?></small>
            <input type="hidden" name="stone-quantity" value="<?php echo(isset($buildings->stone->quantity) ? $buildings->stone->quantity : '0'); ?>">
            <input type="hidden" name="stone-level" value="<?php echo(isset($buildings->stone->level) ? $buildings->stone->level : '1'); ?>">
            <button type="submit" onclick="upgradeBuilding(event, 'resources')">Rozbuduj</button>
        </div>
        <div class="resources-item" id="aqua">
            <span><img src="assets/img/aqua.png" width="32"></span>
            <label>Woda</label>
            <span class="level">
                Ilość
                <strong><?php echo(isset($buildings->aqua) ? $buildings->aqua->quantity : '0'); ?></strong>
                /<?php echo((isset($buildings->aqua->level) ? $buildings->aqua->level : 1) * 50); ?>
            </span>
            <small class="level">Poziom <?php echo(isset($buildings->aqua->level) ? $buildings->aqua->level : '1'); ?></small>
            <input type="hidden" name="aqua-quantity" value="<?php echo(isset($buildings->aqua->quantity) ? $buildings->aqua->quantity : '0'); ?>">
            <input type="hidden" name="aqua-level" value="<?php echo(isset($buildings->aqua->level) ? $buildings->aqua->level : '1'); ?>">
            <button type="submit" onclick="upgradeBuilding(event, 'resources')">Rozbuduj</button>
        </div>
        <div class="resources-item" id="food">
            <span><img src="assets/img/drumstick.png" width="32"></span>
            <label>Żywność</label>
            <span class="level">
                Ilość
                <strong><?php echo(isset($buildings->food) ? $buildings->food->quantity : '0'); ?></strong>
                /<?php echo((isset($buildings->food->level) ? $buildings->food->level : 1) * 50); ?>
            </span>
            <small class="level">Poziom <?php echo(isset($buildings->food->level) ? $buildings->food->level : '1'); ?></small>
            <input type="hidden" name="food-quantity" value="<?php echo(isset($buildings->food->quantity) ? $buildings->food->quantity : '0'); ?>">
            <input type="hidden" name="food-level" value="<?php echo(isset($buildings->food->level) ? $buildings->food->level : '1'); ?>">
            <button type="submit" onclick="upgradeBuilding(event, 'resources')">Rozbuduj</button>
        </div>
    </form>
</div>
