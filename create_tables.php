<?php
include_once "dbconnect.php";
try {		
	$conn->query("SET NAMES utf8");
	$conn->query("SET CHARACTER SET utf8");
	if(!$conn->query ("CREATE TABLE IF NOT EXISTS GBookTable (id INT NOT NULL AUTO_INCREMENT, username VARCHAR (100), date DATETIME, message TEXT, PRIMARY KEY (id))"))
		throw new Exception('Ошибка создания таблицы GBookTable: [' . $conn->error . ']');
	if(!$conn->query("CREATE TABLE  IF NOT EXISTS Users (user_id INT NOT NULL AUTO_INCREMENT, log VARCHAR(255), pas  VARCHAR(255), PRIMARY KEY (user_id))"))
		throw new Exception('Ошибка создания таблицы Users: [' . $conn->error . ']');
	if(!$conn->query("INSERT INTO Users (log, pas) VALUES ('pit', '123')"))
		throw new Exception('Ошибка заполнения таблицы Users: [' . $conn->error . ']');
	echo "Таблицы Users и GBookTable созданы успешно";
	$conn->close();
}
catch (Exception $e) {
	$e->getMessage();
}