<?PHP

class Country extends Object {

	protected $shortname;
	protected $longname;
	protected $map;
	protected $value;

	public function getShortname() {
		return $this->shortname;
	}
	public function getLongname() {
		return $this->longname;
	}
	public function getText() {
		return "?";
	}

	public function getOwner($g) {
		
	}

	public function getUnit($game) {
                $objs = array();
                $h = DB::getInstance()->prepare("SELECT * FROM Unit WHERE game=:game AND country=:country");
                $h->setFetchMode(PDO::FETCH_CLASS,"Unit");
                $h->bindParam(":country", $this->id);
                $h->bindParam(":game", $game->getID());
                $h->execute();
                $objs = $h->fetch();
                return $objs;
        }


	public function getImage() {
			$out = "";
			$out .= "<img class=unit id=".$this->getId()." src=/img/soldier.png title='".$this->getLongname()."'>";
			return $out;
	}

}
?>
