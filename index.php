<?php include_once('db.php');?>
<?php include_once('include/header.php') ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
	
	<!-- abrimos y cerramos php con {}, aqui se hace una validación para mostar un mensaje o alerta  -->
			<?php if (isset($_SESSION['message'])) {?>
	<!-- unicamente me funciona en alert session <.?= ?.>   -->
				<div class="alert alert-<?php echo($_SESSION['type_message']) ?> alert-dismissible fade show" role="alert">
        			<?= $_SESSION['message']?>
        			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div> 
<!-- antes de cerrar la validación, se crea la funcion session_unset() para limpiar los datos de sesión cuando recargues el index -->
			<?php session_unset();}?>



			<div class="card card-body">
				<form action="save_task.php" method="post">
					<div class="form-group">
						<input type="text" name="title" class="form-control" placeholder="task title" autofocus="">
					</div>
					<div class="form-group">
						<textarea name="description" id=""  rows="2" class="form-control" placeholder="task description"></textarea>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="save_task" value="save task">
				</form>
			</div>
		</div>
	
	<div class="col-md-8">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Created at</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<!-- consulta y selecciona toda la información guardada en la db -->
				<?php
				$query = "SELECT * FROM task";
				$result_task = mysqli_query($conn,$query);
				// recorrer la variable $result_task a traves de una funcion while, para pintar la información
				// se abre y se cierra php de esa manera es para pintar html
				while ($row = mysqli_fetch_array($result_task)) {?>
					<tr>
						<td><?php echo $row['title'] ?></td>
						<td><?php echo $row['description'] ?></td>
						<td><?php echo $row['creationdate'] ?></td>
						<td>
							<a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
								<i class="">editar</i>
							</a>
							<a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
								<i class="">eliminar</i>
							</a>
						</td>

					</tr>
					
				<?php }?>
			</tbody>
			
		</table>
		
	</div>


	</div>
</div>


<?php include_once('include/footer.php');?>
