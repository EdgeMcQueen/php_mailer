<?php

defined('protection') or die('Access denied!');

header('Content-type: text/html; charset=utf-8');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));

$config = require ROOT . DS . 'config.php';

if($config['debug']) {
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', true);
    ini_set('display_startup_errors', true);
} else {
    ini_set('error_reporting', false);
    ini_set('display_errors', false);
    ini_set('display_startup_errors', false);
}

// try {
//     $db = new PDO(
//         $config['db']['dsn'],
//         $config['db']['username'],
//         $config['db']['password'],
//         $config['db']['options']
//     );

// } catch(PDOException $exception) {
//     exit('Connection failed: ' . $exception->getMessage());
// }

require ROOT .  DS . 'system' . DS . 'functions.php';