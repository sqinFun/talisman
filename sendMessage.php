<? require_once("php/structure/header.php") ?>
<div class="container">
    <div class="message">
        <div class="section">
            <div class="message__history">
            </div>
        </div>
        <div class="section">
            <form action="" class="message__form">
                <textarea name="msg-text" class=message__text></textarea>
                <input class="btn btn-dark mt-10" type="submit" value="Отправить">
            </form>
        </div>
    </div>
</div>
<script src="/js/message.js"></script>
<? require_once("php/structure/footer.php") ?>