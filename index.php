<?php
session_start();
include_once('boot.php');

$view = !empty($_GET['v']) ? $_GET['v'] : 'body';
$action = !empty($_GET['a']) ? $_GET['a'] : null;
$function = !empty($_GET['f']) ? $_GET['f'] : null;
$function = route($function);

if($function != null) {
	if ($function == 'login') {
		exit;
	}

	$function($_POST, $_GET);
	header('location:' . $_SERVER['HTTP_REFERER']);
}

if($action !== null) {
	$action($_POST);
}	
$view = route($view);
switch($view) {
	case 'login':
	case 'register':
		$view = "auth/$view";
		break;
}

include_once('views/header.php');
echo '<body>';
include_once('views/menu.php');
include_once("views/$view.php");
echo '</body>';
include_once('views/footer.php');
