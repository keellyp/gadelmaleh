<?php
// Use
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

// Homepage
$app
    ->match('/', function(Request $request) use ($app)
    {
        // Get datas from model
        $databaseModel = new \Site\Models\Database($app['db']);
        $data['fewFilms'] = $databaseModel->getFew("cinema");
        $data['fewSpectacles'] = $databaseModel->getFew("onemanshow");
        $data['fewDubbings'] = $databaseModel->getFew("dubbing");
        $data['fewShort'] = $databaseModel->getFew("shortfilm");

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
            $first_year = 1999;
            $current_year = date('Y');

            // Handle error if the date does not exist, else get datas
            ($date < $first_year || $date > $current_year) ? $app->abort(404) : $joinsModel = new \Site\Models\Joins($app['db']);

            $data['date'] = $date;
            $data['contents'] = $joinsModel->getByDate($date);

            // Handle error if there is no content at this date
            empty($data['contents']) ? $data['error'] = true : $data['error'] = false;

            return $app['twig']->render('/pages/date.twig', $data);
        })
        ->assert('date', '\d+')
        ->bind('date');

// Create route for films
$app
    ->get('/films', function() use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['films'] = $databaseModel->getAll("cinema");

        return $app['twig']->render('/pages/films.twig', $data);
    })
    ->bind('films');
$app
    ->get('/film/{id}', function($id) use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['content'] = $databaseModel->getContentById('cinema', $id);

        return $app['twig']->render('/pages/film.twig', $data);
    })
    ->assert('id', '\d+')
    ->bind('film');


// Create route for spectacles
$app
    ->get('/spectacles', function() use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['spectacles'] = $databaseModel->getAll("onemanshow");

        return $app['twig']->render('/pages/spectacles.twig', $data);
    })
    ->bind('spectacles');
$app
    ->get('/spectacle/{id}', function($id) use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['content'] = $databaseModel->getContentById('onemanshow', $id);

        return $app['twig']->render('/pages/spectacle.twig', $data);
    })
    ->assert('id', '\d+')
    ->bind('spectacle');


// Create route for dubbings
$app
    ->get('/dubbings', function() use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['dubbings'] = $databaseModel->getAll("dubbing");

        return $app['twig']->render('/pages/dubbings.twig', $data);
    })
    ->bind('dubbings');
$app
    ->get('/dubbing/{id}', function($id) use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['content'] = $databaseModel->getContentById('dubbing', $id);

        return $app['twig']->render('/pages/dubbing.twig', $data);
    })
    ->assert('id', '\d+')
    ->bind('dubbing');


// Create route for shortfilms
$app
    ->get('/shortfilms', function() use ($app)
    {
        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['shortfilms'] = $databaseModel->getAll("shortfilm");

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

        $data = array();

        $databaseModel = new \Site\Models\Database($app['db']);
        $data['content'] = $databaseModel->getContentById('shortfilm', $id);

        return $app['twig']->render('/pages/shortfilm.twig', $data);
    })
    ->assert('id', '\d+')
    ->bind('shortfilm');
$app
    ->before(function() use ($app)
    {
        $databaseModel = new \Site\Models\Database($app['db']);
        $app['twig']
            -> addGlobal( 'countFilms', $databaseModel->countAll("cinema") );
        $app['twig']
            -> addGlobal( 'countSpectacles', $databaseModel->countAll("onemanshow") );
        $app['twig']
            -> addGlobal( 'countDubbings', $databaseModel->countAll("dubbing") );
        $app['twig']
            -> addGlobal( 'countShortfilms', $databaseModel->countAll("shortfilm") );
    });

// // Error
// $app
//     ->error(function() use ($app)
//     {
//         $data = array();
//         $data['error'] = true;
//         return $app['twig']->render('pages/error.twig', $data);
//     });
