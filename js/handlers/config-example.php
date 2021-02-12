<?php

defined('protection') or die('Access denied!');

// Данные от БД MySQL
return [
    'debug' => true, // Показ ошибок - true включено, false отключено
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=admin_sale;charset=utf8',
        'username' => '',
        'password' => '',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,
        ],
    ],
    'mail' => [
        'site' => '',
        'host' => '',
        'port' => 0,
        'username' => '',
        'password' => '',
        'emailTo' => ''
    ],
    'crmUrl' => '',

];