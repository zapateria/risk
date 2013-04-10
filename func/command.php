<?PHP
require_once "../classes/db.class.php";
require_once "../classes/page.class.php";
require_once "../classes/zone.class.php";
require_once "../classes/item.class.php";
require_once "../classes/object.class.php";
require_once "../classes/player.class.php";
require_once "../classes/movable.class.php";
require_once "../classes/unit.class.php";
require_once "../classes/game.class.php";
require_once "../classes/map.class.php";
require_once "../classes/country.class.php";
require_once "../classes/ajaxcommand.class.php";
require_once "../classes/message.class.php";
require_once "../include/functions.php";

session_start();

/* Set Global Variables */

        $player = loadObject($_SESSION['user_id'], "Player");
	$player->setActive();
	$player->save();

$c = new AjaxCommand($_POST['cmd']);

echo $c->parse();

?>
