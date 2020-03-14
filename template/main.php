<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>

<form action="/" method="post">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <input class="btn_enter" type="submit" name="enter" value="Вход">
    <input class="btn_reg" type="submit" name="register" value="Регистрация">
</form>
<div class="result"><?= $massege ?? " " ?></div>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>