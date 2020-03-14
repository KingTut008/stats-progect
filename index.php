<?php 
error_reporting(E_ALL);
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

?>


