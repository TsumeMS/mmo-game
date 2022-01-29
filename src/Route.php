<?php

$route = [
	'login' => [
		'dashboard',
		'saveToFile'
	]
];

function route($view) {
	if(inRoute($view) && isLogin()) {
		return $view;
	}
	if(inRoute($view) && !isLogin()) {
		return 'login';
	}
	if(isLogin() && ($view == 'login' || $view == 'register')) {
	    $subdomain = config('default.app.subdomain');
		header('Location: ' . $_SERVER['HTTP_ORIGIN'] . $subdomain . '/?v=dashboard');
	    return 'dashboard';
	}
	return $view;
}

function inRoute($view) {
	global $route;
	foreach ($route['login'] as $item) {
		if($view === $item) {
			return true;
		}
	}
	return false;
}
