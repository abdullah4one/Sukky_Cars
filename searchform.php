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
        
        
        <p id = "mypar" style = "font-size: 20px">
        Please fill in the vehicle information and we will find suitable car for you: <br>
		</p>


        <form id = "FormID" name = "validationForm" action="<?php echo $current_page; ?>" method="post" >
    	<table>
        	<tr>
            	<td><label for="carbrandID" id="carbrandID_label"> Car brand: </label></td>
                <td><input type="text" name="task" id="carbrandID"></td>
                <td><span id = "check_carbrandID" style ="color:red" > </span></td>
            </tr>
            <tr>
            	<td><label for="ModelID" id ="ModelID_label"> Model: </label></td>
                <td><input type="text" name="task" id="ModelID"></td>
                <td><span id = "check_ModelID" style ="color:red" > </span></td>
            </tr>
            <tr>
                <td><label for="fuelID" id = "fuelID_label" > Gas or Diesel Engine:  </label></td>
                <td><input type="text" name="task" id="fuelID"></td>
                <td><span id = "check_fuelID" style ="color:red" > </span></td>
            </tr>
            <tr>
                <td><label for="transmissionID" id = "transmissionID_label"> Transmission: </label></td>
                <td><input type="text" name="task" id="transmissionID"></td>
                <td><span id = "check_transmissionID" style ="color:red" > </span></td>
            </tr>
            <tr>
                <td><label for="pricerangeID" id = "pricerangeID_label" > Price range: </label></td>
                <td><input type="text" name="task" id="pricerangeID"></td>
                <td><span id = "check_pricerangeID" style ="color:red" > </span></td>
            </tr>
            <tr>
				<td> <label for = "eMailID" id = "eMailID_label"> Your email: </label></td>
				<td> <input type = "text" id = "eMailID" name = "email"></td>
                <td><span id = "check_eMailID" style ="color:red" > </span></td>
			</tr>
            <tr>
                <td> <label for = "confirm_emailID" id = "confirm_emailID_label"> Confirm your email: </label></td>
                <td> <input type = "text" id = "confirm_emailID" name = "confirm_email"></td>
                <td><span id = "check_confirm_emailID" style ="color:red" > </span></td>
            </tr>
            <tr>
				<td></td>
				<td> <input type = "submit" id = "submit" value = "Send" ></td>
			</tr>
        </table>
    	</form>
        </div>

        <script type="text/javascript">
        //http://stackoverflow.com/questions/2257070/detect-numbers-or-letters-with-jquery-javascript
        //http://stackoverflow.com/questions/14783196/how-to-check-in-javascript-that-a-string-contains-alphabetical-characters
            $(document).ready(function() {
                $("#FormID").submit(function() {
                    var spanIDarray = new Array();
                    var returnvalue = true;
                    var x;
                    $("span").each(function(i) {
                        spanIDarray[i] = $(this).attr("id");
                         //alert(spanIDarray[i]);
                    });

                    $("input:text[name=task]").each(function(i) {
                        var letters = /^[0-9a-zA-Z]+$/;  
                            x = $(this).val();
                        if ($(this).val().length == 0) { // cannot use: if ($(this).val() == NULL || $(this).val() =="")
                            returnvalue = false;
                            $("#" + spanIDarray[i]).text("This field must be filled out!");
                        }
                        else $("#" + spanIDarray[i]).text(""); // no ";" before else!!!
                        if ($(this).prop("id") == "ModelID") {
                            if (!x.match(letters)) {
                                $("#" + spanIDarray[i]).text("Input should contain letters and numbers only!");
                                returnvalue = false;
                            }
                        }

                        if ($(this).prop("id") == "pricerangeID") {
                            var letters = /^[0-9]+$/;  
                            x = $(this).val();
                            if (x.match(letters)) {
                                if (23123 <= x) {
                                    $("#" + spanIDarray[i]).text("Out of range [0 - 23123]!");
                                    returnvalue = false;
                                }
                            } else {
                                $("#" + spanIDarray[i]).text("Input should be numbers only!");
                                returnvalue = false;
                            }
                        } 
                    });
                    

                    $("input:text[name=email]").each(function(j) {
                        x = $(this).val();
                        var atpos=x.indexOf("@");
                        var dotpos=x.lastIndexOf(".");
                        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                            returnvalue = false;
                            $("#" + spanIDarray[5+j]).text("Not a valid email address!"); //cannot use spanIDarray[i+j] => i is maybe destroyed if it's not declared;
                            //to get rid of 5, we can use another variable which is declared at first;
                        }
                        else $("#" + spanIDarray[5+j]).text("");
                    })

                    $("input:text[name=confirm_email]").each(function(j) {
                        var y = $(this).val();
                        if (y != x) { // x must be declared outside .each()
                            returnvalue = false;
                            $("#" + spanIDarray[6+j]).text("Emails do not match!");
                        }
                        else $("#" + spanIDarray[6+j]).text("");
                    });
                    if (returnvalue == true) {
                        $("#FormID").submit();
                        $("#mypar").load("http://users.metropolia.fi/~kimmosa/lab9/content.html");
                    }
                    return returnvalue;
                })

                $("input:text").focus(function() {
                    var inputId = $(this).prop("id");
                    var labelId = inputId + "_label";
                    $(this).css("background-color", "yellow");
                    $("#" + labelId).css("font-weight", "bold");
                });
                $("input:text").blur(function() {
                    var inputId = $(this).prop("id");
                    var labelId = inputId + "_label";
                    $(this).css("background-color", "white");
                    $("#" + labelId).css("font-weight", "normal");
                })
            })
        </script>
    </body>
</html>
