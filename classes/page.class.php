<?PHP
class Page {

	protected $zones = array();
	protected $title = "Game";
	protected $header = "";
	protected $content = "";

	public function __construct($title) {
		if ($title) {
			$this->title = $title;
		}
		$this->renderLogin();
	}

	public function addHeader($h) {
		$this->header .= $h;
	}

	public function addContent($c) {
		$this->content .= $c;
	}

	public function addZone($zone) {
		array_push($this->zones, $zone);
	}

	public function getZone($loc) {
		foreach ($this->getZones() as $z) {
			if ($z->getLoc() == $loc) {
				return $z;
			}
		}
	}

	public function getZones() {
		return $this->zones;
	}


	public function renderHeader() {
		echo 
<<<EOD
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>{$this->title}</title>
<link rel="stylesheet" href="game.css" media="all">
<link rel="stylesheet" href="map.css" media="all">
<link rel="stylesheet" href="include/tipsy-0.1.7/src/stylesheets/tipsy.css" media="all">
<link rel="stylesheet" href="flick/jquery-ui-1.10.2.custom.css" media="all">
<script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/func.js"></script>
<script type="text/javascript" src="include/jquery-ui-1.8.12.custom.min.js"></script>
<script type="text/javascript" src="include/tipsy-0.1.7/src/javascripts/jquery.tipsy.js"></script>
{$this->header}
</head>

EOD;
	}

	public function renderLogin() {
/*** START USER IS NOT LOGGED IN ***/
        	if (!isset($_SESSION['user_id'])) {
                $login_form = <<<EOD
<div id="login-window" title="User Login">
<form action="login_submit.php" method="post"><p>
<label for="username">Username</label> <input type="text" id="username" name="username" value="" maxlength="20"> </p> <p>
<label for="password">Password</label> <input type="password" id="password" name="password" value="" maxlength="20"> </p> <p>
<button id=login type="submit" value="Login">Login</button><button id=register>Create New</button> </p> </form>
EOD;
                        $this->addZone($userinfo = new Zone("userinfo"));
                        $userinfo->addItem(new Item($login_form));
                        $this->renderPage();
                        die();
                }
//	        $this->addZone(new Zone("userinfo"));

/*** END: USER IS NOT LOGGED IN ***/
	}

	public function renderBody() {
		echo "<body>\n<div id=page>\n";

		echo $this->content;

		foreach ($this->getZones() as $z) {
			$z->renderZone();
		}
		echo "</div>\n</body>\n";
	}

	public function renderFooter() {
		echo "</html>\n";
	}

	public function renderPage() {
		$this->renderHeader();
		$this->renderBody();
		$this->renderFooter();
	}
}

?>
