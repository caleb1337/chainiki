<?php
if(isset($_GET['route']))
{
    $route = $_GET['route'];

    switch ($route) {
        case '':
            require 'views/main.php';
            break;
            
        default:
            require 'views/404.php';
            break;

    };
}else{
    require 'views/main.php';
};