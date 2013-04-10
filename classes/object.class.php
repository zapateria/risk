<?PHP

/*
 * The Object Class
 *
 * This is the basis for all Game Objects and contains basic functions
 * for storing and retrieving data from the Database to PHP Objects
 *
 */

class Object {

	protected $id;			// The Global Sequence ID for this Objects

	public function getID() {
		return $this->id;
	}

	public function setID($newid) {
		$this->id = $newid;
	}

/* This Objects Class = Table name in Database.
 * Loops through all Variables and Updates the Database with new Values 
 * If the variable is an array, serialize this before storing
 * TODO: Database Exception handling
 */
	public function save() {
		$class = get_class($this);
		$vars = get_object_vars($this);

		foreach ($vars as $varname => $value) {
		        $h = DB::getInstance()->prepare("UPDATE $class SET ".$varname."=:value WHERE id=:id");
			if (is_array($value)) {
				$value = serialize($value);
			}
		        $h->bindParam(":value", $value);
		        $h->bindParam(":id", $this->getID());
		        $h->execute();
		}

	}

/* Creates a new Row in the Database containing this Object
 * TODO: Database Exception Handling
 */
	public function create() {
		$class = get_class($this);
	        $h = DB::getInstance()->prepare("INSERT INTO $class (id) values(nextval('object_id'))");
	        $h->execute();
		$i = DB::getInstance()->lastInsertId("object_id");
		$this->setID($i);
		$this->save();
	}

/* Deletes a Row from the Database containing this Object
 * TODO: Database Exception Handling
 */
	public function delete() {
		$class = get_class($this);
	        $h = DB::getInstance()->prepare("DELETE FROM $class WHERE id=:id");
	        $h->bindParam(":id", $this->getID());
	        $h->execute();
		unset($this);
	}

}

?>
