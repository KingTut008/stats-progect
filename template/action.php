<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>

    <form action="/action/" method="post">
        <input class="btn_action" type="submit" name="action" value="Добавить событие">
        <input class="btn_exit" type="submit" name="exit" value="Выйти">
    </form>
    <div class="result"><?= $massege ?? " " ?></div>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>