<? require_once("php/structure/header.php") ?>
<div class="container">
    <? if (!$_SESSION['username']) { ?>

        <form class="form-column" action="php/authorization.php" method="POST">
            <h2>Авторизация</h2>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit">
        </form>
        <? if ($_GET['falseMsg'] == "data") {
                echo ("<p>Неправильное имя пользователя или пароль</p>");
            } else if ($_GET['falseMsg'] == "input") {
                echo ("<p>Введите все поля</p>");
            } ?>

    <? } else {
        echo "<p>" . $_SESSION["username"] . ", вход произведён </p>";
    } ?>
</div>
<? require_once("php/structure/footer.php") ?>