<?PHP
// bcs350_logoff.php - Logoff
// Written by:  Charles Kaplan, NOvember 2018

// Verify that program was called from week09.php
	require('kashaf_landing.php');
	$tempname = 'User'; 

// Logoff by unsetting session variables  
	if ($logon) {
		$tempname = $sname; 
		session_unset();
		$logon = FALSE;
		}
 
// LOGOFF SCREEN
	echo "<table width='$width' align='center' bgcolor='white' cellspacing='10'>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td align='center'><b><font size='+2'>$tempname Logged Off</font></b></td></tr>
		  <tr><td>&nbsp;</td></tr>
		  </table>\n";
?>