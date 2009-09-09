<?php
require_once '../paths.php';

// This mini app is in the install/ directory.
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__)));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Needs to check the 'install/models' directory.
set_include_path(APPLICATION_PATH . '/models' . PATH_SEPARATOR . get_include_path());

/** Zend_Application */
require_once 'Zend/Application.php';  

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV, 
    APPLICATION_PATH . '/application.ini'
);


$application->getBootstrap()->bootstrap(array('FrontController', 'Layout'))->run();