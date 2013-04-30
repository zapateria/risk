<?PHP

require_once("../classes/db.class.php");
require_once("../classes/object.class.php");
require_once("../classes/player.class.php");
require_once("../include/functions.php");
require_once("../classes/unit.class.php");
require_once("../classes/game.class.php");
require_once("../classes/country.class.php");
session_start();

if (isset($_SESSION['user_id'])  && $player = loadObject($_SESSION['user_id'], "Player")) {

	$country_id = $_POST['id'];
	$game = loadObject($player->getGame(), "Game");
	$country = loadObject($country_id, "Country");
	$unit = $country->getUnit($game);

	$out = "You selected " .$country->getShortname() ."\n";
	if ($unit) {
		if ($player->getUnit()) {
			if ($unit->getOwner()->getId() == $player->getId()) {
/* Own country selected, either place free unit there, or suggest move */

				$out .= "<br>This is your country, want to move stuff there from ".$player->getUnit()->getCountry()->getShortname()."?\n";
			} else {
			// Figure out if it's adjacent
				if (isAdjacent($country, $player->getUnit()->getCountry())) {
					$out .= "<br>You attack this country (".$country->getShortname().") from selected country (".$player->getUnit()->getCountry()->getShortname().")";
					
				}
				else
					$out .= "You can't attack that from there";
				echo $out;
				return;
			}
		}
		$player->setUnit($unit);
		$player->save();
		$out .= "<br>Debug: Players active unit: " .$unit->getId();
	} else { // No units exists in the country
		$out .= "<br>You place an unit in the empty country of ".$country->getShortname();
                        $c = new Unit();
                        $c->create();
                        $c->setOwner($player);
                        $c->setCountry($country);
                        $c->setGame($game);
                        $c->save();
	}		
	echo $out;
}


?>
