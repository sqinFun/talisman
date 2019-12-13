<?

require("connect.php");
require_once('session/sessionStart.php');

$sender = $_SESSION['userid'];

$findQuery = $pdo->prepare('SELECT recipient, username
                            FROM friends
                            INNER JOIN users
                            ON recipient = users.id
                            WHERE sender=:sender');
$findQuery->execute(array('sender' => $sender));
$res = $findQuery->fetchAll(PDO::FETCH_OBJ);

echo json_encode($res);

?>