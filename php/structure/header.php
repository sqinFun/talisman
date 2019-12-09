<? require_once($_SERVER['DOCUMENT_ROOT'] . "/php/session/sessionStart.php") ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talisman</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container">
            <nav class="nav">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="/index.php">Главная</a>
                    </li>
                    <li class="nav__item">
                        <a href="/registration.php">Регистрация</a>
                    </li>
                    <li class="nav__item">
                        <a href="/authorization.php">Авторизация</a>
                    </li>
                </ul>
            </nav>
        </div>
        <?
        if (isset($_SESSION['username'])) {
            echo "<p>Добро пожаловать на волшебный сайт, " . $_SESSION["username"] . "</p>";
            echo "<a id='session-destroy' href = '/php/session/sessionDestroy.php'>Выход</a>";
        }
        ?>
    </header>