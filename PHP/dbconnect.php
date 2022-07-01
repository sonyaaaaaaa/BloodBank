<?php 

$host = "localhost"; 
$username = "root";
$password = "root";
$database = "transfusion_point";
$db = new mysqli($host, $username, $password, $database);

if ($db == false)
{
	echo "Ошибка подключения";
}
?>