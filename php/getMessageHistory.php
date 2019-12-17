<?

require("connect.php");
require_once('session/sessionStart.php');

$content = trim(file_get_contents("php://input"));
$content = json_decode($content, true);

$sender = $_SESSION['userid'];
$recipient = $content['recipient'];

$findQuery = $pdo->prepare('SELECT username, message , messages.recipient
                            FROM messages
                            INNER JOIN users
                            ON sender = users.id
                            WHERE (sender=:sender AND recipient=:recipient) OR (sender=:recipient AND recipient=:sender)
                            ORDER BY time
                            ');
$findQuery->execute(array('sender' => $sender, 'recipient' => $recipient));
$res = $findQuery->fetchAll(PDO::FETCH_OBJ);

echo json_encode($res);

?>