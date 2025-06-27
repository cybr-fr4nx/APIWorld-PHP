<?php
define('BASE_URL', '/TAREA5/'); 

function base_url($path = '') {
    $path = trim($path, '/');
    return BASE_URL . $path;
}
