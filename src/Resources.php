<?php

function getResources()
{
    $path = 'tmp/users/' . $_SESSION['user'] . '/resources.json';
    if(file_exists($path)) {
        $data = json_decode(file_get_contents($path));
        return objToArray($data);
    }
    return config('default.resources');
}

function getImage($buildingName) {
    $image = '';
    switch ($buildingName) {
        case 'wood':
            $image = 'logs.png';
            break;
        case 'stone':
            $image = 'stone.png';
            break;
        case 'aqua':
            $image = 'aqua.png';
            break;
        case 'food':
            $image = 'drumstick.png';
            break;
    }
    return $image;
}
