<?php 
	include'db.php';

	try{
		$query ="INSERT INTO td_list SET tasks = :tasks";

		$stmt = $con->prepare($query);

		$tasks = $_POST['task'];

		$stmt->bindParam(':tasks',$tasks);

		if($stmt->execute()){
		header('location: index.php');
		}

	}
	catch(PDOexception $e){
		die('ERROR: '. $e->getMessage());
	}



?>