<?php

session_start();

require '../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' =>true,
        'db' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'pajaros',
            'username'  => 'root',
            'password'  => 'S1st3m45',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ]
]);

$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule){
    return $capsule;
};

$container['HomeController'] = function ($container){
  return new \App\Controllers\HomeController($container);
};

require '../app/routes.php';
