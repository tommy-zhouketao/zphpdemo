<?php
use ZPHP\ZPHP;
$rootPath = dirname(__DIR__);
require $rootPath. DIRECTORY_SEPARATOR. 'vendor'. DIRECTORY_SEPARATOR . 'zphp'. DIRECTORY_SEPARATOR. 'zphp'. DIRECTORY_SEPARATOR. 'ZPHP' . DIRECTORY_SEPARATOR . 'ZPHP.php';
require $rootPath. DIRECTORY_SEPARATOR. 'vendor'. DIRECTORY_SEPARATOR. 'autoload.php';
ZPHP::run($rootPath);
