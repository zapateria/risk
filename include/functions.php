<?PHP

/*
 * Functions Library
 *
 */

/* Return the Clients IP address using various methods */
function getIP() { 
	$ip; 
	if (getenv("HTTP_CLIENT_IP")) 
		$ip = getenv("HTTP_CLIENT_IP"); 
	else if(getenv("HTTP_X_FORWARDED_FOR")) 
		$ip = getenv("HTTP_X_FORWARDED_FOR"); 
	else if(getenv("REMOTE_ADDR")) 
		$ip = getenv("REMOTE_ADDR"); 
	else 
		$ip = "UNKNOWN";
	return $ip; 
}

function isAdjacent($c1, $c2) {
	$h = DB::getInstance()->prepare("SELECT * FROM Link WHERE (link1=:link1 AND link2=:link2) OR (link1=:link2 AND link2=:link1)");
	$h->bindParam(":link1", $c1->getShortname());
	$h->bindParam(":link2", $c2->getShortname());
	$h->execute();
	$obj = $h->fetchColumn();
	if ($obj)
		return true;
	else
		return false;
}

function getGames() {
	$objs = array();
	$h = DB::getInstance()->prepare("SELECT * FROM Game");
	$h->setFetchMode(PDO::FETCH_CLASS,"Game");
	$h->execute();
	$objs = $h->fetchAll();
	return $objs;
}

/* Returns an array of all Player Objects */
function getPlayers() {
	$objs = array();
	$h = DB::getInstance()->prepare("SELECT * FROM Player");
	$h->setFetchMode(PDO::FETCH_CLASS,"Player");
	$h->execute();
	$objs = $h->fetchAll();
	return $objs;
}

/* Loads and returns an Object of Class
 * TODO: Database Exception Handling and argument checking
 * TODO: Consolidate Object Loading for all Classes
 */
function loadObject($id,$class) {
	$h = DB::getInstance()->prepare("SELECT * FROM $class WHERE id=:id");
	$h->setFetchMode(PDO::FETCH_CLASS, $class);
	$h->bindParam(":id", $id);
	$h->execute();
	$obj = $h->fetch();
	return $obj;
}

function loadSector($sector) {
	$h = DB::getInstance()->prepare("SELECT * FROM Sector WHERE sector=:sector");
	$h->setFetchMode(PDO::FETCH_CLASS,"Sector");
	$h->bindParam(":sector", $sector);
	$h->execute();
	$obj = $h->fetch();
	return $obj;
}

function loadResource($type) {
	$h = DB::getInstance()->prepare("SELECT * FROM Resource WHERE type=:type");
	$h->setFetchMode(PDO::FETCH_CLASS,"Resource");
	$h->bindParam(":type", $type);
	$h->execute();
	$obj = $h->fetch();
	return $obj;
}

function getShipsInSector($sector) { // By Sector# not Sector->id
	$objs = array();
	$h = DB::getInstance()->prepare("SELECT Ship.* FROM Ship,Sector WHERE Sector.sector=:sector and Ship.sector=Sector.id");
	$h->setFetchMode(PDO::FETCH_CLASS,"Ship");
	$h->bindParam(":sector", $sector);
	$h->execute();
	$objs = $h->fetchAll();
	return $objs;
}

function getPortsInSector($sector) { // By Sector# not Sector->id
	$objs = array();
	$h = DB::getInstance()->prepare("SELECT Port.* FROM Port,Sector WHERE Sector.sector=:sector and Port.sector=Sector.id");
	$h->setFetchMode(PDO::FETCH_CLASS,"Port");
	$h->bindParam(":sector", $sector);
	$h->execute();
	$objs = $h->fetchAll();
	return $objs;
}

function getPlanetsInSector($sector) { // By Sector# not Sector->id
	$objs = array();
	$h = DB::getInstance()->prepare("SELECT Planet.* FROM Planet,Sector WHERE Sector.sector=:sector and Planet.sector=Sector.id");
	$h->setFetchMode(PDO::FETCH_CLASS,"Planet");
	$h->bindParam(":sector", $sector);
	$h->execute();
	$objs = $h->fetchAll();
	return $objs;
}

function getUnitsInSector($sector) { // By Sector# not Sector->id
	$objs = array();
	$h = DB::getInstance()->prepare("SELECT Unit.* FROM Unit,Sector WHERE Sector.sector=:sector and Unit.sector=Sector.id");
	$h->setFetchMode(PDO::FETCH_CLASS,"Unit");
	$h->bindParam(":sector", $sector);
	$h->execute();
	$objs = $h->fetchAll();
	return $objs;
}

/* Messaging Functions
 * TODO: Rewrite
 */
function getMessages($player) {
	$msgs = array();
	$out = "";
	$h = DB::getInstance()->prepare("SELECT Message.* FROM Message,Player WHERE Player.id=:id AND Message.msgto=Player.id AND Message.read IS NULL ORDER BY Message.stamp ASC");
	$h->setFetchMode(PDO::FETCH_CLASS,"Message");
	$h->bindParam(":id", $player->getID());
	$h->execute();
	$msgs = $h->fetchAll();
	foreach ($msgs as $m) {
		$out .= $m->display();
//		$m->delete();
	}
	return $out;
}

function message($player, $msg, $from = 0,$type = "Log") {
	$m = new Message();
	$m->create();
	$m->setTo($player);
	if ($from) {
		$m->setFrom($from);
	}
	$m->setMsg($msg);
	$m->setStamp(time());
	$m->setType($type);
	$m->save();
}
?>
