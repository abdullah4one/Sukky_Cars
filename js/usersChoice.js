var ca = new Array();
var coka;
var bgcolor="blue", fontColor="green", fontSize=15;

function setCookie(cname,bgcolor, fontColor, fontSize, exdays)
{
	var d = new Date();
	d.setTime(d.getTime()+(exdays*24*60*60*1000));
	var expires = "expires="+d.toGMTString();
	document.cookie = cname+"="+bgcolor+"-"+fontColor+"-"+fontSize+"-"+expires;
}

function getCookie(cname)
{
	var name = cname + "=";

	ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) 
	  {
		  var c = ca[i].trim();
		  if (c.indexOf(name)==0) 
		  	return c.substring(name.length,c.length);
	  }
	return "";
}

function checkCookie()
{
	var user=getCookie("username");
	if (user != "")
	{
		coka = user.split('-');
        bgcolor = coka[0];
        fontColor = coka[1];
        fontSize = coka[2];
        $("#main").css({'background-color': "#"+bgcolor,
                        'color': "#" + fontColor,
                        'font-size': fontSize + "px"
                    });
	}
	else 
	{
	    setCookie("username",bgcolor, fontColor, fontSize,30);
	    
	}
}

//---------------------------------------------------
$(document).ready(function() {
	checkCookie();
    $("#picker").colpick({
        layout:'rgbhex',
        onSubmit:function(hsb,hex,rgb,el) {
            $("#main").css('background-color', '#'+hex);
            $(el).colpickHide();
            bgcolor = hex;
            setCookie("username",bgcolor, fontColor, fontSize,30);
        }
           
    });
    $("#fontPicker").colpick({
        layout:'rgbhex',
        onSubmit:function(hsb,hex,rgb,el) {
            $("#main").css('color', '#'+hex);
            $(el).colpickHide();
            fontColor = hex;
            setCookie("username",bgcolor, fontColor, fontSize,30);
        }
           
    });
    $("#userOptionID").submit(function(){
        var letters = /^[0-9]+$/;  
    	var x = $("input:text").val();
        if (x.match(letters)) {
            fontSize = x;
            setCookie("username",bgcolor, fontColor, fontSize,30);
        }
        else alert("Enter number only!");
    	
    })

})
