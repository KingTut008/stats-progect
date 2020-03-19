<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>
    

    <h1>Статистика активносте пользователей:</h1>
    <form action="/statistic/" method="POST">
        <p>Выберите день и время начало периуда</p>
        <input type="datetime-local" name="dateStart" id="dateStart" required>
        <p>Выберите день и время конца периуда</p>
        <input type="datetime-local" name="dateEnd" id="dateEnd">
        <input type="submit" name="sum" value="Таблица сумарных значений">
        <input type="submit" name="average" value="Таблица средних значений">
    </form>
    <?php 
        echo "<pre>";
        var_dump($dataArray);
        echo "<pre>";
    ?>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>