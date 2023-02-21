<?php
require_once ('config.php');

$conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

function execute($sql) {
	//save data into table
	// open connection to database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	mysqli_query($conn, $sql);

	//close connection
	mysqli_close($conn);
}

function executeResult($sql) {
	//save data into table
	// open connection to database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($conn, $sql);
	$data   = [];
	while ($row = mysqli_fetch_array($result, 1)) {
		$data[] = $row;
	}

	//close connection
	mysqli_close($conn);

	return $data;
}

function executeSingleResult($sql) {
	//save data into table
	// open connection to database
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($conn, $sql);
	$row    = mysqli_fetch_array($result, 1);

	//close connection
	mysqli_close($conn);

	return $row;
}