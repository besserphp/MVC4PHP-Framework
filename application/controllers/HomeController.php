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
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class HomeController
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourdomain/HomeController/index (which is the default page btw)
     */
    public function indexAction()
    {
        // load views
        require ROOT . URL_PUBLIC_FOLDER . '/layout/header.php';
        require APP . 'views/home/index.php';
        require ROOT . URL_PUBLIC_FOLDER . '/layout/footer.php';
    }
}
