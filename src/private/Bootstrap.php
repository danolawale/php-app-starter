<?php

ob_start(); // turn on output buffering

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("SITE_ROOT", $doc_root);

require_once('Config.php');

$startUpFiles = [
    PROJECT_PATH . '/Library/Model/Adapter/MysqlPdoAdapter.php',
    PROJECT_PATH . '/Library/Model/Adapter/WebAdapter.php',
    PROJECT_PATH . '/Library/Model/Repository.php',
];

foreach($startUpFiles as $file)
{
    require_once($file);
}


$mysqlPdoAdapter = new \Library\Model\Adapter\MysqlPdoAdapter(DB_HOST, DB_NAME, DB_USER, DB_PASS);
$webAdapter = new \Library\Model\Adapter\WebAdapter($mysqlPdoAdapter);

\Library\Model\Repository::setAdapter($webAdapter);