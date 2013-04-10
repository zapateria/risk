<?PHP

/*
 * The Player Class
 * 
 * Contains User information (login) and Player (Character) properties
 *
 */

class Player extends Object {
	protected $username;		// User's Login Name
	protected $password;		// User's Encrypted Password
	protected $active;		// User Last Active Timestamp
	protected $ip;			// User's IP Address
	protected $game;		// ID of Player's current game
	protected $credits = 1000;	// Amount of Credits
	protected $name;		// Player's Character Name
	protected $turns = 200;		// Player's Turns
	protected $exp = 0;		// Player's Experience
	protected $title;		// Player's Title


/* Player Game */
	public function setGame($e) {
		$this->game = $e;
	}
	public function getGame() {
		return $this->game;
	}


/* Player experience */
	public function addExp($e) {
		$this->exp += $e;
	}
	public function getExp() {
		return $this->exp;
	}

/* User IP address */
	public function setIp($i) {
		$this->ip = $i;
	}
	public function getIp() {
		return $this->ip;
	}

/* Returns Title based on amount of experience points */
	public function getTitle() {
		switch (true) {
		case $this->getExp() < 1000: 
			return "Ensign";
		case $this->getExp()< 2000: 
			return "Lieutenant Junior Grade";
		case $this->getExp()< 3000:
			return "Lieutenant";
		case $this->getExp()< 4000:
			return "Captain";
		case $this->getExp()< 5000:
			return "Major";
		case $this->getExp()< 6000:
			return "Colonel";
		case $this->getExp()< 7000:
			return "Commander";
		case $this->getExp()< 8000:
			return "Rear Admiral";
		case $this->getExp()< 9000:
			return "Vice Admiral";
		default:
			return "Admiral";
		}
	}

/* Players charactername */
	public function setName($n) {
		$this->name = $n;
	}
	public function getName() {
		return ucfirst($this->name);
	}

/* Users login name and password (sha1 encrypted) */
	public function setUsername($newname) {
		$this->username = $newname;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setPassword($newpassword) {
		$this->password = sha1($newpassword);
	}
	public function getPassword() {
		return $this->password;
	}

/* Return Login user information */
	public function displayUser() {
		return sprintf("Username: %s<br>IP: %s", $this->getUsername(), $this->getIP());
	}

/* User activity status */
	public function setActive() {
		$this->active = time();
	}
	public function setInactive() {
		$this->active = 0;
	}
	public function isActive() { // Returns true if player has been active less than 5 minutes ago
		if (time() - $this->getActive()< 300) {
			return 1;
		} else {
			return 0;
		}
	}
	public function getActive() {
		return $this->active;
	}


/* Players Turns */
	public function addTurns($t) {
		$prev_turns = $this->turns;
		$this->turns += $t;
		if ($this->turns > 200) {
			$this->turns = 200;
		}
		return $this->turns - $prev_turns;
	}
	public function getTurns() {
		return $this->turns;
	}

/* Player Credits */
	public function setCredits($newcredits) {
		$this->credits = $newcredits;
	}
	public function addCredits($newcredits) {
		if ($newcredits + $this->credits >= 0) {
			$this->credits += $newcredits;
			return 1;
		}
		return 0; // Not enough credits
	}
	public function getCredits() {
		return $this->credits;
	}

/* Return Player game information */
	public function display() {
		return sprintf("<PRE>
Name	: %s
Title	: %s
Credits	: %s
Exp	: %s
Turns	: %s
</PRE>
", $this->getUsername(), $this->getTitle(), number_format($this->getCredits()), number_format($this->getExp()), 
$this->getTurns());
	}

}

?>
