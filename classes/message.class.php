<?PHP

class Message extends Object {

	protected $msgfrom = 0;
	protected $stamp;
	protected $msgtype = "Log";
	protected $msgto;
	protected $message;
	protected $read;

	public function setTo($t) {
		if ($t)
		$this->msgto = $t->getID();
	}

	public function setFrom($t) {
		$this->msgfrom = $t->getID();
	}

	public function setStamp($t) {
		$this->stamp = $t;
	}

	public function setMsg($m) {
		$this->message = $m;
	}

	public function setType($m) {
		$this->msgtype = $m;
	}

	public function read() {
		$this->read = 1;
	}

	public function display() {
//		$this->read();
//		$this->save();
		date_default_timezone_set("Europe/Oslo");
		return sprintf("(%s) %s [%s]: %s\n", date("Y-m-d G:i:s", $this->stamp), $this->msgfrom ? $this->msgfrom : "System", $this->msgtype, $this->message);
	}

}

?>
