<?
require_once("connect.php");

$username = $_POST['username'];
$password = $_POST["password"];
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];



if (strlen($username) && strlen($password) && strlen($email) && strlen($fname)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sendUserInfo = $pdo->prepare('INSERT INTO users (username, password, email, fname, lname) values(?,?,?,?,?)');
    $result = $sendUserInfo->execute(array($username, $passwordHash, $email, $fname, $lname));
    if(!$result) {
        $fsmsg ="Ошибка";
    }
    
} else {
    $fsmsg ="Ошибка";
}





?>

<form class="form-column" action="" method="POST">
    <h2>Регистрация</h2>
    <? if(isset($smsg)){ ?><div><p><? echo $smsg ?></p></div><?}?>
    <? if(isset($fsmsg)){ ?><div><p><? echo $fsmsg ?></p></div><?}?>
    <input type="text" name="username" placeholder="Username*">
    <input type="password" name="password" placeholder="Password*">
    <input type="email" name="email" placeholder="Email*">
    <input type="text" name="fname" placeholder="Fname*">
    <input type="text" name="lname" placeholder="Lname">
    <input type="submit">
</form>