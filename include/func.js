$(function() {
	$("button").button();
        $("#login-window").dialog({ autoResize:true});
        $("#register").click(function() {
                $("#login-window").load("register.php").dialog("option", "title", "Register New User");
                return false;
        });
	$("#tabs" ).tabs();
        $("#loading").bind("ajaxStart", function(){
            $(this).show();
        }).bind("ajaxStop", function(){
            $(this).hide();
        });

	$(".unit").live('click', function() { 
		$("#messagelog").load("func/unit.php", { id : $(this).attr("id") }, updateDisplays());
	});


        updateDisplays();
/* Update displays every 5 seconds */

/*
	setInterval(function() {
        	updateDisplays();
	},5000);
*/
});


function updateDisplays() {
        $('#userinfo').load("func/userinfo.php"); // updates username and ip
        $('#nav').load("func/nav.php"); // menu
        $('#players').load("func/players.php"); // game/map/players information
//        $('#messagelog').load("func/messagelog.php"); // the messagte log
        $('#map').load("func/map.php"); // the map

}

// Parse the command line
function doCommand() {

        $('#messagelog').load("func/command.php", {cmd : $('#command').val()}, updateDisplays());
        $('#command').val('');
}

