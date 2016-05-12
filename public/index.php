<?php

/**
 * @package     MVC4PHP
 * @version     1.1.1
 * @link        http://www.mvc4php.com
 * @license     GPL/GNU 3.0 - http://mvc4php.com/license.txt
 * @author      Vedat Yildirim <info@vedatyildirim.com>
 * @copyright   (c) 2014-2016, VEDYWEB (www.vedyweb.com) 
 */

/**
 * ROOT
 * set a constant that holds the project's folder path, like "/var/www/".
 * DIRECTORY_SEPARATOR adds a slash to the end of the path
 */
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

/**
 * APP
 * set a constant that holds the project's "application" folder, like "/var/www/application".
 */
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

if (file_exists(APP . '/config/settings.php')) {
// load application config (error reporting etc.)
    require APP . '/config/settings.php';
}

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
require APP . 'libs/debug.php';

// Database Connection
require APP . 'core/model.php';

// Default Controller
require APP . 'core/controller.php'; 

// Apllication
require APP . 'core/application.php'; 

// start the application
$mvc4php = new Application();
