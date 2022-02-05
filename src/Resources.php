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
    $image = 'assets/img/default-image.png';
    switch ($buildingName) {
        case 'wood':
            if(file_exists(__DIR__ . '/../assets/img/logs.png')) {
                $image = 'assets/img/logs.png';
            }
            break;
        case 'stone':
            if(file_exists(__DIR__ . '/../assets/img/stone.png')) {
                $image = 'assets/img/stone.png';
            }
            break;
        case 'aqua':
            if(file_exists(__DIR__ . '/../assets/img/aqua.png')) {
                $image = 'assets/img/aqua.png';
            }
            break;
        case 'food':
            if(file_exists(__DIR__ . '/../assets/img/drumstick.png')) {
                $image = 'assets/img/drumstick.png';
            }
            break;
    }
    return $image;
}
