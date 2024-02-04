<?php
session_start();

$mainConn = new mysqli("localhost", "root", "Marta020690", "mysql");
$sql = "CREATE DATABASE IF NOT EXISTS martatodolist";
if ($mainConn->query($sql) === TRUE) {
	//echo "Database created successfully";
} else {
	//echo "Error creating dbName: " . $mainConn->error;
}

$conn = new mysqli(	'localhost', 'root','Marta020690', 'martatodolist');


$sql = "CREATE TABLE IF NOT EXISTS task (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255),
			description VARCHAR(1024),
			creationdate DATETIME,
            completed BOOLEAN
)";
if ($conn->query($sql) === TRUE) {
	//echo "Table 'tasks' created successfully";
} else {
	//echo "Error creating table 'tasks': " . $conn->error;
}



// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=php_mysql_crud", $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
//     }
// catch(PDOException $e)
//     {
//     echo "Connection failed: " . $e->getMessage();
//     }