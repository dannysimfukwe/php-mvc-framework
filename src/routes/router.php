<?php

require_once __DIR__.'/../autoload.php';

function get($route, $path_to_include, $action)
{
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		route($route, $path_to_include, $action);
	}
}
function post($route, $path_to_include, $action)
{
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		route($route, $path_to_include, $action);
	}
}
function put($route, $path_to_include, $action)
{
	if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
		route($route, $path_to_include, $action);
	}
}
function patch($route, $path_to_include, $action)
{
	if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
		route($route, $path_to_include, $action);
	}
}
function delete($route, $path_to_include, $action)
{
	if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
		route($route, $path_to_include, $action);
	}
}
function any($route, $path_to_include, $action)
{
	route($route, $path_to_include, $action);
}
function route($route, $path_to_include, $action)
{
	$user_controller = $path_to_include;
	$callback = $path_to_include;
	if (is_callable($callback)) {
		$app = new AppController($user_controller, $action, $params = []);
		$app->fire();
	}
	if ($route == "/404") {
			View::render('system/404');
		exit();
	}
	$request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
	$request_url = rtrim($request_url, '/');
	$request_url = strtok($request_url, '?');
	$route_parts = explode('/', $route);
	$request_url_parts = explode('/', $request_url);
	array_shift($route_parts);
	array_shift($request_url_parts);
	if ($route_parts[0] == '' && count($request_url_parts) == 0) {
		if (is_callable($callback)) {
			call_user_func_array($callback, []);
			exit();
		}
		$app = new AppController($user_controller, $action, $params = []);
		$app->fire();
		exit();
	}
	if (count($route_parts) != count($request_url_parts)) {
		return;
	}
	$parameters = [];
	$args = [];
	for ($__i__ = 0; $__i__ < count($route_parts); $__i__++) {
		$route_part = $route_parts[$__i__];
		if (preg_match("/^[$]/", $route_part)) {
			$route_part = ltrim($route_part, '$');
			array_push($parameters, $request_url_parts[$__i__]);
			$route_part = $request_url_parts[$__i__];

			$data = array(str_replace('$','',$route_parts[$__i__]) => $request_url_parts[$__i__]);
			extract($data);
			$route_parts[$__i__] = $request_url_parts[$__i__];
			array_push($args, $route_parts[$__i__]);

			} else if ($route_parts[$__i__] != $request_url_parts[$__i__]) {

				$int_id = $request_url_parts[$__i__];
				if (preg_match("/^[:id]/", $route_part) && !preg_match('/^\d+$/', $int_id ) ) {
					return die("Invalid id parameter");
				}
				return;
			}
	}
	if (is_callable($callback)) {
		call_user_func_array($callback, $parameters);
		exit();
	}
	$app = new AppController($user_controller, $action, $params = $args);
	$app->fire();
	exit();
}
function out($text)
{
	echo htmlspecialchars($text);
}

function set_csrf()
{
	session_start();
	if (!isset($_SESSION["csrf"])) {
		$_SESSION["csrf"] = bin2hex(random_bytes(50));
	}
	echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}

function is_csrf_valid()
{
	session_start();
	if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
		return false;
	}
	if ($_SESSION['csrf'] != $_POST['csrf']) {
		return false;
	}
	return true;
}
