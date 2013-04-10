<?PHP
require_once "../classes/db.class.php";

$message = "";

if (!isset( $_POST['username'])) {
    $message = 'Please enter a valid username';
} elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 3) {
    $message = 'Incorrect length for Username';
} elseif (ctype_alnum($_POST['username']) != true) {
    $message = "Username must be alpha numeric";
} else {
	$username = $_POST['username'];

	try {
        $stmt = DB::getInstance()->prepare("SELECT id, username, password FROM Player
                    WHERE lower(username) = lower(:username)");

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        $stmt->execute();

        $user_id = $stmt->fetchColumn();

        if($user_id == true)
		$message = "Username already exists. Please pick another one.";
	} catch(Exception $e)    {
	       	$message = 'We are unable to process your request. Please try again later"';
	}

}
	echo $message;
?>
