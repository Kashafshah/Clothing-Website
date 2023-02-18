<?php
// bcs350_home.php - BCS350 Home Page
// Written by:  Charles Kaplan, May 2015	

// Verify that program was called from bcs350_php
  require('kashaf_landing.php');

// Set Up Name   
 if (!$logon) {
	 $suser = NULL;

// Output Page  
  echo "<table width='$width' align='center' bgcolor='gold' cellspacing='10' class='text'>
		<tr>
		<td>
		<b>Welcome Guest, Login to your account or register new account</b>\n
		<br><br>\n
		
		</tr></table>\n";
 }
// Popup Message		
	  else{
		  
		echo "<table width='$width' align='center' bgcolor='gold' cellspacing='10' class='text'>
		<tr>
		<td>
		<b>Welcome $suser!</b>\n
		<br><br>\n
		
		</tr></table>\n";
	  }
// End of Page	
  echo "</td></tr></table>";	  
   
?>