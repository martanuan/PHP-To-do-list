<?php
include("db.php");

if (isset($_POST['save_task'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];

	$query = "INSERT INTO task(title, description, creationdate) VALUES('$title','$description', NOW())";
	$result = mysqli_query($conn,$query);
	if (!$result) {
		die("error al insertar tarea");
	}
	// almacenar valores en sesión para pintar una notificación
	$_SESSION['message'] = 'task save succesfully';
	$_SESSION['type_message'] = 'success';

	//header redirecciona a la página indicada (index.php)
	header('location:index.php');
	
}