<?
require_once('session/sessionStart.php');
require_once("connect.php");
$postId = $_GET['postId'];

$getPostQuery = $pdo->prepare("SELECT name, description, content
                               FROM article 
                               where id=? 
                               LIMIT 1");
$getPostQuery->execute(array($postId));
$post = $getPostQuery->fetch(PDO::FETCH_OBJ);

echo "<h2 class='post-name'>" . $post->name . "</h2>
<div class='post-description'>" . $post->description . "</div>
<div class='post-content'>". $post->content . "</div>";