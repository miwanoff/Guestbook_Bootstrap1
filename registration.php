<?php
include_once "dbconnect.php"; // подключение базы данных
include_once "action.php";
if (!isset($_SESSION)) {
	session_start(); // создаем новую сессию или восстанавливаем текущую
}
// формируем строку для создания формы
$str_form = "<form  name='autoForm' action='registration.php' method='post' onSubmit='return overify_login(this);' >
 			 Логин: <input type='text' name='login'>
 			 Пароль: <input type='password' name='pas'>
 			 <input type='submit' name='go' value='Подтвердить'>
 		     </form>";
if (!isset($_POST ['go'])) {
	include "header.php";
	echo $str_form; // распечатываем форму
}
else {
	if (!check_log($_POST ['login'])) { // вызов функции check_log() из action.php для проверки наличия пользователя с таким именем
		if (registration($_POST ['login'], $_POST ['pas'])) {
			include "header.php";
			echo "Вы успешно зарегистрированы!<br/>";
			echo "<a href='index.php'>Просмотр сайта</a><br/>";
			echo "<a href='admin_panel.php'>Войти в административную панель</a><br/>";
		}
	}
	else {
		include "header.php";
		echo $str_form; // распечатываем форму
		echo "Пользователь с таким именем уже существует!";
	}
}
include "footer.php";