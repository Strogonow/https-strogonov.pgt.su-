<?php
/*
$hostname = "localhost";
$username = "207526";
$pass = "danilstrogonow228";
$dbName = "php15";
*/
/*
$hostname = "localhost";
$username = "strogonov";
$pass = "Сде250405";
$dbName = "strogonov";
*/

$hostname = "localhost";
$username = "root";
$pass = "";
$dbName = "User"; 


$link = mysqli_connect($hostname, $username, $pass, $dbName);//Подключение к способом mysqli

// Ниже привен код для отладки. Для проверки на наличие ошибки, во время подключение к БД.

/*if($link->connect_error){
die("Ошибка: " . $conn->connect_error);
} 
else{
echo "Подключение успешно установлено";
}*/
?>