<?

require("connect.php");
require_once('session/sessionStart.php');


$sender = $_SESSION['userid'];

$findQuery = $pdo->prepare('SELECT username, message , messages.recipient
                            FROM messages
                            INNER JOIN users
                            ON recipient = users.id
                            WHERE sender=:sender AND
                            messages.id IN
                            (SELECT MAX(id)
                            FROM messages
                            GROUP BY recipient)
                            ');
$findQuery->execute(array('sender' => $sender));
$res = $findQuery->fetchAll(PDO::FETCH_OBJ);

echo json_encode($res);

?>