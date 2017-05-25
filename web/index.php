<?php

// Require dependendies
$loader = require_once __DIR__.'/../vendor/autoload.php';
$loader->addPsr4('Site\\', __DIR__.'/../src/');

// Init Silex
$app = new Silex\Application();
$app['debug'] = true;

// Services
$app
    ->register( new Silex\Provider\TwigServiceProvider(),
    array( 'twig.path' => __DIR__.'/../src/views', ));

$app
    ->register( new Silex\Provider\DoctrineServiceProvider(),
    array(
        'db.options' => array (
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'dbname'    => 'gadelmaleh',
            'user'      => 'root',
            'password'  => 'root',
            'charset'   => 'utf8'
        ),
    ) );

$app['db']->setFetchMode(PDO::FETCH_OBJ);

// Create routes
$app->get('/', function() use ($app)
{

    $data = array();

    $artistModel = new \Site\Models\Artist($app['db']);
    $data['artist'] = $artistModel->getAll();

    return $app['twig']->render('/pages/home.twig', $data);
})
->bind('home');


// Run Silex
$app->run();
