<?PHP
require_once "../classes/db.class.php";
require_once "../classes/page.class.php";
require_once "../classes/zone.class.php";
require_once "../classes/item.class.php";
require_once "../classes/object.class.php";
require_once "../classes/player.class.php";
require_once "../classes/movable.class.php";
require_once "../classes/unit.class.php";
require_once "../classes/message.class.php";
require_once "../include/functions.php";

session_start();

if (isset( $_SESSION['user_id'] )) {
//	$message = 'Users is already logged in';
}
if (!isset( $_POST['username'], $_POST['password'])) {
	$message = 'Please enter a valid username and password';
} elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 3) {
	$message = 'Incorrect Length for Username';
} elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 3) {
	$message = 'Incorrect Length for Password';
} elseif (ctype_alnum($_POST['username']) != true) {
	$message = "Username must be alpha numeric";
} elseif (ctype_alnum($_POST['password']) != true) {
        $message = "Password must be alpha numeric";
} else {
	$username = $_POST['username'];
	$password = $_POST['password'];
}

if (isset($message)) {
	header("Location: ../ui.php");
	die();
}

echo "Userinfo accepted.";


/* Create Player */

	$player = new Player();
	$player->create();

	$_SESSION['user_id'] = $player->getID();

	$player->setUsername($username);
	$player->setPassword($password);
	$player->save();

	header("Location: ../ui.php");

?>
