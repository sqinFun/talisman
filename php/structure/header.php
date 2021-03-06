<? require_once($_SERVER['DOCUMENT_ROOT'] . "/php/session/sessionStart.php") ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Talisman</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <div class="nav-wrap">
            <nav class="nav container">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="/index.php">Главная</a>
                    </li>
                    <li class="nav__item">
                        <a href="/articles.php">Новости</a>
                    </li>
                    <? if (!isset($_SESSION['username'])) {
                        ?>
                        <li class="nav__item">
                            <a href="/registration.php">Регистрация</a>
                        </li>
                        <li class="nav__item">
                            <a href="/authorization.php">Авторизация</a>
                        </li>
                        <?
                    } else {
                        ?>
                        <li class="nav__item">
                            <a href="/createArticles.php">Добавить новость</a>
                        </li>
                        <li class="nav__item">
                            <a href="/findFriends.php">Добавить друга</a>
                        </li>
                        <li class="nav__item">
                            <a href="/friendList.php">Друзья</a>
                        </li>
                        <?
                    }
                    ?>
                </ul>
                <?
                if (isset($_SESSION['username'])) {
                    ?>
                    <div class="nav__text">
                        <p class="m-0">Добро пожаловать на волшебный сайт, <?echo $_SESSION["username"] ?> <a id='session-destroy' class="text-dark"href = '/php/session/sessionDestroy.php'>Выход</a> </p>
                    </div>
                    <?
                }
                ?>
            </nav>
        </div>

    </header>