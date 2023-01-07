<?php
include_once "dbconnect.php"; // подключение базы данных
include_once "action.php";
if (!isset($_SESSION)) {
	session_start(); // создаем новую сессию или восстанавливаем текущую
}
// формируем строку для создания формы
$str_form = "<form  name='autoForm' action='autorize.php' method='post' onSubmit='return overify_login(this);' >
 			 Логин: <input type='text' name='login'>
 			 Пароль: <input type='password' name='pas'>
 			 <input type='submit' name='go' value='Подтвердить'>
 		     </form>";
if (!isset($_POST ['go'])) {
	include "header.php";
	echo $str_form; // распечатываем форму
}
else {
	if (check_autorize($_POST ['login'], $_POST ['pas'])) // вызов функции check_autorize() из action.php для проверки авторизации
		header("Location: admin_panel.php"); // перенаправляем на страницу secret_info.php
	else {
		include "header.php";
		echo $str_form; // распечатываем форму
		echo "Неверный ввод, попробуйте еще раз<br>";
	}
}
include "footer.php";