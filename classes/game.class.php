<?PHP

/*
 * The Game Class
 *
 * A Game
 *
 */

class Game extends Object {

	protected $map;
	protected $name;
	protected $players = "";
	protected $turn;

	public function getTurn() {
		if ($this->turn)
			return loadObject($this->turn, "Player");
		else
			return NULL;
	}

	public function setTurn($p) {
		return $this->turn = $p->getID();
	}

	public function setMap($m) {
		$this->map = $m;
	}

	public function getMap() {
		return loadObject($this->map, "Map");
	}

	public function setName($m) {
		$this->name = $m;
	}

	public function getName() {
		return $this->name;
	}

	public function addPlayer($p) {
		if ($this->players)
			$this->players .= ":" . $p->getID();
		else $this->players = $p->getID();
	}

	public function getPlayers() {
                $objs = explode(":",$this->players);
                return $objs;
        }

	public function getPlayerList() {
                $objs = explode(":",$this->players);
		$o = "";
		foreach ($objs as $p) {
			$pl = loadObject($p, "Player");
			if ($this->getTurn() && ($pl->getId() == $this->getTurn()->getId()))
				$o .= "<li><u><b>".$pl->getUsername()."</b></u></li>";
			else
				$o .= "<li>" . $pl->getUsername(). "</li>";
		}
		return $o;
	}		

}
?>
