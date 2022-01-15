<?php

function getProduction()
{
    $path = 'tmp/users/' . $_SESSION['user'] . '/buildings.json';
    if(file_exists($path)) {
        $data = json_decode(file_get_contents($path));
        return objToArray($data);
    }
    return config('default.production');
}
