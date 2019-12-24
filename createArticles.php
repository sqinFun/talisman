<? require_once("php/structure/header.php") ?>
<div class="container">
    <h1 class="text-center text-title">Добавление записи</h1>
    <div class="section">
        <form class="pithy-form" action="php/createArticle.php" method="POST">
            <input name="name" type="text" placeholder="Заголовок" required>
            <textarea name="description" placeholder="Описание" required></textarea>
            <textarea name="content" placeholder="Содержимое" required></textarea>
            <? require("php/showCategory.php") ?>
            <input class="btn btn-dark" type="submit" value="Выложить новость">
        </form>
    </div>
</div>
<? require_once("php/structure/footer.php") ?>