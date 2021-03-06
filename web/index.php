<?php
// Require dependendies
$loader = require_once __DIR__.'/../vendor/autoload.php';
$loader
    ->addPsr4('Site\\', __DIR__.'/../src/');

// Config
include("helpers/config.php");

// Init Silex
$app = new Silex\Application();
$app['config'] = $config;
$app['debug'] = $app['config']['debug'];

// Services
include("helpers/services.php");

// Register
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());

// Router
include("helpers/router.php");

// Run Silex
$app->run();
