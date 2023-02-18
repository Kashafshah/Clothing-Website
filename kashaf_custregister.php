<?php

 include('kashaf_mysql_config.php');

 global $success_msg, $user_exists, $emptyError1, $emptyError2;
 $td = "width='20%' align='right'";
 $tf = "width='80%' align='left'";
 $pgm = 'kashaf.php?p=custregister';
 $location = 'kashaf_logon.php';
 if(isset($_POST["submit"])){
	 $firstname= $_POST["firstname"];
     $lastname= $_POST["lastname"];
	 $username= $_POST["username"];
     $password= $_POST["password"];
		
	// check if user already exists
	 $usernameCheck = $connection->query( "SELECT * FROM customers WHERE username = '{$username}' ");
	 $rowCount = $usernameCheck->fetchColumn();

	 if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($password)){
		
				// check if user email already exist
	    if($rowCount > 0) {
		    $user_exists = '<div class="alert alert-danger" role="alert">
								User with username already exist!
						  </div>';
		}
		else{
			
			$password_hash = password_hash($password, PASSWORD_BCRYPT);
			$sql = $connection->query("INSERT INTO customers (firstname, lastname, username, password)
			VALUES ('{$firstname}','{$lastname}','{$username}', '{$password}')");
			
				if(!$sql){
					die("MySQL query failed!" . mysqli_error($connection));
				} else {
					$success_msg = '<div class="alert alert-success">
						User registered successfully!
				</div>';
				
				}
			}
			
		}
		else{
			if(empty($firstname)){
				$emptyError1 = '<div class="alert alert-danger">
									first name is required.
								</div>';
			}
			if(empty($lastname)){
				$emptyError2 = '<div class="alert alert-danger">
									last name is required.
								</div>';
			}
			if(empty($username)){
				$emptyError3 = '<div class="alert alert-danger">
									username is required.
								</div>';
			}
			if(empty($password)){
				$emptyError4 = '<div class="alert alert-danger">
									password is required.
								</div>';
			}
		}

		  header('Location: kashaf.php?p=logon');
		  exit();
 }



	echo "<form action='$pgm' enctype='multipart/form-data' method='post'>\n
		  <table align='center' bgcolor='white' cellspacing='10' class='text'>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>&nbsp;</td><td $tf><b>Customer Registration</b></td></tr>\n
		  <tr><td $td>&nbsp;</td><td $td>&nbsp;</td></tr>
		  <tr><td $td>First Name</td>	<td $tf><input type='text' name='firstname' size='60' maxlength='30' value=''></td></tr>\n
		  <tr><td $td>Last Name</td>	<td $tf><input type='text' name='lastname' size='60' maxlength='30' value=''></td></tr>\n
		  <tr><td $td>User Name</td>	<td $tf><input type='text' name='username' size='60' maxlength='30' value=''></td></tr>\n
		  <tr><td $td>Password</td>	<td $tf><input type='password' name='password' size='60' maxlength='30' value=''></td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf><input type='submit' name='submit' value='submit' style='background-color:lightgreen;font-weight:bold'></td></tr>\n
		  <tr><td $td>&nbsp;</td>		<td $tf>&nbsp;</td></tr>\n
		  </table>\n
		  </form>\n";

?>