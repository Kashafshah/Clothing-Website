<?PHP
	include('kashaf_mysql_config.php');
	
	$msg 		= NULL;			// Error Message
	$td 		= "width='20%' align='right'";
	$tf 		= "width='80%' align='left'";	
	$location 	= "location: kashaf.php";
	$pgm		= 'kashaf.php?p=logon';
	// Get Form Input  
	if(isset($_POST['logon'])) {
		$username= $_POST["username"];
		$password= $_POST["password"];
		if ($username == NULL) 	
			$msg = "USERID is missing";
		if ($password == NULL) 	
			$msg = "PASSWORD is missing";
		if (($username == NULL) AND ($password == NULL)) $msg = "USERID & PASSWORD are missing";

	if ($msg == NULL) {

	$result = $connection->query( "SELECT * FROM customers WHERE username = '{$username}' AND password = '{$password}'");
	$rowCount = $result->fetchColumn();

	if($rowCount > 0) {
		list($firstname, $lastname, $password) = mysqli_fetch_row($result); 
		if ($pword == $password) {
			$_SESSION['username'] = $username;
			$_SESSION['name'] = $firstname;
			$logon = TRUE;
			$msg = "<font color='green'><b>$name Logon Successful</b></font>"; 
			header($location);
			exit(); 
		}	
			else $msg = "Invalid Password";
		}
			else $msg = "USERID is invalid";
}
}
  

	if ($msg == NULL)  	$msg = "Enter User ID and Password";
		else if (!$logon) $msg = "<font color='red'>$msg, please try again</font>";  
	echo "<form action='$pgm' enctype='multipart/form-data' method='post'>\n
		  <table  align='center' bgcolor='white' cellspacing='10' class='text'>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>&nbsp;</td><td $tf><b>Login </b></td></tr>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td> Enter User ID</td>	<td $tf><input type='text' name='username' size='60' maxlength='80' value=''></td></tr>\n
		  <tr><td $td> Enter Password</td>	<td $tf><input type='password' name='password' size='12' maxlength='12' value=''></td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf><input type='submit' name='logon' value='LOGON' style='background-color:lightgreen;font-weight:bold'></td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>Message</td>	<td $tf><b>$msg<b></td></tr>\n
		  </table>\n
		  </form>\n";
?>
