<?PHP

require_once "classes/db.class.php";
require_once "classes/page.class.php";
require_once "classes/zone.class.php";
require_once "classes/item.class.php";
require_once "classes/object.class.php";
require_once "classes/player.class.php";
require_once "classes/movable.class.php";
require_once "classes/unit.class.php";
require_once "classes/message.class.php";
require_once "include/functions.php";

session_start();

	$page = new Page("Game"); // Web page title

/*** Set Global Variables ***/
	$player = loadObject($_SESSION['user_id'], "Player");
	if (!$player) {
		echo "You have been deleted.";
		exit;
	}
	$player->setActive();
	$player->setIp(getIP());
	$player->save();

/*** Construct web page ***/

        $page->addZone($logo = new Zone("logo"));
        $logo->addItem(new Item("<img src=img/dice.jpg>Risky Business")); // Logo
        $page->addZone(new Zone("userinfo"));
	$page->addZone(new Zone("nav"));
        $page->addZone(new Zone("map"));
        $page->addZone(new Zone("players"));
        $page->addZone($log = new Zone("messagelog"));

/* Attempt at tabs 

        $page->addZone($log = new Zone("tabs"));
	$log->addItem(new Item("
  <ul>
    <li><a href=#tabs-1>Messagelog</a></li>
    <li><a href=#tabs-2>Playerlog</a></li>
  </ul>
  <div id=tabs-1>
    contentmessagelog
  </div>
  <div id=tabs-2>
    contentplayerlog
  </div>
"));
*/
	$page->addZone($commands = new Zone("commands"));
        $command_str = '<div id="commands"><input type="text" name="command" id="command" onChange=doCommand() placeholder=""></input></div>';
        $commands->addItem(new Item($command_str));
	$page->addZone($load = new Zone("loading"));
	$load->addItem(new Item("<div id='loading'><img src=img/processing.gif></div>"));

	$page->renderPage();

?>
