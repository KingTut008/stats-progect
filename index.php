<?php 

$setConnection = "host=localhost port=5432 dbname=mydb user=admin password=admin";
$dbConnection = pg_connect($setConnection);

var_dump($dbConnection);

if (isset($_POST['enter'])) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        $massege = "Вы вошли как ".$_POST['login'];
    }
    else {
        $massege = "Вы ввели не правильные данные";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Главная страница тестового задания</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" name="login" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <input class="btn_enter" type="submit" name="enter" value="Вход">
        <input class="btn_reg" type="submit" name="refister" value="Регистрация">
    </form>
    <div class="result"><?= $massege ?? " " ?></div>
</body>
</html>