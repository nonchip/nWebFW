<?php

function h_request_path()
{
    $web_uri = explode('/', trim(_WEB_PATH, '/'));
    $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
    $parts2 = array_diff_assoc($request_uri, $web_uri);
    $parts = array_diff_assoc($parts, $script_name);
    if (empty($parts))
    {
        return '/';
    }
    $path = implode('/', $parts);
    if (($position = strpos($path, '?')) !== FALSE)
    {
        $path = substr($path, 0, $position);
    }
    return $path;
}
