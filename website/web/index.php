<?php

use livio\Controller;
use livio\Factory;

error_reporting(E_ALL);

session_start();
require_once("../vendor/autoload.php");
$config = parse_ini_file(__DIR__ . "/../config.ini", true);
$factory = new Factory($config);
$tmpl = $factory->getTemplateEngine();
$pdo = $factory->getPDO();
$loginService = $factory->getLoginService();
$homepageService = $factory->getHomepageService();

switch($_SERVER["REQUEST_URI"]) {	
	case "testroute":
		echo "Test skrrt";
		break;
	case "/":
		$ctr = new Controller\IndexController($tmpl, $homepageService, $pdo);
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(array_key_exists('like',$_POST)){
				$ctr->like($_POST);
			}
		}
		$ctr->homepage();
		break;
	case "/login":
		$ctr = new Controller\LoginController($tmpl, $loginService);
		if($_SERVER["REQUEST_METHOD"] == "GET")
		{
			$ctr->showLogin();
		}
		else
		{
			$ctr->login($_POST);
		}
		break;
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			(new livio\Controller\IndexController($tmpl))->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

