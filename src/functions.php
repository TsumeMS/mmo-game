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
	if($path) {
		$data = file_get_contents($path);
		return json_decode($data);
	}
	return null;
}
