<?php
require 'vendor/autoload.php';

// Example Implementation Twig Template Engine
$loader = new Twig_Loader_Filesystem('./templates/');
$twig = new Twig_Environment($loader);

// Example Implementation Mustache Template Engine
$mustache = new Mustache_Engine([
  'loader' => new Mustache_Loader_FilesystemLoader('./templates')
]);

$app = new \Slim\Slim();

// Use Twig

$app->get('/', function () use ($twig) {
  echo $twig->render('home.html');
});

$app->get('/user/:username', function ($username) use ($twig) {
  echo $twig->render('user.html', compact('username'));
});



// Use Mustache
$app->get('/user2/:username', function ($username)  use ($mustache) {
  $tpl = $mustache->loadTemplate('user');
  echo $mustache->loadTemplate('user')
                ->render(compact('username'));
});

$app->run();
