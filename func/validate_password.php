<?PHP
require_once "../classes/db.class.php";

$message = "";

if (!isset( $_POST['password'])) {
	$message = 'Please enter a valid password';
} elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 3) {
	$message = 'Incorrect Length for password';
} elseif (ctype_alnum($_POST['password']) != true) {
	$message = "Password must be alpha numeric";
} elseif ($_POST['password'] != $_POST['password2']) {
	$message = "Passwords do not match";
}
echo $message;
?>
