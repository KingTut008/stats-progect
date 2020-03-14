<?php 
error_reporting(E_ALL);

$setConnection = "host=localhost port=5432 dbname=mydb user=admin password=admin";
$dbConnection = pg_connect($setConnection);

if (isset($_POST['enter'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $pgResult = pg_query($dbConnection, "SELECT login, password FROM users WHERE login = '$login'");
    $pgData = pg_fetch_assoc($pgResult);
    if(pg_num_rows($pgResult)) {
        if ($pgData['login'] == $login && $pgData['password'] == $password) {
            header('location: http://'.$_SERVER['HTTP_HOST'].'/action/', true, 301);
        } else {
            $massege = "Вы ввели не равильный пароль";
        }
    } else {
        $massege = "Данного ползователя нет в системе";
    }
}

if (isset($_POST['register'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $pgResult = pg_query($dbConnection, "SELECT login, password FROM users WHERE login = '$login'");
    if(!pg_num_rows($pgResult)){
        $pgResult = pg_query($dbConnection, "INSERT INTO users (login, password) VALUES ('$login', '$password')");
        if ($pgResult) {
            $massege = "Данные успешно занесены в базу";
        } else {
            $massege = "Произошла ошибка";
        }
    } else {
        $massege = "Такой пользователь уже существует";
    }
}

switch (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    case '/': 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/main.php'; 
        break;
    case '/action/': 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/action.php'; 
        break;
    default: 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/404.php'; 
        break;
}

pg_close($dbConnection);
?>


