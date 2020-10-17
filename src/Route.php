<?php

$route = [
	'login' => [
		'dashboard',
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