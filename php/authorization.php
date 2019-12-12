<?
require_once('session/sessionStart.php');
$username = $_POST['username'];
$password = $_POST["password"];

if (strlen($username) && strlen($password)) {
    require_once("connect.php");

    $passwordQuery = $pdo->prepare("SELECT id, password FROM users where username=? LIMIT 1");
    $passwordQuery->execute(array($username));
    $userData = $passwordQuery->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $userData['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['userid'] = $userData['id'];
        header("Location: /");
    } else {
        header("Location: /authorization.php?falseMsg=data");
    }
} else {
    header("Location: /authorization.php?falseMsg=input");
}
?>