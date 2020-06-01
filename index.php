<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style type="text/css">
		.padding-0{
		padding-top: 30px;
	}
	.margin-l{
		padding-top: 30px;
		margin-left: 30px;
	}
	</style>

</head>
<body>
	<nav class="navbar navbar-dark bg-primary"> 
		<span class="navbar-brand">
			TO-DO List
		</span>
	</nav>

	<div class="container">

	<form action="add.php" method="POST">
		<div class="form-row padding-0">
			<div class="col-auto">
		 		<input type="submit" value="ADD" class="btn btn-primary">
		 	</div>
		 	<div class="col">
		 		<input type="text" name="task" class="form-control">
		 	</div>
		 </div>
	</form>
	<?php 
		include'db.php';

		try{
			$query = "SELECT * FROM td_list";

			$stmt = $con->prepare($query);

			$stmt->execute();

			$rows = $stmt->rowCount();

			for($j = 0; $j<$rows; $j++){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				echo<<<_END
				<div class="form-row margin-l">
				<div class="col">
				<input type="checkbox" class="form-check-input">
				</div>
				<div class="col-10 form-check">
				<input type="text" value="{$row['tasks']}" class="form-control" readonly>
				</div>
				<div class="col-auto">
				<a href="update.php?id={$row['id']}" class="btn btn-primary">Edit </a>
				</div>
				<div class="col-auto">
				<a href="delete.php?id={$row['id']}" class="btn btn-danger">Delete </a>
				</div>
				</div>
				_END;

			}
		}
		catch(PDOexception $e){
			die('ERROR: '. $e->getMessage());
		}

		?>



	</div>
</body>
</html>