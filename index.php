<?php 
error_reporting(E_ALL);
session_start();

$setConnection = "host=localhost port=5432 dbname=mydb user=admin password=admin";
$dbConnection = pg_connect($setConnection);

if (isset($_POST['exit'])) {
    unset($_SESSION['loginId']);
    session_destroy();
}

if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == "/action/" && !isset($_SESSION['loginId'])) {
    header('location: http://'.$_SERVER['HTTP_HOST'].'/', true, 301);
}

if (isset($_POST['action'])) {
    $actionDate = date("Y-m-d H:i:s", time());
    $userid = $_SESSION['loginId'];
    $pgResult = pg_query($dbConnection, "INSERT INTO actions_user (user_id, action_date) VALUES ('$userid', '$actionDate')");
    if($pgResult) {
        $massege = " Событие успешно добавленно";
    } else {
        $massege = "Произошла ошибка";
    }
}

if (isset($_POST['enter'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $pgResult = pg_query($dbConnection, "SELECT id, login, password FROM users WHERE login = '$login'");
    $pgData = pg_fetch_assoc($pgResult);
    if(pg_num_rows($pgResult)) {
        if ($pgData['login'] == $login && $pgData['password'] == $password) {
            $_SESSION['loginId'] = $pgData['id'];
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

if (isset($_POST['generate'])) {
    $userid = $_SESSION['loginId'];
    $string_query = "INSERT INTO actions_user (user_id, action_date) VALUES ";
    for ($i = 0; $i < 300; $i++) {
        $day = rand(1, 31);
        $huor = rand(0, 23);
        $min = rand(0, 59);
        $sec = rand(0, 59);
        if ($huor < 10) {
            $huor = '0'.$huor;
        }
        if ($min < 10) {
            $min = '0'.$min;
        }
        if ($sec < 10) {
            $sec = '0'.$sec;
        }
        if ($day < 10) {
            $day = '0'.$day;
        }
        $date = "2020-03-$day $huor:$min:$sec";
        $string_query .= "('".$userid."', '".$date."'),";
    }
    $string_query = rtrim( $string_query, ',' );  
    $pgResult = pg_query($dbConnection, $string_query); 
    if($pgResult) {
        $massege = "Данные успешно сгенерированы и добавлены в базу (300 записей)";
    } else {
        $massege = "Произошла ошибка при геренации данных и добавления в базу";
    } 
}

switch (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    case '/': 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/main.php'; 
        break;
    case '/action/': 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/action.php'; 
        break;
    case '/statistic/': 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/statistic.php'; 
        break;
    default: 
        include $_SERVER['DOCUMENT_ROOT'] . '/template/404.php'; 
        break;
}

pg_close($dbConnection);
?>


