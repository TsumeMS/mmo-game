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
            <small class="level">Poziom <?php echo(isset($buildings->wood->level) ? $buildings->wood->level : '0'); ?></small>
            <input type="hidden" name="wood-quantity" value="<?php echo(isset($buildings->wood->quantity) ? $buildings->wood->quantity : '0'); ?>">
            <input type="hidden" name="wood-level" value="<?php echo(isset($buildings->wood->level) ? $buildings->wood->level : '1'); ?>">
            <button type="submit" onclick="">Rozbuduj</button>
        </div>
        <div class="resources-item" id="stone">
            <span><img src="assets/img/stone.png" width="32"></span>
            <label>Kamień</label>
            <span class="level">Ilość <strong><?php echo(isset($buildings->stone) ? $buildings->stone : '0'); ?></strong>/50</span>
            <button>Rozbuduj</button>
        </div>
        <div class="resources-item" id="aqua">
            <span><img src="assets/img/aqua.png" width="32"></span>
            <label>Woda</label>
            <span class="level">Ilość <strong><?php echo(isset($buildings->aqua) ? $buildings->aqua : '0'); ?></strong>/50</span>
            <button>Rozbuduj</button>
        </div>
        <div class="resources-item" id="food">
            <span><img src="assets/img/drumstick.png" width="32"></span>
            <label>Żywność</label>
            <span class="level">Ilość <strong><?php echo(isset($buildings->food) ? $buildings->food : '0'); ?></strong>/50</span>
            <button>Rozbuduj</button>
        </div>
    </form>
</div>
