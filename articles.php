<? require_once("php/structure/header.php") ?>


<div class="container">
    <h1 class="text-center text-title">
        Новости
    </h1>
    <div class="section">
        <?
        require_once("php/articlesFunctions.php");
        getArticlesPost(0, 4);
        ?>
    </div>

</div>
<? require_once("php/structure/footer.php") ?>