<?php

require_once "./core/function.php";
require_once "./core/data.php";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
	<title>Редактировать заявку</title>
</head>

<body class="main-page update-page update">
	<div class="wrapper">
		<header class="update-header header">
			<div class="container">
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
		<main class="update-content">
			<div class="container">
				<h1 class="update-title title">Форма редактирования предварительной заявки на социально-реабилитационную смену в Центр социальной реабилитации подростков, склонных к девиантному поведению и употреблению психоактивных веществ (ЦСРП)</h1>
				<p class="required-field">Поля, обозначенные &#42; обязательны к заполнению</p>
				<form class="form-update form col-6" name="update" id="update" autocomplete="off">
					<input class="form-field" type="hidden" name="id" value="<?php echo $query[0]['id'] ?>">
					<div class="input-group">
						<div class="input-item col-3">
							<label class="input-title" for="full-name">Ф.И.О. подростка<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="full-name" id="full-name" value="<?php echo $query[0]['full_name'] ?>">
							<p class="input-error"></p>
						</div>
						<div class="input-item col-1">
							<label class="input-title" for="date-of-birth">Дата рождения<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="date-of-birth" id="date-of-birth" value="<?php echo $query[0]['date_of_birth'] ?>">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-3">
							<label class="input-title" for="area">Район проживания<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="area" id="area" value="<?php echo $query[0]['area'] ?>">
							<p class="input-error"></p>
						</div>
						<div class="input-item col-3">
							<label class="input-title" for="locality">Населенный пункт<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="locality" id="locality" value="<?php echo $query[0]['locality'] ?>">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-4">
							<label class="input-title" for="school">Место учебы<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="school" id="school" value="<?php echo $query[0]['school'] ?>">
							<p class="input-error"></p>
						</div>
						<div class="input-item col-0">
							<label class="input-title" for="school-class">Класс<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="school-class" id="school-class" value="<?php echo $query[0]['school_class'] ?>">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-6">
							<label class="input-title" for="status">Социальный и семейный статус<span class="input-required">&#42;</span></label>
							<textarea class="form-field form-input" type="text" name="status" id="status"><?php echo $query[0]['status'] ?></textarea>
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-6">
							<label class="input-title" for="petition">Направляющая организация<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="petition" id="petition" value="<?php echo $query[0]['petition'] ?>">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-4">
							<label class="input-title" for="contact-person">Контактное лицо<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="contact-person" id="contact-person" value="<?php echo $query[0]['contact_person'] ?>">
							<p class="input-error"></p>
						</div>
						<div class="input-item col-2">
							<label class="input-title" for="tel">Контактный телефон<span class="input-required">&#42;</span></label>
							<input class="form-field form-input" type="text" name="tel" id="tel" value="<?php echo $query[0]['tel'] ?>">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="form-update-button">
						<button class="button form-button form-button-update form-button--blue" type="submit" name="update-form" id="button-update">Редактировать</button>
					</div>
				</form>
			</div>
			<div class="message-submit">
				<div class="container">
					<div class="message-wrap col-6">
						<p class="message-text"></p>
					</div>
				</div>
			</div>
		</main>
		<footer class="footer">
			<div class="container"></div>
		</footer>
	</div>

	<script src="/js/function.js"></script>
	<script src="/js/update.js"></script>
</body>

</html>