<?php

$db_hostname = "localhost";
$db_name = "td_list";
$username = "user1";
$password = "admin";

try{
$con = new PDO("mysql:host={$db_hostname}; dbname={$db_name}", $username, $password);}

catch(PDOexception $e){
	die('Error: ' . $e->getMessage());
}

?>