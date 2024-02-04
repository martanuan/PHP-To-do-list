<?php
include_once('db.php');

if (isset($_GET['id'])) {

	$id = $_GET['id'];
	$query = "SELECT * FROM task WHERE id = $id";
	$result = mysqli_query($conn,$query); 
// validación mediante un conteo si al menos regresa un resultado para mostrar al usuario
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
		$description = $row['description'];
	}
}

	if (isset($_POST['update'])) {
		$id = $_GET['id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		 echo $id;
		 echo $title;
		 echo $description;

		 $query = "UPDATE task set title = '$title', description = '$description' WHERE id= $id";
		 mysqli_query($conn,$query);

		 $_SESSION['message'] = 'task update succesfully';
		 $_SESSION['message_type'] = 'info';
		 header('location: index.php');
	}
?>


<?php include('include/header.php'); ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="edit.php?id=<?php echo $_GET['id'] ?>" method="post">
					<div class="form-group">
						<input type="text" name="title" value="<?php echo $title ?>" class="form-control" placeholder="update title">

					</div>
					<div class="form-group">
						<textarea name="description" class="form-control" placeholder="update description" rows="2"><?php echo $description; ?></textarea>
					</div>
					<button class="btn btn-success form form-control" name="update">
						update
					</button>
				</form>
			</div>
			
		</div>
	</div>
</div>

<?php include('include/footer.php'); ?>