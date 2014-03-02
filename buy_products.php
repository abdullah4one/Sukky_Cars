<!DOCTYPE HTML> 

<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/style.css" media="screen">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
        <script src="js/colpick.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/colpick.css" type="text/css"/>
        <script src = "js/usersChoice.js"></script>
    </head>

<body background="images/background.jpg">
        <?php include('interface.php'); ?>

            <div>
				<table border = "1" bgcolor = "#85C285">
					<tr>
						<form action="buy_products.php" method="post">
							<td>
								<table>
						        	<tr>
						           	  <td><label for="nameID" > Name: </label></td>
						                <td><input type="text" name="name" id="nameID"></td>
						            </tr>
						            
						            <tr>
										<td> <label for = "emailID"> Email: </label></td>
										<td> <input type = "text" id = "emailID" name = "email"></td>
									</tr>
									<tr>
										<td> <label for = "product_nameID"> Name of product: </label></td>
										<td> <input type = "text" id = "product_nameID" name = "product_name"></td>
									</tr>
						            <tr>
										<td></td>
										<td> <input type = "submit" name = "order" value = "Order now"> </td> 
									</tr>
						        </table>
						    </td>
						</form>
					</tr>
				</table>
				<?php

					$host="mysql.metropolia.fi"; // Host name
					$username="anp"; // Mysql username
					$password="anphu123"; // Mysql password
					$db_name="anp"; // Database name
					$tbl_name="Ordered_products"; // Table name

					// Connect to server and select databse.
					$connect = mysqli_connect("$host", "$username", "$password");
					if(mysqli_connect_errno($connect)) {

						echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					
					mysqli_select_db($connect, "$db_name")or die("cannot select DB");

					if (isset($_POST['order'])) {	
						
						$name = $_POST['name'];
						$email = $_POST['email'];
						$product = $_POST['product_name'];
						
			
						$sql = "INSERT INTO Ordered_products (Name, Email, Product_name) VALUES (?, ?, ?)";
						$stmt = mysqli_prepare($connect, $sql);

						mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);

						$val1 = $name;
						$val2 = $email;
						$val3 = $product;
						//$val4 = $myusername;
					
						$temp = mysqli_stmt_execute($stmt); 
						
						mysqli_stmt_close($stmt);
					}
				?>

			</div>
</body>
</html>