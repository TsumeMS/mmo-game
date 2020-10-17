<menu>
	<?php if(!isLogin()) { ?>
		<ul>
			<li><a href="?v=login">Logowanie</a></li>
			<li><a href="?v=register">Rejestracja</a></li>
		</ul>
	<?php } else { ?>
		<ul>
			<li><a href="?a=logout">Wyloguj</a></li>
		</ul>
	<?php } ?>
</menu>