<?php
// Services
$app
    ->register( new Silex\Provider\TwigServiceProvider(),
    array( 'twig.path' => __DIR__.'/../../src/views', ));

$app
    ->register( new Silex\Provider\DoctrineServiceProvider(),
    array(
        'db.options' => array (
            'driver'    => 'pdo_mysql',
            'host'      => $app['config']['db_host'],
            'dbname'    => $app['config']['db_name'],
            'user'      => $app['config']['db_user'],
            'password'  => $app['config']['db_pass'],
            'charset'   => 'utf8'
        ),
    ) );

$app['db']->setFetchMode(PDO::FETCH_OBJ);
