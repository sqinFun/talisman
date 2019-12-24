<? require_once("php/structure/header.php") ?>
<div class="container">
    <h1 class="text-center text-title">Авторизация</h1>
    <div class="section">
        <? if (!$_SESSION['username']) { ?>
            <form class="form-column" action="php/authorization.php" method="POST">
                <div class="form-column__item">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-column__item">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="form-column__item">
                    <input class="btn btn-dark" type="submit">
                </div>
            </form>
            <? if ($_GET['falseMsg'] == "data") {
                echo ("<p class='msg-danger'>Неправильное имя пользователя или пароль</p>");
            } else if ($_GET['falseMsg'] == "input") {
                echo ("<p class='msg-danger'>Введите все поля</p>");
            } ?>

        <? } else {
            echo "<p>" . $_SESSION["username"] . ", вход произведён </p>";
        } ?>
    </div>
</div>
<? require_once("php/structure/footer.php") ?>