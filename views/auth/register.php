<div id="register">
	<?php
		if(!empty($_REQUEST['error'])) {
	?>
		<div class="error">
			<p><?php echo $_REQUEST['error']; ?></p>
		</div>
	<?php } ?>
	<form class="register-form" action="?v=register&a=register" method="POST">
		<div class="">
			<label for="login" class="">Login</label>
			<input type="text" id="login" name="login" required>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="password" class="">Hasło</label>
				<input type="password" id="password" name="password" required>
			</div>
			<div class="form-group">
				<label for="rep-password" class="">Powtórz hasło</label>
				<input type="password" id="rep-password" name="rep-password" required>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label for="email" class="">E-mail</label>
				<input type="mail" id="email" name="email" required>
			</div>
			<div class="form-group">
				<label for="rep-email" class="">Powtórz e-mail</label>
				<input type="mail" id="rep-email" name="rep-email" required>
			</div>
		</div>
		<div class="row">
			<label for="regulation" class="">Akceptuję regulamin</label>
			<input type="checkbox" id="regulation" name="regulation" required>
		</div>
		<div class="">
			<input class="center" type="submit" value="Zarejestruj">
		</div>
	</form>
</div>