<?
$content = trim(file_get_contents("php://input"));
$content = json_decode($content, true);
$username = $content['username'];

include_once("class.php");
$response = new Response();

if (strlen($username)) {
    require("connect.php");
    include_once("class.php");
    $response = new Response();
    $username = "%$username%";

    $users = $pdo->prepare("SELECT id, username
                            FROM users
                            WHERE username LIKE ?
                            ");
    $users->execute(array($username));
    $userData = $users->fetchAll(PDO::FETCH_OBJ);
    /*
    if ($userData) {
        foreach($userData as $row) {
            array_push($response->addition, new UserData($row['id'], $row['username']));
        }
    }    
    */
    if ($userData) {
        foreach ($userData as $row) {
            array_push($response->addition, new UserData($row->id, $row->username));
        }
    } else {
        $response->msg = "Пользователь с таким именем не найден!";
    }
} else {
    $response->msg = "Введите имя";
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
