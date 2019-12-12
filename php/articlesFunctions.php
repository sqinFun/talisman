<?

function getArticlesList($lastPost = 0, $amountPostInPage = 5) {
    require("php/connect.php");

    $articles = $pdo->prepare("SELECT id, name, description, author  FROM article LIMIT ? OFFSET ?");
    $articles->bindValue(1,$amountPostInPage, PDO::PARAM_INT);
    $articles->bindValue(2,$lastPost, PDO::PARAM_INT);
    $articles->execute();

    return $articles;
}

function getArticlesPost($lastPost = 0, $amountPostInPage = 5) {
    require("php/connect.php");
    
    $page = $_GET["page"];
    

    if($page < 1) $page = 1;
    $lastPost = ($page-1) * $amountPostInPage;
    
    $articlesList = getArticlesList($lastPost, $amountPostInPage)->fetchAll(PDO::FETCH_UNIQUE);

    //Вывод записей
    if ($articlesList) {
        foreach($articlesList as $value) {
            ?>
            <div class='article'>
                <h2 class="article__name"><?echo $value['name'];?></h2>
                <p class="article__description"><?echo $value['description'];?></p>
                <p class="article__author"><?echo $value['author'];?></p>
            </div>
            <?
        }
        //Вывод навигации

        $amountPostQuery = $pdo->query('SELECT * FROM article');
        $amountPost = $amountPostQuery->rowCount();

        $amountPage = ceil($amountPost/$amountPostInPage);
        
        $thisUrl = $_SERVER['PHP_SELF'];
        //Выводит ссылки на предыдущую и первую страницу
        if($page > 1) {
            ?>
            <a href = '<?echo $thisUrl; ?>?page=1 ' class="page-nav__item">В начало</a>

            <? if($page>2) {?>

            <a href = '<?echo $thisUrl; ?>?page=<?echo $page-1; ?>' class="page-nav__item">Назад</a>
            <?
            }
        }

        //Выводит ссылки на страницы $page + $i
        for ($i = -3; $i < 3 && $page + $i <= $amountPage; $i++) {
            $pageNumber = $page+$i;
            if($pageNumber<1 || $pageNumber == $page) continue;
            ?>

            <a href = '<?echo $thisUrl;?>?page=<?echo $pageNumber; ?>' class="page-nav__item"><?echo $pageNumber; ?></a>

            <?
        }

        //Выводит ссылку на следующую и последнюю страницу
        if($page < $amountPage) {
            ?>
            <a href = '<?echo $thisUrl; ?>?page=<?echo $page+1;?>' class="page-nav__item">Вперёд</a>

            <? if($page+1 < $amountPage) {?>

            <a href = '<?echo $thisUrl; ?>?page=<?echo $amountPage; ?>' class="page-nav__item">В конец</a>
            <?
            }
        }
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