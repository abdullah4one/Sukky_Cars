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
    
    <body background="images/background.jpg" >
        <?php include('interface.php'); ?>
        
        
        <form action = "cars.php" method = "GET" id = "choiceID">
    	
        	<select name="auto" size="1" >
            	<option value="BWM">BWM -- 12400 euros</option>
                <option value="Ford">Ford -- 8900 euros</option>
                <option value="Ferrari">Ferrari -- 210000 euros</option>
                <option value="Mercedes">Mercedes -- 32000 euros</option>
                <option value="Seat">Seat -- 23000 euros</option>
            </select>
            <input type="submit" name="Submit" value="Update">
        
    	</form>
    
        
    
		<?php
            $Filename = fopen("cars_for_lab5.txt", 'r') or die("Cannot open file");
            
            $choice = $_GET['auto'];
			while ( !feof($Filename)) {	
				$str = fgets($Filename);
				if ($choice == substr($str, 0, strlen($choice)))
					break;
			}
			
			$species = explode("|", $str);
			$carsname = $species[0];
			$price = $species[1];
			$year = $species[2];
			$pic = $species[3];
			$country = $species[4];
			
            echo "Cars model " . $carsname;
			fclose($Filename);
            
        ?>	
        
        <table>
        	<tr>
                    <th > <div class = "table_header">Models</div> </th>
                    <th > <div class = "table_header"> Price </div> </th>
                    <th > <div class = "table_header">Year </div></th>
                    <th > <div class = "table_header">Country </div></th>
                </tr>
            
                <tr>
                    <td>
                    <?php
                        echo "<img src=\"images/$pic\" title=\"Picture\" alt=\"Cars pic\" width=\"300px\" height=\"200px\" />";
					?>
                    </td>
                    <td bgcolor = "grey" class = "table_content" > <?php echo "$" . $price; ?> </td>
                    <td bgcolor = "grey" class = "table_content" > <?php echo $year; ?> </td>
                    <td bgcolor = "grey" class = "table_content" ><center >  <?php echo $country; ?> </center></td>
                </tr>
        </table>
     </div>
    </body>
</html>


