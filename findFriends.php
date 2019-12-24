<? require_once("php/structure/header.php") ?>
<div class="container">
    <h1 class="text-center text-title">Мои друзья</h1>
    <div class="section">
        <form action="" id="friend-form" method="POST">
            <input class="input-dark" type="text" name="username" placeholder="Имя пользователя">
            <input type="submit" class="btn btn-dark input-dark mt-10" value="Поиск">
        </form>
    </div>
</div>
<script src="/js/findFriend.js"></script>
<? require_once("php/structure/footer.php") ?>