<!DOCTYPE HTML > 

<html>
	<head>
		<link rel="stylesheet" href="css/style.css" media="screen">
        
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAKgc8OHf6a0tn73JPFZBkCe6cS_NtLQiQ&sensor=false"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"> </script>
        <script src="js/colpick.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/colpick.css" type="text/css"/>
        <script src = "js/usersChoice.js"></script>
        <script>
            var myCenter=new google.maps.LatLng(60.220794,24.806120);

            function initialize()
            {
                var mapProp = {
                  center:myCenter,
                  zoom:15,
                  mapTypeId:google.maps.MapTypeId.ROADMAP
                  };

                var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

                var marker=new google.maps.Marker({
                  position:myCenter,
                  icon:'lamborghini.png'
                  });

                marker.setMap(map);
                

                var cpwindow = new google.maps.InfoWindow({
                  content:"Sukky Cars Ltd!"
                });
                var infowindow = new google.maps.InfoWindow({
                  content:"Vanha Maantie 6, Espoo, Finland"
                });

                $(document).ready(function(){
                    $("#bt1").click(function(){
                        infowindow.close(map, marker);
                        cpwindow.open(map, marker);
                    });
                    $("#bt2").click(function(){
                        cpwindow.close(map, marker);
                        infowindow.open(map,marker);

                    });
                });
            
            //infowindow.open(map,marker);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
	</head>
    
    <body background="images/background.jpg">
        <?php include('interface.php'); ?>
        
        <h3> Information </h3> <br>
        <p style = "margin-left: 50px; font-size: 20px">
        Sukky cars Ltd is company located in Helsinki. We are selling a lot of old and used cards. We make 
        our best effort that you are happy with your car. <br>
        For excellent deals please contact our CEO Mr. 
        Huttunen at 030-12334567.
		</p>
        
        <form action="form2.php" method="post">
    	<table>
        	<tr>
            	<td><label for="FirstnameID" > Firstname: </label></td>
                <td><input type="text" name="Fname" id="FirstnameID"></td>
            </tr>
            <tr>
            	<td><label for="LastnameID" > Lastname: </label></td>
                <td><input type="text" name="Lname" id="LastnameID"></td>
            </tr>
            <tr>
				<td> <label for = "eMailID"> Your email: </label></td>
				<td> <input type = "text" id = "eMailID" name = "email"></td>
			</tr>
            <tr>
				<td></td>
				<td> <input type = "submit" id = "submit" value = "Send"></td>
			</tr>
        </table>
    	</form>

        <div id="googleMap" style="width:500px;height:380px;"></div>
        <button id="bt1">Sukky Cars Ltd</button>
        <button id="bt2">Information</button>
        </div>

    </body>
</html>
