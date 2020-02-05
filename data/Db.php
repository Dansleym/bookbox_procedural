<?php
require_once('db_params.php');
function getConnection()
{
    $paramsPath = __DIR__ . '/db_params.php';
    $params = include($paramsPath);
    $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']}";    
    $db = new PDO($dsn, $params['user'], $params['password']);
    $db->exec('set names utf8');

    return $db;
}