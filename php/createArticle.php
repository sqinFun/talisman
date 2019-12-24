<?

require("connect.php");
require_once('session/sessionStart.php');

$name = $_POST['name'];
$description = $_POST['description'];
$content = $_POST['content'];
$category = $_POST['category'];
$author = $_SESSION['userid'];

$findQuery = $pdo->prepare('INSERT INTO article (name, description, content, category, author) values(?,?,?,?,?)');
$findQuery->execute(array($name, $description, $content, $category, $author));
header("Location: /articles.php");

?>