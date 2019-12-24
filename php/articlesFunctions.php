<?
function showLastArticle()
{
    require("php/connect.php");
    $articleQuery = $pdo->query("SELECT article.id, name, description, author, username  
                       FROM article
                       INNER JOIN users
                       ON author = users.id
                       ORDER BY id DESC LIMIT 1");
    $article = $articleQuery->fetch(PDO::FETCH_OBJ);
?>
    <div class='article'>
        <h2 class="article__name"><? echo $article->name; ?></h2>
        <p class="article__description"><? echo $article->description; ?></p>
        <p class="article__author"><? echo $article->username; ?></p>
        <a href="articles/post.php?postId=<? echo $article->id ?>" class="btn btn-glass text-center">Открыть запись</a>
    </div>
<?
}

function getArticlesList($lastPost = 0, $amountPostInPage = 5)
{
    require("php/connect.php");

    $articles = $pdo->prepare("SELECT article.id, name, description, author, username  
                               FROM article
                               INNER JOIN users
                               ON author = users.id
                               LIMIT ? OFFSET ?");
    $articles->bindValue(1, $amountPostInPage, PDO::PARAM_INT);
    $articles->bindValue(2, $lastPost, PDO::PARAM_INT);
    $articles->execute();

    return $articles;
}

function getArticlesPost($lastPost = 0, $amountPostInPage = 5)
{
    require("php/connect.php");

    $page = $_GET["page"];


    if ($page < 1) $page = 1;
    $lastPost = ($page - 1) * $amountPostInPage;

    $articlesList = getArticlesList($lastPost, $amountPostInPage)->fetchAll(PDO::FETCH_OBJ);

    //Вывод записей
    if ($articlesList) {
        foreach ($articlesList as $value) {
    ?>
            <div class='article'>
                <h2 class="article__name"><? echo $value->name; ?></h2>
                <p class="article__description"><? echo $value->description; ?></p>
                <p class="article__author"><? echo $value->username; ?></p>
                <a href="articles/post.php?postId=<? echo $value->id ?>" class="btn btn-glass text-center">Открыть запись</a>
            </div>
        <?
        }
        //Вывод навигации

        $amountPostQuery = $pdo->query('SELECT * FROM article');
        $amountPost = $amountPostQuery->rowCount();

        $amountPage = ceil($amountPost / $amountPostInPage);

        $thisUrl = $_SERVER['PHP_SELF'];
        //Выводит ссылки на предыдущую и первую страницу
        ?><div class="page-nav"><?
                                if ($page > 1) {
                                ?>
                <a href='<? echo $thisUrl; ?>?page=1 ' class="page-nav__item">
                    <<</a> <? if ($page > 2) { ?> <a href='<? echo $thisUrl; ?>?page=<? echo $page - 1; ?>' class="page-nav__item">
                        <</a> <?
                                    }
                                }

                                //Выводит ссылки на страницы $page + $i
                                for ($i = -3; $i < 3 && $page + $i <= $amountPage; $i++) {
                                    $pageNumber = $page + $i;
                                    if ($pageNumber < 1 || $pageNumber == $page) continue;
                                ?> <a href='<? echo $thisUrl; ?>?page=<? echo $pageNumber; ?>' class="page-nav__item"><? echo $pageNumber; ?>
                </a>

            <?
                                }

                                //Выводит ссылку на следующую и последнюю страницу
                                if ($page < $amountPage) {
            ?>
                <a href='<? echo $thisUrl; ?>?page=<? echo $page + 1; ?>' class="page-nav__item">></a>

                <? if ($page + 1 < $amountPage) { ?>

                    <a href='<? echo $thisUrl; ?>?page=<? echo $amountPage; ?>' class="page-nav__item">>></a>
            <?
                                    }
                                }
            ?></div><?
            } else {
                ?>

        <div class="article">
            <div class="article__error">
                <p>Упс, что-то пошло не так</p>
            </div>
        </div>

<?
            }
        }

?>