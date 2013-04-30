<?PHP

/*
 * The AjaxCommand Class
 *
 * A Command Object is created when the Player inputs something in the Command line
 * The Command is then Parsed and Executed
 * NOTE: This is a temporary module for testing command input
 * TODO: Rewrite
 */


class AjaxCommand {

	protected $args;		// Command Line Arguments

	public function __construct($args) {
		if ($args) {
			$this->args = $args;
		}
	}

/* General Output Function */
	public function out($str) {
		echo "<PRE>$str</PRE>";
	}

/* Extract the Command Verb from the Input */
	public function getCommand() {
		if (!$this->args) {
			return;
		}
		$cmd = explode(" ",$this->args);
		if (sizeof($cmd) < 1 || !$cmd[0]) {
			return;
		}
		return $cmd[0];		
	}

/* Extract Arguments from the Input */
	public function getArgs() {
		if (!$this->args) {
			return;
		}
		$cmd = explode(" ",$this->args);
		array_shift($cmd);
		$arg = implode(" ",$cmd);
		return $arg;
	}

/* Parse and Execute the Command
 * TODO: Rewrite to not use Global Variables
 * TODO: Error handling
 */
	public function parse() {
		switch ($this->getCommand()) {
		case "d":
		case "dump":
			if (!$this->getArgs()) {
				$this->out("Usage: dump [game|player|map|countries]");
				break;
			}
			switch ($this->getArgs()) {
			case "player":
				var_dump($GLOBALS['player']);
				break;
			case "game":
				var_dump(loadObject($GLOBALS['player']->getGame(), "Game"));
				break;
			case "map":
				var_dump(loadObject($GLOBALS['player']->getGame(), "Game")->getMap());
				break;
			case "countries":
				$map = loadObject($GLOBALS['player']->getGame(), "Game")->getMap();
				var_dump($map->getCountries());
				break;
			}
			break;
		case "country":
			$g = loadObject($GLOBALS['player']->getGame(), "Game");
			$map = $g->getMap();
			$c = $map->getCountry($this->getArgs());
			var_dump($c->getUnit($g));
			break;
		case "l":
		case "log":
	                if ($player = $GLOBALS['player']) {
	                        $this->out(getMessages($player));
	                }
			break;
		case "msg":
			message($GLOBALS['player'], $this->getArgs());
			break;
		case "unit":
			$p = $GLOBALS['player'];
			$g = loadObject($p->getGame(), "Game");
			$map = $g->getMap();
			$co = $map->getCountry($this->getArgs());
			$c = new Unit();
			$c->create();
			$c->setOwner($p);
			$c->setCountry($co);
			$c->setGame($g);
			$c->save();
			break;			
		case "newgame":
			if (!$this->getArgs()) {
				$this->out("Usage: newgame [name of new game]");
				break;
			}
			$g = new Game();
			$g->create();
			$g->setName($this->getArgs());
			$g->addPlayer($GLOBALS['player']);
			$g->setMap(1);
			$g->setTurn($GLOBALS['player']);
			$g->save();
			$this->out("Game created");
			break;		
		case "game":
			if (!$this->getArgs()) {
				$this->out("Usage: game [ID of game]");
				break;
			}
			$player = $GLOBALS['player'];
			$player->setGame($this->getArgs());
			$player->save();
			$this->out("Changed game to " . $player->getGame());
			$game = loadObject($player->getGame(), "Game");
			$game->addPlayer($player);
			$game->save();
			break;
			
		case "lg":
		case "listgames":
			$out = sprintf("%-20s\n", "Game");
			$out .= "----------------------------------------------\n";
			foreach (getGames() as $g) {
					$out .= sprintf("[%2s] %-20s%-20s\n", $g->getID(),$g->getName(), $g->getPlayerList());
			}
			$this->out($out);
			break;
		case "u":
		case "users": // list users
			$out = sprintf("%-20s %-20s\n", "User", "Last active");
			$out .= "----------------------------------------------\n";
			foreach (getPlayers() as $pl) {
				
					$act = date("Y-m-d G:i:s", $pl->getActive());
					$out .= sprintf("<li>%-20s %-20s</li>", $pl->getUsername(),$pl->getActive() ? $act : "Never");
			}
			$this->out($out);
			break;
		case "h":
		case "help": // help
			$this->out("
h[elp]\t\t\t\t\t - List available commands
l[og]\t\t\t\t\t - Read and clear Message log
u[sers]\t\t\t\t\t - List active(online) users
msg [text]\t\t\t\t - Test message logging
listgames\t\t\t\t - List games
newgame [name]\t\t\t\t - Create a new game
game [id]\t\t\t\t - Change active game
d[ump] [map|game|player|countries]\t - Debug
");
			break;
		case "":
			break;
		default:
			$this->out("unknown command");
			break;
		}
	}

}

?>
