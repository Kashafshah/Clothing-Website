<?php


// Set Default PHP Options
	error_reporting('E_ALL');
	ob_start();
	date_default_timezone_set('America/New_York');
  
// Start Session, Set session variables
	require('kashaf_session.php');
// Common Variables, Functions
	 

  
// Variables
	$online = TRUE;				// Set to FALSE to bring website down
	$landing = TRUE;				// Set variable for page authentication
  
// Get Input
	if (isset($_GET['p']))	
		$p = $_GET['p'];	
	else $p = 'home'; 
	$page = "kashaf_$p.php";
	if (!file_exists($page))	$page = 'kashaf_home.php';  
	if (!$online)				$page = 'kashaf_offline.php';  

// Output Page
	include('kashaf_header.php'); 			// Page Header 
	include('kashaf_navbar.php');
	echo "<table class='content' align='center' width='1024' cellspacing='0' cellpadding='0' bgcolor='gold'><tr><td>\n";
	include($page);							// Page Content
	echo "</td></tr></table>";
	include('kashaf_footer.php');
?>

