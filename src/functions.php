<?php

function saveToFile($postData, $getData)
{
	$fileName = $postData['data'] ? $postData['data']['fileName'] : $_GET['fileName'];
	unset($postData['data']['fileName']);
	$data = [];
	foreach ($postData['data'] as $key => $value) {
	    $building = explode('_', $key);
	    $data[$building[0]][$building[1]] = $value;
    }
	$file = fopen(getcwd() . '/tmp/users/' . $_SESSION['user'] . '/' . $fileName .'.json', "w+");
	fwrite($file, json_encode($data));
	fclose($file);
	return true;
}

function readFromFile($fileName)
{
	$path = getcwd() . '/tmp/users/' . $_SESSION['user'] . '/' . $fileName .'.json';
	if(file_exists($path)) {
		$data = file_get_contents($path);
		return json_decode($data);
	}
	return null;
}

function config($name)
{
    if(!$name) {
        return;
    }
    $parts = explode('.', $name);
    if(!file_exists(__DIR__.'/../config/'.$parts[0].'.php')) {
        return;
    }
    $config = require_once(__DIR__.'/../config/'.$parts[0].'.php');
    for($i = 1; $i < count($parts); ++$i) {
        if(!empty($config[$parts[$i]])) {
            $config = $config[$parts[$i]];
        }
    }
    return $config;
}

function objToArray($obj)
{


}
