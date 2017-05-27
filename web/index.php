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

// Create route for home
$app
    ->get('/', function() use ($app)
    {
        return $app['twig']->render('/pages/home.twig');
    })
    ->bind('home');


// Create route for films
$app
    ->get('/films', function() use ($app)
    {
        $data = array();

        $cinemaModel = new \Site\Models\Cinema($app['db']);
        $data['films'] = $cinemaModel->getAll();

        return $app['twig']->render('/pages/films.twig', $data);
    })
    ->bind('films');
$app
    ->get('/film/{id}', function($id) use ($app)
    {
        $data = array();

        return $app['twig']->render('/pages/film.twig', $data);
    })
    ->assert('id', '\d+')
    ->bind('film');


// Create route for spectacles
$app
    ->get('/spectacles', function() use ($app)
    {
        $data = array();

        $spectacleModel = new \Site\Models\Spectacle($app['db']);
        $data['spectacles'] = $spectacleModel->getAll();

        return $app['twig']->render('/pages/spectacles.twig', $data);
    })
    ->bind('spectacles');
$app
    ->get('/spectacle/{id}', function($id) use ($app)
    {
        return $app['twig']->render('/pages/spectacle.twig');
    })
    ->assert('id', '\d+')
    ->bind('spectacle');


// Create route for dubbings
$app
    ->get('/dubbings', function() use ($app)
    {
        $data = array();

        $dubbingModel = new \Site\Models\Dubbing($app['db']);
        $data['dubbings'] = $dubbingModel->getAll();

        return $app['twig']->render('/pages/dubbings.twig', $data);
    })
    ->bind('dubbings');
$app
    ->get('/dubbing/{id}', function($id) use ($app)
    {
        $data = array();

        return $app['twig']->render('/pages/dubbing.twig', $data);
    })
    ->assert('id', '\d+')
    ->bind('dubbing');


// Create route for shortfilms
$app
    ->get('/shortfilms', function() use ($app)
    {
        $data = array();

        $shortfilmModel = new \Site\Models\Shortfilm($app['db']);
        $data['shortfilms'] = $shortfilmModel->getAll();

        return $app['twig']->render('/pages/shortfilms.twig', $data);
    })
    ->bind('shortfilms');

$app
    ->get('/shortfilm/{id}', function($id) use ($app)
    {
        return $app['twig']->render('/pages/shortfilm.twig');
    })
    ->assert('id', '\d+')
    ->bind('shortfilm');


// Run Silex
$app->run();
