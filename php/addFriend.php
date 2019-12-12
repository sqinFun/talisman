<?
require("connect.php");
require_once('session/sessionStart.php');

$content = trim(file_get_contents("php://input"));
$content = json_decode($content, true);

$sender = $_SESSION['userid'];
$recipient = $content['id'];

$findQuery = $pdo->prepare('SELECT * FROM friends where (sender=:sender AND recipient=:recipient) OR (sender=:recipient AND recipient=:sender)');
$findQuery->execute(array('sender' => $sender, 'recipient' => $recipient));
$result = $findQuery->fetchAll(PDO::FETCH_OBJ);

function addFriends() {
    
}

switch (count($result)) {
    case 0:
        $sendUserInfo = $pdo->prepare('INSERT INTO friends (sender, recipient) values(?,?)');
        $sendUserInfo->execute(array($sender, $recipient));
        $msg = "Запрос на добавление в друзья отправлен";
        break;
    case 1:
        if ($result[0]->sender == $sender) {
            $msg = "Запрос на добавление в друзья уже отправлен";
        } else {
            $sendUserInfo = $pdo->prepare('INSERT INTO friends (sender, recipient) values(?,?)');
            $sendUserInfo->execute(array($sender, $recipient));
            $msg = "Запрос на добавление в друзья принят";
        }

        break;

    case 2:
        $msg = "Пользователь уже у вас в друзьях";
        break;
}

if (!1) {

    $sendUserInfo = $pdo->prepare('INSERT INTO friends (sender, recipient) values(?,?)');
    $sendUserInfo->execute(array($sender, $recipient));
}

echo json_encode($msg);
