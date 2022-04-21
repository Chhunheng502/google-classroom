<?php

if (!function_exists('get_classwork_name')) {
    function get_classwork_name($type)
    {
        return strtolower(substr($type, strrpos($type, "\\", 0) + 1));
    }
}

if (!function_exists('revert_classwork_name')) {
    function revert_classwork_name($type)
    {
        return 'App\\Models\\' . ucfirst($type);
    }
}