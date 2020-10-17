<div id="login-form">
	<?php
		if(!empty($_REQUEST['error'])) {
	?>
		<div class="error">
			<p><?php echo $_REQUEST['error']; ?></p>
		</div>
	<?php } ?>
	<form class="login-form" action="?v=login&a=login" method="POST">
		<div class="">
			<label for="login" class="">Login</label>
			<input type="text" id="login" name="login" required>
		</div>
		<div class="">
			<label for="password" class="">Hasło</label>
			<input type="password" id="password" name="password" required>
		</div>
		<div class="">
			<input class="center" type="submit" value="Zaloguj">
		</div>
	</form>
</div>