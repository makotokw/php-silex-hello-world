<?php
require_once __DIR__.'/../vendor/autoload.php'; 

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));
$app->get('/', function() {
    return "Hello World!";
});
$app->get('/hello/{name}', function ($name) use($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => $name,
    ));
});
$app->run();