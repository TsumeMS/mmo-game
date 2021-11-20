<?php

function getResources()
{
    $path = 'tmp/users/' . $_SESSION['user'] . '/resources.json';
    if(file_exists($path)) {
        return json_decode(file_get_contents($path));
    }
    return config('default.resources');
}
