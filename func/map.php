<?PHP

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
		echo "Got no game dude";
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
		if ($u)
			$o = $u->getOwner()->getUsername();
		else
			$o = "";
		printf("<div id=%s>%s%s</div>",
			$country->getShortname(),
			$country->getImage(),
			$o);

	}

}

?>
