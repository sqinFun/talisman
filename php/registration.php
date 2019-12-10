<?
require_once("connect.php");

$content = trim(file_get_contents("php://input"));

$registrInfo = json_decode($content, true);

$username = $registrInfo['username'];
$password = $registrInfo["password"];
$email = $registrInfo['email'];
$fname = $registrInfo['fname'];
$lname = $registrInfo['lname'];

include_once("class.php");


$response = new Response();

if (strlen($username) && strlen($password) && strlen($email) && strlen($fname)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sendUserInfo = $pdo->prepare('INSERT INTO users (username, password, email, fname, lname) values(?,?,?,?,?)');
    $result = $sendUserInfo->execute(array($username, $passwordHash, $email, $fname, $lname));
    if($result) {
        $response->isСorrect = true;
        $response->msg = "Регистрация успешно завершена";
    } else {
        $response->msg = "Ошибка регистрации";
    }    
} else {
    $response->msg = "Заполните все обязательные поля";
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

?>
