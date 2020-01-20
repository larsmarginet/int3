<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set('CET');

// basic .env file parsing
if (file_exists("../.env")) {
  $variables = parse_ini_file("../.env", true);
  foreach ($variables as $key => $value) {
    putenv("$key=$value");
  }
}

$routes = array(
  'home' => array(
    'controller' => 'Products',
    'action' => 'index'
  ),
  'detail' => array(
    'controller' => 'Products',
    'action' => 'detail'
  ),
  'detailViewingCopy' => array(
    'controller' => 'Products',
    'action' => 'detailViewingCopy'
  ),
  'favorites' => array(
    'controller' => 'Favorites',
    'action' => 'index'
  ),
  'subscriptions' => array(
    'controller' => 'Subscriptions',
    'action' => 'index'
  ),
  'cart' => array(
    'controller' => 'Orders',
    'action' => 'index'
  ),
  'login' => array(
    'controller' => 'Orders',
    'action' => 'login'
  ),
  'data' => array(
    'controller' => 'Orders',
    'action' => 'data'
  ),
  'payment' => array(
    'controller' => 'Orders',
    'action' => 'payment'
  ),
  'thanks' => array(
    'controller' => 'Orders',
    'action' => 'thanks'
  ),
  'longread' => array(
    'controller' => 'Longread',
    'action' => 'longread'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php?page=home');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
