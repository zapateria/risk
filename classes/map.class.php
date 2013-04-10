<?PHP

/*
 * The Map Class
 *
 * A Game Map
 *
 */

class Map extends Object {

	protected $name = "";
	protected $image = "/img/game_map.png";

	public function getImage() {
		return $this->image;
	}

	public function getName() {
		return $this->name;
	}

	public function getCountry($c) {
	        $h = DB::getInstance()->prepare("SELECT * FROM Country WHERE MAP=:map AND shortname=:short");
	        $h->setFetchMode(PDO::FETCH_CLASS,"Country");
	        $h->bindParam(":map", $this->id);
	        $h->bindParam(":short", $c);
	        $h->execute();
	        $obj = $h->fetch();
	        return $obj;
	}	

	public function getCountries() {
	        $objs = array();
	        $h = DB::getInstance()->prepare("SELECT * FROM Country WHERE MAP=:map");
	        $h->setFetchMode(PDO::FETCH_CLASS,"Country");
	        $h->bindParam(":map", $this->id);
	        $h->execute();
	        $objs = $h->fetchAll();
	        return $objs;
	}
		

}
?>
