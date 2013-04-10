<?PHP

/*
 * The Movable Class
 *
 * This Class implements movement for an Object
 */

class Movable extends Object {

	protected $country;

	public function getCountry() {
		return loadObject($this->country, "Country");
	}

	public function setCountry($c) {
		if ($c) {
			$this->location = $c->getID();
		} else {
			$this->location = NULL;
		}
	}

}

?>
