<? require_once("php/structure/header.php") ?>
<div class="wrapper">
    <div class="container">
        <h1 class="text-center text-title">Регистрация</h1>
        <div class="section">
            <form class="form-column" onsubmit="sendForm('#registration-form', '/php/registration.php');return false" id="registration-form" method="POST">
                    <input type="text" name="username" placeholder="Введите свой логин*" required>
                    <input type="password" name="password" placeholder="Введите свой пароль*" required>
                    <input type="email" name="email" placeholder="Введите свой Email*" required>
                    <input type="text" name="fname" placeholder="Введите своё имя*" required>
                    <input type="text" name="lname" placeholder="Введите свою фамилию" required>
                    <input class="btn btn-dark" type="submit" value="Зарегистрироваться">
            </form>
        </div>
    </div>
</div>
<? require_once("php/structure/footer.php") ?>