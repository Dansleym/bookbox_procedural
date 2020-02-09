<?php
require_once('db_params.php');
function getConnection()
{
    $dsn = "mysql:host=" . HOST . "; dbname=" . DBNAME . "";    
    $db = new PDO($dsn, USER, PASSWORD);
    $db->exec('set names utf8');

    return $db;
}