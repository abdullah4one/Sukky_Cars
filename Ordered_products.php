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
				$tbl_name="Ordered_products"; // Table name

				// Connect to server and select databse.
				$connect = mysqli_connect("$host", "$username", "$password");
				if(mysqli_connect_errno($connect)) {

					echo "Failed to connect to MySQL: " . mysqli_connect_error();

				}
				mysqli_select_db($connect, "$db_name")or die("cannot select DB");


				$result = mysqli_query($connect,"SELECT * FROM Ordered_products");

				echo '<table>';
                echo '<th > <div class = "table_header"> Name </div> </th>';
                echo '<th > <div class = "table_header"> Email </div> </th>';
                echo '<th > <div class = "table_header"> Product\'s name </div> </th>';
                
				while($row = mysqli_fetch_array($result))
				  {
				  	echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['Product_name'] . "</td>";
				  	echo "</tr>";
				  }

				mysqli_close($connect);
			?>

		</body>
</html>