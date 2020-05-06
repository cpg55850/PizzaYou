<?php
    // Load Config
    require_once 'config/db.php';
    //Load Helpers
    require_once('helpers/url_helper.php');

    // Autoload Core Libraries
    spl_autoload_register(function($className){
        require_once 'models/' . $className . '.php';
    });