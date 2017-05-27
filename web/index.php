<?php

// Require dependendies
$loader = require_once __DIR__.'/../vendor/autoload.php';
$loader
    ->addPsr4('Site\\', __DIR__.'/../src/');

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

$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());

// Create routes
$app->get('/', function() use ($app)
{
    $data = array();

    $artistModel = new \Site\Models\Artist($app['db']);
    $data['artist'] = $artistModel->getAll();

    return $app['twig']->render('/pages/home.twig', $data);
})
->bind('home');

$app->get('/date', function() use ($app)
{
    return $app['twig']->render('/pages/date.twig');
})
->bind('date');

$app->get('/films', function() use ($app)
{
    return $app['twig']->render('/pages/films.twig');
})
->bind('films');

$app->get('/spectacles', function() use ($app)
{
    return $app['twig']->render('/pages/spectacles.twig');
})
->bind('spectacles');

$app->get('/dubbing', function() use ($app)
{
    return $app['twig']->render('/pages/dubbing.twig');
})
->bind('dubbing');

$app->get('/shortfilms', function() use ($app)
{
    return $app['twig']->render('/pages/shortfilms.twig');
})
->bind('shortfilms');


// Run Silex
$app->run();
