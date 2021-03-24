<?php

function saveToFile($postData, $getData)
{
    if(empty($postData)) {
        $postData['data'] = file_get_contents('php://input');
    }
	$data = json_decode($postData['data']);
	$fileName = $data->fileName ? $data->fileName : $_GET['fileName'];
	$file = fopen(getcwd() . '/tmp/users/' . $_SESSION['user'] . '/' . $fileName .'.json', "w+");
	fwrite($file, json_encode($data->data));
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
