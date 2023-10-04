<?php

define('ROOT_DIR', __DIR__ . '/');

require_once 'public/bootstrap.php';
//require_once ROOT_DIR . 'src/router/PageRouter.php';
require_once ROOT_DIR . 'src/cores/Application.php';
require_once ROOT_DIR . 'src/controllers/UserSiteController.php';

use cores\Application;

$app = Application::getInstance();

$app->on(Application::EVENT_BEFORE_REQUEST, function () {
//    echo "Before request event is triggered";
});

$userSiteController = \controllers\UserSiteController::getInstance();

$app->router->get('/', [\controllers\UserSiteController::class, 'home']);
$app->router->get('/login', [$userSiteController->getLoginController()::class, 'login']);
$app->router->post('/login', [$userSiteController->getLoginController()::class, 'login']);
$app->router->get('/logout', [$userSiteController->getLogoutController()::class, 'logout']);
$app->router->get('/register', [$userSiteController->getRegisterController()::class, 'register']);
$app->router->post('/register', [$userSiteController->getRegisterController()::class, 'register']);
$app->router->get('/homeAdmin', [\controllers\AdminSiteController::class, 'homeAdmin']);


$app->run();

echo $app->controller;

//set router default to login
if ($_SERVER['REQUEST_URI'] === '/' && $_SESSION['user_id'] === null) {
    header('Location: /login');
}

//$viewRoutes = array(
//    '/' => ROOT_DIR . 'public/pages/index.php',
//
//    '/add-album' => ROOT_DIR . 'public/views/AddAlbum.php',
//    '/add-song' => ROOT_DIR . 'public/views/AddSong.php',
//);
//
//$router = new \router\PageRouter($viewRoutes, ROOT_DIR . 'public/pages/404.php');
//$router->routing($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);