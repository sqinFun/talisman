<?
require("php/connect.php");
$categoryQuery = $pdo->query("SELECT *  
                       FROM categories");
$category = $categoryQuery->fetchAll(PDO::FETCH_OBJ);
?>
<select name="category" required>
<option value="" disabled selected>Выберите категорию</option>
    <?
    foreach ($category as $value) {
    ?>
        <option value="<? echo $value->id ?>"><?echo $value->name ?></option>
    <? } ?>
</select>