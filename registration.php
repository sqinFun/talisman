<? require_once("php/structure/header.php") ?>
<div class="container">
<h2>Регистрация</h2>
    <form class="form-column" onsubmit="sendForm('#registration-form', '/php/registration.php');return false" id="registration-form" method="POST">
        <input type="text" name="username" placeholder="Username*">
        <input type="password" name="password" placeholder="Password*">
        <input type="email" name="email" placeholder="Email*">
        <input type="text" name="fname" placeholder="Fname*">
        <input type="text" name="lname" placeholder="Lname">
        <input type="submit">
    </form>
</div>
<? require_once("php/structure/footer.php") ?>