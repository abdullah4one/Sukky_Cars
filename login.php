<?php
						
						$host="mysql.metropolia.fi"; // Host name
						$username="anp"; // Mysql username
						$password="anphu123"; // Mysql password
						$db_name="anp"; // Database name
						$tbl_name="page_members"; // Table name

						// Connect to server and select databse.
						$connect = mysqli_connect("$host", "$username", "$password");
						if(mysqli_connect_errno($connect)) {

							echo "Failed to connect to MySQL: " . mysqli_connect_error();

						}
						mysqli_select_db($connect, "$db_name")or die("cannot select DB");

						if(isset($_POST['myusername'])){
							$myusername=$_POST['myusername'];
						}
						if(isset($_POST['mypassword'])){
							$mypassword=$_POST['mypassword'];
						}
						
						if (isset($_POST['Submit'])) {
						// username and password sent from form
						//var_dump($connect);

							if(isset($myusername) && isset($mypassword)){
							// To protect MySQL injection 
								$myusername = stripslashes($myusername);
								$mypassword = stripslashes($mypassword);
								$myusername = mysqli_real_escape_string($connect, $myusername);
								$mypassword = mysqli_real_escape_string($connect, $mypassword);
	
								//$sql='SELECT * FROM '. $tbl_name.' WHERE username = "'.$myusername.'" AND password = "'.$mypassword.'"';
								
								//$result=mysqli_query($connect, $sql);
								

								$sql = "SELECT * FROM page_members WHERE username=? AND password=?";
								$stmt = mysqli_prepare($connect, $sql);

								mysqli_stmt_bind_param($stmt, "ss", $val1, $val2);

								$val1 = $myusername;
								$val2 = $mypassword;
								
								mysqli_stmt_execute($stmt);
								$stmt->bind_result($col1, $col2, $col3, $col4); //binds 4 columns to 4 variables								
								
								$result = $stmt->fetch();

								mysqli_stmt_close($stmt);

								// Mysql_num_row is counting table row
								

								$count=$result;
								// if fetch successfully <=> result == 1
								if($count==1){
									session_start();
									$_SESSION["myusername"] = $myusername;
									$_SESSION["mypassword"] = $mypassword;
									if ($col4 == "admin")
										$_SESSION["is_admin"] = "admin";
									$_SESSION["successful"] = "OK";
		
								// Register $myusername, $mypassword and redirect to file "login_success.php"
									
									include('login_success.php');
	
								} else {
									$notice_reg = "Wrong Username or Password";
									include('table_login.php');
								}
							}
						}
						else 
						if (isset($_POST['Register'])) {
							$check_users = mysqli_query($connect, 'SELECT username FROM ' . $tbl_name . ' WHERE username = "' .$myusername . '"');
						
							$exist = mysqli_num_rows($check_users);
							if ($exist > 0) {
								$notice_reg = "Username is reserved!";	
								include('table_login.php');
							} 
							else {	
								/*
								$insert = mysqli_query($connect, 'INSERT INTO ' . $tbl_name . ' (username, password) VALUES ("' . $myusername . '", "' . $mypassword . '")');
								
								
								*/

								$sql = "INSERT INTO page_members (username, password) VALUES (?, ?)";
								$stmt = mysqli_prepare($connect, $sql);

								mysqli_stmt_bind_param($stmt, "ss", $val1, $val2);
								$val1 = $myusername;
								$val2 = $mypassword;

								$insert = mysqli_stmt_execute($stmt); 
								
								if(!$insert){
		
									die("There's little problem: ". mysqlis_error());
								
								} else {	
									$notice_reg = "Username is created! Log in now...";
									include('table_login.php');
								}
								mysqli_stmt_close($stmt);
							}

						} 
						else {
							$notice_reg = "Member login";
							include('table_login.php');
							
						
						} 
						mysqli_close($connect);

?>