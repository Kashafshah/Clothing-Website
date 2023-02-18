<?php
// bcs350_functions.php - Function Library
// Written by:  Charles Kaplan, June 2015

  //include('kashaf_upload.php')		// File Uploads
$host = '127.0.0.1'
$user = 'root';
$password = ''; //To be completed if you have set a password to root
$database = 'kashaf_website'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port


$connection = new mysqli($host, $user, $password, $database, $port);
if ($connection->connect_error) die("Fatal Error");

function createTable($name, $query){
	
	query("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists.<br>";
}

function query($query){
	global $connection;
	$result = $connection->query($query);
	if(!$result) die("Fatal Error");
	return $result;
}

function destroySession(){
	
	$_SESSION=array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-2592000, '/');
	session_destroy();
 }

function sanitizeString($var){
	global $connection;
	$var = strip_tags($var);
	$var = htmlentities($var);
	if (get_magic_quotes_gpc())
		$var = stripslashes($var);
	return $connection->real_escape_string($var);
	
}
function showCustomerAccount($user){
	$result = query("SELECT * from customers WHERE customer=$user'");
	
	if($result->num_rows){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
		
	}
	else echo "<p> Nothing to see here, yet</p><br>";
}
?> 