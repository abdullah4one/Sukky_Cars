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
						<form action="Admin_update.php" method="post">
							<td>
								<table>
						        	<tr>
						           	  <td><label for="productnameID" > Name: </label></td>
						                <td><input type="text" name="Product_name" id="productnameID"></td>
						            </tr>
						            <tr>
						            	<td><label for="descriptionID" > Description: </label></td>
										<td><textarea name="Description" >Description:</textarea></td>
						                
						            </tr>
						            <tr>
										<td> <label for = "priceID"> Price: </label></td>
										<td> <input type = "text" id = "priceID" name = "Price"></td>
									</tr>
									<tr>
										<td> <label for = "YearID"> Year: </label></td>
										<td> <input type = "text" id = "YearID" name = "Year"></td>
									</tr>
						            <tr>
										<td></td>
										<td> <input type = "submit" name = "add_item" value = "Add item"> </td> 
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
					$tbl_name="product_info"; // Table name

					// Connect to server and select databse.
					$connect = mysqli_connect("$host", "$username", "$password");
					if(mysqli_connect_errno($connect)) {

						echo "Failed to connect to MySQL: " . mysqli_connect_error();

					}
					var_dump($col4);
					if ($col4 == "admin") 
						echo "Welcome admin";
					mysqli_select_db($connect, "$db_name")or die("cannot select DB");
					if (isset($_POST['add_item'])) {	
						
						$p_name = $_POST['Product_name'];
						$description = $_POST['Description'];
						$price = $_POST['Price'];
						$year = $_POST['Year'];

						$sql = "INSERT INTO product_info (Name, Description, Price, Year) VALUES (?, ?, ?, ?)";
						$stmt = mysqli_prepare($connect, $sql);

						mysqli_stmt_bind_param($stmt, "sssi", $val1, $val2, $val3, $val4);

						$val1 = $p_name;
						$val2 = $description;
						$val3 = $price;
						$val4 = $year;
					
						$temp = mysqli_stmt_execute($stmt); 
						
						mysqli_stmt_close($stmt);
					}
				?>

			</div>
</body>
</html>