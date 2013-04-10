<?PHP

class Zone {

	protected $items = array();
	protected $loc;

	public function __construct($loc) {
		$this->loc = $loc;
	}

	public function addItem($item) {
		array_push($this->items, $item);
	}

	public function getItems() {
		return $this->items;
	}

	public function getLoc() {
		return $this->loc;
	}

	public function renderZone() {
		echo "<div id=".$this->loc.">\n";
		foreach ($this->getItems() as $i) {
			$i->render();
		}
		echo "</div>\n";
		if ($this->getLoc() == "userinfo") {
			echo "<div class=clearfix></div>\n";

		}

	}
	

}

?>
