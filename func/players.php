<?PHP

require_once("../classes/db.class.php");
require_once("../classes/object.class.php");
require_once("../classes/game.class.php");
require_once("../classes/map.class.php");
require_once("../classes/player.class.php");
require_once("../include/functions.php");

session_start();

if (isset($_SESSION['user_id'])  && $player = loadObject($_SESSION['user_id'], "Player")) {
	$game = $player->getGame();
	$out = "";
	if (!$game) {
		$out .= "- No active game -";
	} else {
		if (!$g = loadObject($game, "Game")) {
		  $out .= "ERR: Couldn't load map";
		} else {
		$m = $g->getMap();
		$out .= "Game: <li>" . $g->getName() ."</li>";
		$out .= "Map: <li>" . $m->getName() ."</li>";
		$out .= "Players: " . $g->getPlayerList();
		}
	}
	echo $out;
}


?>
