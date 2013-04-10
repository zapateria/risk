<?PHP

require_once "classes/db.class.php";

session_start();

if (isset( $_SESSION['user_id'] )) {
    $message = 'User is already logged in';
}
if (!isset( $_POST['username'], $_POST['password'])) {
    $message = 'Please enter a valid username and password';
} elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 3) {
    $message = 'Incorrect Length for Username';
} elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 3) {
    $message = 'Incorrect Length for Password';
} elseif (ctype_alnum($_POST['username']) != true) {
    $message = "Username must be alpha numeric";
} elseif (ctype_alnum($_POST['password']) != true) {
        $message = "Password must be alpha numeric";
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = sha1($password);
    

    try
    {
        $stmt = DB::getInstance()->prepare("SELECT id, username, password FROM Player
                    WHERE lower(username) = lower(:username) AND password = :password");

        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        $stmt->execute();

        $user_id = $stmt->fetchColumn();

        if($user_id == false) {
                $message = 'Login Failed';
        } else {
                $_SESSION['user_id'] = $user_id;
                $message = 'You are now logged in';
		header("Location: ui.php");
        }


    }
    catch(Exception $e)
    {
        $message = 'We are unable to process your request. Please try again later"';
    }
}
echo $message;
