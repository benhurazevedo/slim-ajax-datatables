<?php
use \Slim\App;

// DIC configuration
$container = $app->getContainer();

$container['dbService\connService'] = function ($c)
{
    $conn = new dbService\connService ($c);
    return $conn->getConn();
};

// db service
$container['dbService\ContasDAO'] = function ($c) 
{  
    $ContasDAO = new dbService\ContasDAO($c);
    
    return $ContasDAO;
};

// controller
$container['controllers\api'] = function ($c) 
{
    return new controllers\api($c);
};