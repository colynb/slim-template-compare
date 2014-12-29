<?php
require 'vendor/autoload.php';
require 'UrlLogMiddleware.php';
require 'RedisSessionHandler.php';

// Example Implementation Twig Template Engine
$loader = new Twig_Loader_Filesystem('./templates/');
$twig = new Twig_Environment($loader);

session_set_save_handler(new RedisSessionHandler(new Predis\Client()));
session_start();

$app = new \Slim\Slim();
$app->add(new UrlLogMiddleware());

// Homepage
$app->get('/', function () use ($twig) {
	if (isset($_SESSION['user'])) {
		$user = (Object) json_decode($_SESSION['user']);
	}
	echo $twig->render('home.html', compact('user'));
});

$app->get('/login', function () use ($app) {
	$_SESSION['user'] = json_encode(['username' => 'colyn']);
	$app->redirect('/');
});

$app->get('/logout', function () use ($app) {
	unset($_SESSION['user']);
	$app->redirect('/');
});

$app->get('/user/:username', function ($username) use ($twig) {
	echo $twig->render('user.html', compact('username'));
});

$app->run();
