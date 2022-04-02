<?php

function saveToFile($postData, $getData)
{
    if (isset($postData['fileName'])) {
        $fileName = $postData['fileName'];
    } else {
        $fileName = $postData['data'] ? $postData['data']['fileName'] : $_GET['fileName'];
        unset($postData['data']['fileName']);
    }
	$data = [];
    if (is_string($postData['data'])) {
        $obj = json_decode($postData['data']);
        $data = objToArray($obj);
    }
	foreach ($postData['data'] as $key => $value) {
	    $building = explode('_', $key);
	    $data[$building[0]][$building[1]] = $value;
    }
	try {
        $file = fopen(getcwd() . '/tmp/users/' . $_SESSION['user'] . '/' . $fileName .'.json', "w+");
        fwrite($file, json_encode($data));
        fclose($file);
    } catch (Exception $ex) {
        return false;
    }
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
    $config = include(__DIR__.'/../config/'.$parts[0].'.php');
    for($i = 1; $i < count($parts); ++$i) {
        if(isset($config[$parts[$i]])) {
            $config = $config[$parts[$i]];
        }
    }
    return $config;
}

function objToArray($obj)
{
    $result = [];
    foreach ($obj as $key => $value) {
        $result[$key] = $value;
    }
    return $result;
}

function cout($word) {
    if (!is_string($word)) {
        echo '';
        return;
    }
    $config = config('default.app');
    if(file_exists('views/translations/' . $config['lang'] . '.json')) {
        $translations = json_decode(file_get_contents('views/translations/' . $config['lang'] . '.json'));
        if (isset($translations->$word)) {
            echo $translations->$word;
        } else {
            echo $word;
        }
    } else {
        echo $word;
    }
}
