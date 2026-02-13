<?php

use app\controllers\ApiProductController;
use app\controllers\AdminController;
use app\controllers\UserController;
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

	// ADMIN
	// $router->get('/admin/dashboard', function() use ($app) {
	// 	$app->render('dashboard');
	// });
	// $router->get('/admin/categories', function() use ($app) {
	// 	$app->render('admin_categories');
	// });
	// $router->get('/admin/echanges', function() use ($app) {
	// 	$app->render('admin_echanges');
	// });
	// $router->get('/admin/users', function() use ($app) {
	// 	$app->render('admin_users');
	// });
	$router->get('/admin/dashboard', function() use ($app) {
		$admin = new AdminController($app->db());
		$app->render('admin_layout', [
			'page' => 'dashboard', 
			'title' => 'Dashboard', 
			'userCount' => $admin->countUsers(),
			'echangesFinisCount' => $admin->countEchangesFinis(),
			'objetCount' => $admin->countObjets()
		]);
	});

	$router->get('/admin/categories', function() use ($app) {
		$admin = new AdminController($app->db());
		$app->render('admin_layout', [
			'page' => 'admin_categories', 
			'title' => 'Gestion Catégories',
			'categories' => $admin->getAllCategories(),
			'nombre_objets_cat' => $admin->getNombreObjetsParCategorie()
		]);
	});
	$router->post('/admin/categories/create', [AdminController::class, 'createCategorie']);

	$router->get('/admin/echanges', function() use ($app) {
		$app->render('admin_layout', ['page' => 'admin_echanges', 'title' => 'Gestion Echanges']);
	});
	$router->get('/admin/users', function() use ($app) {
		$app->render('admin_layout', ['page' => 'admin_users', 'title' => 'Gestion Utilisateurs']);
	});



	$router->get('/home', function() use ($app) {
		$app->render('home');
	});

	$router->get('/profile', function() use ($app) {
		$app->render('profile');
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
		$app->render('shop');
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