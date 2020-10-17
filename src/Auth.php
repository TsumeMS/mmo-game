<?php

function login($loginUser) {
	if(!is_dir(getcwd() . '/tmp/users/' . $loginUser['login'])) {
		$_REQUEST['error'] = 'Login nie istnieje!';
		return false;
	}

	$userData = json_decode(file_get_contents(getcwd() . '/tmp/users/' . $loginUser['login'] . '/data.json', "w+"));
	$hash = hash('sha512', $loginUser['password']);
	if(!empty($userData) && hash('sha512', $loginUser['password']) == $userData->password) {
		$_SESSION['user'] = $loginUser['login'];
		return true;
	}
	if(!empty($userData) && hash('sha512', $loginUser['password']) != $userData->password) {
		$_REQUEST['error'] = 'Hasło jest nieprawidłowe.';
		return false;
	}
	$_REQUEST['error'] = 'Coś poszło nie tak. Skontaktuj się z administratorem!';
	return false;
}

function isLogin() {
	return !empty($_SESSION['user']);
}

function register($registerUser) {
	if(is_dir(getcwd() . '/tmp/users/' . $registerUser['login'])) {
		$_REQUEST['error'] = 'Login jest już zajęty!';
		return false;
	} 
	if(registerValidate($registerUser)) {
		if(mkdir(getcwd() . '/tmp/users/' . $registerUser['login'], 0755, true)) {
			unset($registerUser['rep-password']);
			unset($registerUser['rep-email']);
			$registerUser['password'] = hash('sha512', $registerUser['password']);
			$registerUser['register_date'] = date('Y-m-d h:i:s');
			$file = fopen(getcwd() . '/tmp/users/' . $registerUser['login'] . '/data.json', "w+");
			fwrite($file, json_encode($registerUser));
			fclose($file);
			return true;
		}
	}
	return false;
}


function registerValidate($registerUser) {
	if(strlen($registerUser['password']) < 8) {
		$_REQUEST['error'] = 'Hasło nie może być krótsze niż 8 znaków!';
		return false;
	}
	if($registerUser['password'] !== $registerUser['rep-password']) {
		$_REQUEST['error'] = 'Hasła nie są takie same!';
		return false;
	}
	if($registerUser['email'] !== $registerUser['rep-email']) {
		$_REQUEST['error'] = 'Emaile nie są takie same!';
		return false;
	}
	return true;
}

function logout() {
	unset($_SESSION['user']);
	session_destroy();
}