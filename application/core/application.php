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
 * Class Application
 * This is for Application
 * Please note: Application and URL's Setting
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 */
class Application {

    // @var null The controllers
    private $url_controllers = null;
    // @var null The method (of the above controllers), often also named "action"
    private $url_action = null;
    // @var array URL parameters
    private $url_params = array();

    public function __construct() {

        // create array with URL parts in $url
        $this->splitUrl();

        // check for controllers: no controllers given ? then load start-page
        if (!$this->url_controllers) {

            require APP . 'controllers/HomeController.php';
            $page = new HomeController();
            $page->indexAction();
        } elseif (file_exists(APP . 'controllers/' . $this->url_controllers . '.php')) {
            // here we did check for controllers: does such a controllers exist ?
            // if so, then load this file and create this controllers
            // example: if controllers would be "car", then this line would translate into: $this->car = new car();
            require APP . 'controllers/' . $this->url_controllers . '.php';
            $this->url_controllers = new $this->url_controllers();

            // check for method: does such a method exist in the controllers ?
            if (method_exists($this->url_controllers, $this->url_action)) {

                if (!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controllers, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controllers->{$this->url_action}();
                }
            } else {
                if (strlen($this->url_action) == 0) {
                    // no action defined: call the default index() method of a selected controllers
                    $this->url_controllers->index();
                } else {
                    header('location: ' . URL . 'ErrorController');
                }
            }
        } else {
            header('location: ' . URL . 'ErrorController');
        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl() {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controllers = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controllers and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            // for debugging. uncomment this if you have problems with the URL
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';        
        }
    }

}
