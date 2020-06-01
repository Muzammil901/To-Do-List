<!DOCTYPE html>
<html>
<head>
	<title>Update Task</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<style type="text/css">
			.padding-0{
			padding-top: 30px;
		</style>
</head>
<body>
	<?php 
		include'db.php';

		if(isset($_GET['id'])){
		$id = $_GET['id'];
		}

		try{
			$query = "SELECT * FROM td_list WHERE id = ?";

			$stmt = $con->prepare($query);

			$stmt->bindParam(1,$id);

			$stmt->execute();

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
		}
		catch(PDOexception $e){
			die('ERROR: '. $e->getMessage());
		}

		?>

		<?php 
			if($_POST){
				try{
					$query = "UPDATE td_list SET tasks=:tasks WHERE id = :id";

					$stmt = $con->prepare($query);

					$tasks = $_POST['tasks'];

					$stmt->bindParam(':tasks',$tasks);
					$stmt->bindParam(':id', $id);

					if($stmt->execute()){
						header('location: index.php');
					}
					else{
						echo "ERROR ";
					}
				}
				catch(PDOexception $e){
					die('ERROR: '. $e->getMessage());
				}
			}
			?>

		<div class="container">
	<form action="update.php?id=<?php echo $id ?>" method="POST">
		<div class="form-row padding-0">
			<div class="col-10">
				<input type="text" name="tasks" value="<?php echo $row['tasks'] ?>" class="form-control">
			</div>
			<div class="col-auto">
				<input type="submit" value="Save" class="btn btn-primary">
			</div>
		</div>
	</form>
		</div>

</body>
</html>