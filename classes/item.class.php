<?PHP

class Item {
	
	protected $contents;

	public function __construct($con) {
		if ($con) {
			$this->contents = $con;
		}
	}

	public function addContent($c) {
		$this->contents .= $c;
	}

	public function getContents() {
		return $this->contents;
	}

	public function render() {
		echo $this->getContents();
	}
}

?>
