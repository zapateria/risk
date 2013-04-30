<script>
	$("button").button();
        $("#login-window").dialog("option");
        $("#username").change(function() {
                $("#username_validation").load("func/validate_username.php", {
                        username: $("#username").val()
                });
        });
        $("#password2").change(function() {
                $("#password_validation").load("func/validate_password.php", {
                        password: $("#password").val(),
                        password2: $("#password2").val()
                });
        });
</script>

<form action="func/newplayer.php" method="post"><fieldset><p>
<label for="username">Username</label> <input type="text" id="username" name="username" value="" maxlength="20" /><div id="username_validation"></div> </p> <p>
<label for="password">Password</label> <input type="password" id="password" name="password" value="" maxlength="20" /> </p> <p>
<label for="password2">Password</label> <input type="password" id="password2" name="password2" value="" maxlength="20" /> </p> <p>
<div id="password_validation"></div>
<button id=submit type="submit" value="Login">Create</button><button id=cancel type="cancel">Cancel</button>
</p></fieldset> </form>
