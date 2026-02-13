<?php

use app\controllers\ApiProductController;
use app\controllers\UserController;
use app\controllers\EchangeController;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function(Router $router) use ($app) {

	// $router->get('/', function() use ($app) {
	// 	$app->render('welcome', [ 'message' => 'You are gonna do great things!' ]);
	// });

	$router->get('/', function() use ($app) {
		$app->render('index');
	});

	$router->get('/login', function() use ($app) {
		$controller = new UserController($app->db());
		$controller->showLogin();
	});

	$router->post('/auth/login', function () use ($app){
		$controller = new UserController($app->db());
		$controller->login();
	});

	$router->get('/home', function() use ($app) {
		$app->render('modele', ['page' => 'home', 'title'=> 'home']);
	});

	$router->get('/profile/@id', function($id) use ($app) {
		$controller = new UserController($app->db());
		$user = $controller->findById($id);
		$app->render('profile', ['user'=> $user]);
	});

	$router->get('/register', function() use ($app) {
		$controller = new UserController($app->db());
		$controller->showRegister();
	});

	$router->post('/auth/register', function () use ($app){
		$controller = new UserController($app->db());
		$controller->register();
	}); 

	$router->get('/shop', function() use ($app) {
		$app->render('modele', ['page' => 'shop', 'title'=> 'shop']);
	});

	$router->get('/propositions', function() use ($app) {
		$controller = new EchangeController($app->db());
		$controller->propositions();
	});

	$router->post('/echange/create', function() use ($app) {
		$controller = new EchangeController($app->db());
		$controller->create();
	});

	$router->post('/echange/accepter', function() use ($app) {
		$controller = new EchangeController($app->db());
		$controller->accepter();
	});

	$router->post('/echange/refuser', function() use ($app) {
		$controller = new EchangeController($app->db());
		$controller->refuser();
	});

	$router->get('/produit/@id', function($id) use ($app) {
		$app->render('produit', ['id' => $id]);
	});

	$router->get('/hello-world/@name', function($name) {
		echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
	});

	// $router->group('/api', function() use ($router) {
	// 	$router->get('/users', [ ApiExampleController::class, 'getUsers' ]);
	// 	$router->get('/users/@id:[0-9]', [ ApiExampleController::class, 'getUser' ]);
	// 	$router->post('/users/@id:[0-9]', [ ApiExampleController::class, 'updateUser' ]);
	// });
	
}, [ SecurityHeadersMiddleware::class ]);