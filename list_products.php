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
				mysqli_select_db($connect, "$db_name")or die("cannot select DB");


				$result = mysqli_query($connect,"SELECT * FROM product_info");

                echo '<table>';
                echo '<th > <div class = "table_header"> Name </div> </th>';
                echo '<th > <div class = "table_header"> Description </div> </th>';
                echo '<th > <div class = "table_header"> Price </div> </th>';
                echo '<th > <div class = "table_header"> Year </div> </th>';
				while($row = mysqli_fetch_array($result))
				{
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Description'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['Year'] . "</td>";
                    echo "</tr>";
  
				}

                echo "</table>";
				mysqli_close($connect);
			?>

		</body>
</html>