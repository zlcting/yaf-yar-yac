<?php
define('APPLICATION_PATH',  dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
$app  = new \Yaf\Application(APPLICATION_PATH . DS .'conf'. DS .'application.ini');
$app->bootstrap()
->run();