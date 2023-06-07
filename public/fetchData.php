<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'joborder_db');
// Check connection
if (!$db) {
 	die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['search']))
{
	$search = $_POST['search'];

	$query = "SELECT * FROM consumers WHERE name like'%$search%'; ";
	$result = mysqli_query($db,$query);

	$response = array();
	while($row = mysqli_fetch_array($result) )
	{
		$response[] = array("value"=>$row['id'],"label"=>$row['name']);
	}

	echo json_encode($response);
}

exit;