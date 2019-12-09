<?
$username = $_POST['username'];
$password = $_POST["password"];

if (strlen($username) && strlen($password)) {
    require_once("connect.php");

    $userPassword = $pdo->prepare("SELECT password FROM users where username=?");
    $userPassword->execute(array($username));
    if (password_verify($password, $userPassword->fetchColumn())) {
        $_SESSION['username'] = $username;
    }
} else {
    echo("Ошибка");
}

?>


<form class="form-column" action="" method="POST">
    <h2>Авторизация</h2>
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit">
</form>
