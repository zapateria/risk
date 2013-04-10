$(function() {
	$("button").button();
        $("#login-window").dialog({ autoResize:true});
        $("#register").click(function() {
                $("#login-window").load("register.php").dialog("option", "title", "Register New User");
                return false;
        });

        $("#loading").bind("ajaxStart", function(){
            $(this).show();
        }).bind("ajaxStop", function(){
            $(this).hide();
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
        $('#userinfo').load("func/userinfo.php");
        $('#nav').load("func/nav.php");
        $('#players').load("func/players.php");
//        $('#messagelog').load("func/messagelog.php");
        $('#map').load("func/map.php");
}

// Parse the command line
function doCommand() {

        $('#messagelog').load("func/command.php", {cmd : $('#command').val()}, updateDisplays());
        $('#command').val('');
}

