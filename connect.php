<?php
$dbServer = 'localhost';
$dbUser = 'root';
$dbPasswor = null;
$dbName = 'edu_db';

$mysqli = new mysqli($dbServer, $dbUser, $dbPasswor, $dbName );
$mysqli -> set_charset('utf-8');
if (mysqli_connect_errno() ){
	echo 'Błąd połączenia bazy danych';} 
?>