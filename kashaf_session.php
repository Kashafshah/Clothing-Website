<?php
// BCS350_session.php - Check for Logon and Load Session Variables
// Written by:  Charles Kaplan, May 2015

  session_start();
 
  if (isset($_SESSION['username'])) {
    $logon = 	TRUE;
	$sname = 	$_SESSION['name'];
	$suser = 	$_SESSION['username'];
	$loggedin = TRUE;
	$userstr = "Logged in as: $suser";
	}
	
	else {
	  $logon = FALSE;
	  $sname = $suser = NULL;
	  $userstr = "Welcome Guest";
	  }
?>
