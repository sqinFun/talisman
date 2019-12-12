<? require_once("php/structure/header.php") ?>
<div class="container">
    <h2>Мои друзья</h2>
    <form action="" id="friend-form" method="POST">
        <p>Введите имя пользователя</p>
        <input type="text" name="username" placeholder="Имя пользователя">
        <input type="submit" value="Поиск">
    </form>
</div>
<script src="/js/findFriend.js"></script>
<? require_once("php/structure/footer.php") ?>