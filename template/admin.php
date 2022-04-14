<?php

require_once "core/function.php";
require_once "core/data.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$tableHeader = "";
$tableBody = "";

$tableHeader .= "<tr class='header-table__row'>";
foreach ($tableHeaderData as $key => $value) {
	$tableHeader .= "<th class='header-table-cell {$tableHeaderData[$key]["css_class"]}'>{$tableHeaderData[$key]["cell_title"]}</th>";
}
$tableHeader .= "</tr>";


foreach ($query as $key => $value) {
	$tableBody .= "<tr class='body-table-row'>";
	$tableBody .= "<td class='body-table-cell text-center'>". ($key + 1) ."</td>";
	$tableBody .= "<td class='body-table-cell'>{$value["full_name"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>{$value["date_of_birth"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>{$value["area"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>{$value["locality"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>{$value["school"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>{$value["school_class"]}</td>";
	$tableBody .= "<td class='body-table-cell'>{$value["status"]}</td>";
	$tableBody .= "<td class='body-table-cell'>{$value["petition"]}</td>";
	$tableBody .= "<td class='body-table-cell'>{$value["contact_person"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>{$value["tel"]}</td>";
	$tableBody .= "<td class='body-table-cell text-center'>";
	$tableBody .= "<p class='body-table-icon icon-table'>";
	$tableBody .= "<a class='icon-table-update' href='/update/{$value["id"]}' title='Редактировать'></a>";
	$tableBody .= "<button class='button icon-table-delete' type='submit' name='button-delete' data-id='{$value["id"]}' title='Удалить'></button>";
	$tableBody .= "</p>";
	$tableBody .= "</td>";
	$tableBody .= "</tr>";
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
	<title>Список воспитанников</title>
</head>

<body class="main-page admin-page admin">
	<div class="wrapper">
		<header class="admin-header header">
			<div class="container-full">
				<div class="header-wrap">
					<a class="header-logo logo" href="/">
						<img class="logo-icon" src="/image/logo-icon.svg" width="108" height="40" alt="цсрп">
					</a>
					<a class="header-login logout" id="logout">
						<img class="login-icon" src="/image/logout_icon.svg" width="25" height="25" alt="выйти">
						<span class="login-text">Выйти</span>
					</a>
				</div>
			</div>
		</header>
		<main class="admin-content">
			<div class="container-full">
				<h1 class="admin-title title">Предварительный список воспитанников на социально-реабилитационную смену в Центр социальной реабилитации подростков, склонных к девиантному поведнию и употреблению психоактивных веществ (ЦСРП)</h1>
				<table class="user-table table">
					<thead class="table-header header-table">
						<?php echo $tableHeader ?>
					</thead>
					<tbody class="table-body body-table">
					<?php echo $tableBody ?>
					</tbody>
				</table>
			</div>
		</main>
		<footer class="footer">
			<div class="container-full"></div>
		</footer>
	</div>
	<div class="modal visually-hidden">
		<div class="modal-wrap">
				<p class="modal-text">Вы действительно хотите удалить данную запись?</p>
				<div class="modal-buttons">
					<button class="button form-button modal-button modal-button-delete form-button--blue">Удалить</button>
					<button class="button form-button modal-button modal-button-cancel form-button--yellow">Отменить</button>
			</div>
		</div>
	</div>
	<div class="popup visually-hidden">
		<div class="popup-wrap col-6">
			<div class="popup-text"></div>
		</div>
	</div>
	<script src="/js/function.js"></script>
	<script src="/js/admin.js"></script>
</body>

</html>