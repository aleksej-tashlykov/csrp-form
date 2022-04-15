<?php

require_once "core/function.php";
require_once "core/data.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = connectionDataBase();

if(isset($_GET["route"]) and trim($_GET["route"]) !== "") {
	$route = trim($_GET["route"]);
}

$route = explodeURL($route);

switch ($route) {
	case ($route[0] == ""):
		require_once "template/main.php";
		break;
	case ($route[0] == "login"):
		require_once "template/login.php";
		break;
	case ($route[0] == "admin" and $route[1] === "update" and isset($route[2])):
		if (!isset($_COOKIE["user"]) or $_COOKIE["user"] == "") {
			require_once "template/login.php";
			exit;
		} else {
			$query = selectDataBase("SELECT * FROM application WHERE id=" . $route[2]);
			require_once "template/update.php";
		}
		break;
	case ($route[0] == "admin"):
		if (!isset($_COOKIE["user"]) or $_COOKIE["user"] == "") {
			require_once "template/login.php";
			exit;
		} else {
			$query = selectDataBase("SELECT * FROM application");
			require_once "template/admin.php";
			exit;
		}
		break;
	default:
		require_once "template/error.php";
		break;
}
