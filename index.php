<?php

require_once "./core/function.php";
require_once "./core/data.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = connectionDataBase();

if(isset($_GET["route"]) and trim($_GET["route"]) !== "") {
	$route = trim($_GET["route"]);
}

$route = explodeURL($route);

switch ($route) {
	case ($route[0] == ""):
		require_once "index.html";
		break;
	case ($route[0] == "login"):
		require_once "login.html";
		break;
	case ($route[0] == "admin"):
		if(!isset($_COOKIE["user"]) or $_COOKIE["user"] == "") {
			require_once "login.html";
			exit;
		} else {
			$query = selectDataBase("SELECT * FROM application");
			require_once "admin.php";
			exit;
		}
		break;
	case ($route[0] == "update"):
		if(!isset($_COOKIE["user"]) or $_COOKIE["user"] == "") {
			require_once "login.html";
			exit;
		} elseif (isset($route[1]) and trim($route[1]) !== "") {
			$id = $route[1];
			$query = selectDataBase("SELECT * FROM application WHERE id='" . $id . "'");
			require_once "update.php";
			exit;
		}
		break;
	default:
	require_once "error.html";
		break;
}
