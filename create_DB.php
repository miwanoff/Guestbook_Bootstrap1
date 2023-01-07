<?php
include_once "config.php";
try{
	$conn = new mysqli( SERVERNAME, USERNAME, PASSWORD);
	if($conn->connect_error){
		throw new Exception('Ошибка соединения с MySQL сервером: [' . $conn->connect_error . ']');
	}
	if(!$conn->query ("CREATE DATABASE IF NOT EXISTS ".DBNAME." CHARACTER SET utf8 COLLATE utf8_general_ci"))
		throw new Exception('Ошибка создания базы данных: [' . $conn->error . ']');
	echo "База данных создана успешно";
	$conn->close();
}
catch (Exception $e) {
	echo $e->getMessage();
}