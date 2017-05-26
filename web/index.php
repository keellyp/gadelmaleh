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

    // Create builder
    $formBuilder = $app['form.factory']->createBuilder();

    // Set method and action
    $formBuilder->setMethod('get');
    $formBuilder->setAction($app['url_generator']->generate('home'));

    // Add input
    $formBuilder->add('name', Symfony\Component\Form\Extension\Core\Type\TextType::class);
    $formBuilder->add('submit', Symfony\Component\Form\Extension\Core\Type\SubmitType::class);

    // Create form
    $form = $formBuilder->getForm();

    // Send the form to the view
    $data['contact_form'] = $form->createView();

    $artistModel = new \Site\Models\Artist($app['db']);
    $data['artist'] = $artistModel->getAll();

    return $app['twig']->render('/pages/home.twig', $data);
})
->bind('home');


// Run Silex
$app->run();
