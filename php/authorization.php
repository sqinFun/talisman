<?
require_once('session/sessionStart.php');
$username = $_POST['username'];
$password = $_POST["password"];

if (strlen($username) && strlen($password)) {
    require_once("connect.php");

    $userPassword = $pdo->prepare("SELECT password FROM users where username=?");
    $userPassword->execute(array($username));
    if (password_verify($password, $userPassword->fetchColumn())) {
        $_SESSION['username'] = $username;
        header("Location: /");
    } else {
        header("Location: /authorization.php?falseMsg=data");
    }
} else {
    header("Location: /authorization.php?falseMsg=input");
}
?>