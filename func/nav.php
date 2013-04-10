<?PHP

require_once("../classes/db.class.php");
require_once("../classes/object.class.php");
require_once("../classes/player.class.php");
require_once("../include/functions.php");

session_start();

if (isset($_SESSION['user_id'])  && $player = loadObject($_SESSION['user_id'], "Player")) {
	$out = "<ul><li>Some kind of menu system here maybe</li></ul>";
	echo $out;
}


?>
