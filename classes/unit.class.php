<?PHP

/*
 * The Unit Class
 *
 */

class Unit extends Object {

	protected $owner;		// ID of the Player owning the Unit
	protected $game;		// Unit belongs to game
	protected $country;		// Unit is located in country


	public function setGame($g) {
		$this->game = $g->getID();
	}
	public function getGame() {
		return loadObject($this->game, "Game");
	}

	public function setCountry($c) {
		$this->country = $c->getID();
	}
	
	public function getCountry() {
		return loadObject($this->country, "Country");
	}

	public function setOwner($player) {
		$this->owner = $player->getID();
	}
	public function getOwner() {
		return loadObject($this->owner, "Player");
	}

}

?>
