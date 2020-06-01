<?php
	include'db.php';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}

	$query = "DELETE FROM td_list WHERE id = ?";

	$stmt = $con->prepare($query);

	$stmt->bindParam(1,$id);

	if($stmt->execute()){
		header('location: index.php');
	}