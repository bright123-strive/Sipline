<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"));

//echo "Hello $data->name, your email is $data->email";


$servername = "localhost";
$username = "root";
$password = "";
$dbname ="asterisk";

// Create connection
$connect = mysqli_connect($servername, $username, $password, $dbname);


	
	$name = $data->name;//mysqli_real_escape_string($connect,$_POST['name']);
	$message = $data->email;//mysqli_real_escape_string($connect,$_POST['email']);
	$query = "INSERT INTO loanotes(caseID,textnotes,agentName) VALUES ('kgjfj', 'khjgk','utytu');";
	if(mysqli_query($connect,$query)){
		echo "Succesfully saved";
	}


?>