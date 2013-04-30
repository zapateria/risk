<?PHP

/*
 * The Map UI module
 * - Draws the background map image
 * - Loops through countries and places units
 *
 */

require_once("../classes/db.class.php");
require_once("../classes/object.class.php");
require_once("../classes/country.class.php");
require_once("../classes/game.class.php");
require_once("../classes/map.class.php");
require_once("../classes/movable.class.php");
require_once("../classes/player.class.php");
require_once("../classes/unit.class.php");
require_once("../include/functions.php");

session_start();

if (isset($_SESSION['user_id'])  && $player = loadObject($_SESSION['user_id'], "Player")) {
// loop through units etc

	if (!$game = $player->getGame()) {
/* Player has no active game or a new player has registered */
		echo "<div id=newplayerinfo><center><br><br><br>No game, create a new one with the command 'newgame <name>'</center></div>";
		exit;
	}

	if (!$g = loadObject($game, "Game")) {
		echo "Couldn't load game";
		exit;
	}

	if (!$map = $g->getMap()) {
		echo "Got no map";
		exit;
	}
	$map_image = $map->getImage();
	echo "<div style=\"background-image: url('$map_image');min-height: 512px;width: 998px;\"></div>";

	foreach ($map->getCountries() as $country) {

		$u = $country->getUnit($g);
		if ($u) {
			if ($pu = $player->getUnit())
				if ($pu->getId() == $u->getId())
					$o = "<u>".$u->getOwner()->getUsername()."</u>";
			else
			$o = $u->getOwner()->getUsername();
		}
		else
			$o = "?"; // unknown owner - replace with color or something
		printf("<div id=%s>%s%s</div>",
			$country->getShortname(), // the div id is the shortname
			$country->getImage(), // img link with id "unit" and tooltip (title) shortname
			$o); // temporarily show the owner text, replace with color code or something

	}

}

?>
