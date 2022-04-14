<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Форма подачи заявки</title>
	<link rel="stylesheet" href="/css/style.css">
	<link rel="shortcut icon" href="/image/favicon.ico" type="image/x-icon">
</head>

<body class="main-page">
	<div class="wrapper">
		<header class="main-header header">
			<div class="container">
				<div class="header-wrap">
					<a class="header-logo logo" href="/">
						<img class="logo-icon" src="/image/logo-icon.svg" width="108" height="40" alt="цсрп">
					</a>
					<a class="header-login login" href="/login" target="_blank">
						<img class="login-icon" src="/image/login-icon.svg" width="25" height="25" alt="вход">
						<span class="login-text">Войти</span>
					</a>
				</div>
			</div>
		</header>
		<main class="main-content">
			<div class="container">
				<h1 class="main-title title">Форма подачи предварительной заявки на социально-реабилитационную смену в Центр
					социальной
					реабилитации подростков, склонных к девиантному поведению и употреблению психоактивных веществ (ЦСРП)</h1>
				<p class="required-field">Поля, обозначенные &#42; обязательны к заполнению</p>
				<form class="form-application form col-6" name="application" id="application" autocomplete="off">
					<div class="input-group">
						<div class="input-item col-3">
							<label class="input-title" for="full-name">Ф.И.О. подростка<span
									class="input-required">&#42;</span></label>
							<input class="form-field form-input text-field" type="text" name="full-name" id="full-name"
								placeholder="Иванов Иван Иванович">
							<p class="input-error"></p>
						</div>
						<div class="input-item col-1">
							<label class="input-title" for="date-of-birth">Дата рождения<span
									class="input-required">&#42;</span></label>
							<input class="form-field form-input text-field" type="text" name="date-of-birth" id="date-of-birth"
								maxlength="10" placeholder="01.01.2007">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-3">
							<p class="input-title">Район проживания<span class="input-required">&#42;</span></p>
							<div class="select-group">
								<select class="form-field select-field" name="area" id="area">
									<option value="" selected disabled>Выберите район проживания</option>
								</select>
							</div>
							<p class="input-error"></p>
						</div>
						<div class="input-item col-3">
							<p class="input-title">Населенный пункт<span class="input-required">&#42;</span></p>
							<div class="select-group">
								<select class="form-field select-field" name="locality" id="locality"></select>
							</div>
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-4">
							<p class="input-title">Место учебы<span class="input-required">&#42;</span></p>
							<div class="select-group">
								<select class="form-field select-field" name="school" id="school"></select>
							</div>
							<p class="input-error"></p>
						</div>
						<div class="input-item col-2">
							<p class="input-title">Класс<span class="input-required">&#42;</span></p>
							<div class="select-group">
								<select class="form-field select-field" name="school-class" id="school-class">
									<option value="" selected disabled>Выберите класс</option>
									<option value="7">7 класс</option>
									<option value="8">8 класс</option>
								</select>
							</div>
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-6">
							<label class="input-title" for="status">Социальный и семейный статус<span
									class="input-required">&#42;</span></label>
							<textarea class="form-field form-input text-field" name="status" id="status"
								placeholder="Краткая характеристика семьи и личности подростка"></textarea>
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-6">
							<label class="input-title" for="petition">Направляющая организация<span
									class="input-required">&#42;</span></label>
							<input class="form-field form-input text-field" type="text" name="petition" id="petition"
								placeholder="Название организации">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="input-group">
						<div class="input-item col-4">
							<label class="input-title" for="contact-person">Контактное лицо<span
									class="input-required">&#42;</span></label>
							<input class="form-field form-input text-field" type="text" name="contact-person" id="contact-person"
								placeholder="Ф.И.О. контактного лица">
							<p class="input-error"></p>
						</div>
						<div class="input-item col-2">
							<label class="input-title" for="tel">Контактный телефон<span class="input-required">&#42;</span></label>
							<input class="form-field form-input text-field" type="tel" name="tel" id="tel"
								placeholder="8___ ___-__-__">
							<p class="input-error"></p>
						</div>
					</div>
					<div class="form-application-buttons">
						<button class="button form-button form-button-send form-button--blue" type="submit" name="send-form"
							id="button-submit">Подать
							заявку</button>
						<button class="button form-button form-button-reset form-button--yellow" type="reset" name="reset-form"
							id="button-reset">Удалить
							заявку</button>
					</div>
				</form>
				<div class="message-submit">
					<div class="container">
						<div class="message-wrap col-6">
							<p class="message-text"></p>
						</div>
					</div>
				</div>
			</div>
		</main>
		<footer class="main-footer footer">
			<div class="container"></div>
		</footer>
	</div>
	<script src="/js/function.js"></script>
	<script src="/js/script.js"></script>
</body>

</html>