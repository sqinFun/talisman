<?
require("connect.php");
require_once("session/sessionStart.php");
$content = trim(file_get_contents("php://input"));
$content = json_decode($content, true);
$sender = $_SESSION['userid'];

$recipient = $content['recipient'];
$msg = $content['msg'];


$sendMsg = $pdo->prepare('INSERT INTO messages (sender, recipient, message, time) values(?,?,?, NOW())');
$result = $sendMsg->execute(array($sender, $recipient, $msg));


echo json_encode($result, JSON_UNESCAPED_UNICODE);

?>
