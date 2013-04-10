<?PHP


require_once "classes/db.class.php";
require_once "classes/object.class.php";
require_once "classes/player.class.php";
require_once "include/functions.php";

	session_start();

        $player = loadObject($_SESSION['user_id'], "Player");
        if (!$player) {
                echo "Error: You have been deleted.";
                exit;
        }
//        $player->setInActive();
//        $player->save();
	session_unset();
	session_destroy();
	header("Location: ui.php");

?>
