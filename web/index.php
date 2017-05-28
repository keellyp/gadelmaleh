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

// Use

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

// MIDDLEWARE
$app
    ->before(function() use ($app)
    {
        // Get models
        $cinemaModel = new \Site\Models\Cinema($app['db']);
        $spectacleModel = new \Site\Models\Spectacle($app['db']);
        $dubbingModel = new \Site\Models\Dubbing($app['db']);
        $shortfilmModel = new \Site\Models\Shortfilm($app['db']);


        // Count contents for footer

        $data = array();
        $data['countFilms'] = $cinemaModel->countAll();
        $data['countSpectacles'] = $spectacleModel->countAll();
        $data['countDubbings'] = $dubbingModel->countAll();
        $data['countShortfilms'] = $shortfilmModel->countAll();

        $app['twig']-> addGlobal('countFilms', $data['countFilms']);
        $app['twig']-> addGlobal('countSpectacles', $data['countSpectacles']);
        $app['twig']-> addGlobal('countDubbings', $data['countDubbings']);
        $app['twig']-> addGlobal('countShortfilms', $data['countShortfilms']);
    });

// Create route for home page
$app
    ->match('/', function(Request $request) use ($app)
    {
        // Get models
        $cinemaModel = new \Site\Models\Cinema($app['db']);
        $spectacleModel = new \Site\Models\Spectacle($app['db']);
        $dubbingModel = new \Site\Models\Dubbing($app['db']);
        $shortfilmModel = new \Site\Models\Shortfilm($app['db']);


        // Get few content

        $data = array();

        $data['fewFilms'] = $cinemaModel->getFew();
        $data['fewSpectacles'] = $spectacleModel->getFew();
        $data['fewDubbings'] = $dubbingModel->getFew();
        $data['fewShort'] = $shortfilmModel->getFew();


        // FORM
        // Create builder
        $formBuilder = $app['form.factory']->createBuilder();
        $formBuilder
            ->setMethod('get')
            ->add('year', ChoiceType::class, array(
                'placeholder' => 'Choose a year',
                'choices' => array
                (
                    '1999' => '1999',
                    '2000' => '2000',
                    '2001' => '2001',
                    '2002' => '2002',
                    '2003' => '2003',
                    '2004' => '2004',
                    '2005' => '2005',
                    '2006' => '2006',
                    '2007' => '2007',
                    '2008' => '2008',
                    '2009' => '2009',
                    '2010' => '2010',
                    '2011' => '2011',
                    '2012' => '2012',
                    '2013' => '2013',
                    '2014' => '2014',
                    '2015' => '2015',
                    '2016' => '2016',
                    '2017' => '2017'
                )
            ))
            ->add('submit', SubmitType::class);

        // Create form
        $form = $formBuilder->getForm();

        // Handle request
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid( ))
        {
            // Get form data
            $form_data = $form->getData();
            return $app->redirect('date/'.$form_data['year']);
        }

        // Send the form to the view
        $data['year_form'] = $form->createView();


        return $app['twig']->render('/pages/home.twig', $data);
    })
    ->bind('home');

    $app
        ->match('/date/{date}', function($date) use ($app)
        {
            if(!$date)
            {
                $app->abort(404);
            }

            $joinsModel = new \Site\Models\Joins($app['db']);

            $data = array();
            $data['date'] = $date;
            $data['contents'] = $joinsModel->getByDate($date);

            return $app['twig']->render('/pages/date.twig', $data);
        })
        ->assert('date', '\d+')
        ->bind('date');

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
        if(!$id)
        {
            $app->abort(404);
        }

        return $app['twig']->render('/pages/shortfilm.twig');
    })
    ->assert('id', '\d+')
    ->bind('shortfilm');


// Run Silex
$app->run();
