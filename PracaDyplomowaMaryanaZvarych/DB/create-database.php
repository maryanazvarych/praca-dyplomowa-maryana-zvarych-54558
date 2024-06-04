<!DOCTYPE HTML>
<html lang="pl">
<head>
    <title>Puchata przystań</title>
</head>
<body>

	<?php
	require_once "credentials.php";

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

	if ($conn->connect_error) {
		die("MySQL Connection failed: " . $conn->connect_error);
	}
	?> 

	<?php
	
	$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating database: " . $conn->error;
	}

	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	?> 
 
  	<?php
  
	$sql = "CREATE TABLE IF NOT EXISTS blog (
		id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		filename VARCHAR(255) NOT NULL,
		title VARCHAR(255) NOT NULL, 
		content TEXT NOT NULL,
		reg_date TIMESTAMP
	)";
	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating table blog: " . $conn->error;
	} 

	$sql = "CREATE TABLE IF NOT EXISTS zwierzeta (
		id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		filename VARCHAR(255) NOT NULL,
		imie VARCHAR(255) NOT NULL,
		rasa VARCHAR(255) NOT NULL,
		wiek DECIMAL(5,1) NOT NULL,
		plec VARCHAR(50) NOT NULL,
		waga DECIMAL(5,2) NOT NULL,
		historia TEXT NOT NULL,
		galeria_zdjec TEXT NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating table zwierzeta: " . $conn->error;
	}

	$sql = "CREATE TABLE IF NOT EXISTS klienty (
		id INT(6) AUTO_INCREMENT PRIMARY KEY,
		imie VARCHAR(50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		mobile VARCHAR(15) NOT NULL,
		fmessage TEXT NOT NULL
	)";
	if ($conn->query($sql) === TRUE) {
	} else {
		echo "Error creating table klienty: " . $conn->error;
	}
	
 ?> 
<?php

$conn->close();
?> 
</body>
</html>
