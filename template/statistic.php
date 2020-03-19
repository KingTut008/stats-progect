<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>
    

    <h1>Статистика активности пользователей:</h1>
    <form action="/statistic/" method="POST">
        <p>Выберите день и время начало периуда</p>
        <input type="datetime-local" name="dateStart" id="dateStart" required>
        <p>Выберите день и время конца периуда</p>
        <input type="datetime-local" name="dateEnd" id="dateEnd">
        <input type="submit" name="sum" value="Таблица сумарных значений">
        <input type="submit" name="average" value="Таблица средних значений">
    </form>
    <?php 
        if (isset($dataArray)) {
            ?>
            <table>
                <thead>
                    <tr>
                        <td>Имя пользователя</td>
                        <td>00:00<br>-<br>00:59</td>
                        <td>01:00<br>-<br>01:59</td>
                        <td>02:00<br>-<br>02:59</td>
                        <td>03:00<br>-<br>03:59</td>
                        <td>04:00<br>-<br>04:59</td>
                        <td>05:00<br>-<br>05:59</td>
                        <td>06:00<br>-<br>06:59</td>
                        <td>07:00<br>-<br>07:59</td>
                        <td>08:00<br>-<br>08:59</td>
                        <td>09:00<br>-<br>09:59</td>
                        <td>10:00<br>-<br>10:59</td>
                        <td>11:00<br>-<br>11:59</td>
                        <td>12:00<br>-<br>12:59</td>
                        <td>13:00<br>-<br>13:59</td>
                        <td>14:00<br>-<br>14:59</td>
                        <td>15:00<br>-<br>15:59</td>
                        <td>16:00<br>-<br>16:59</td>
                        <td>17:00<br>-<br>17:59</td>
                        <td>18:00<br>-<br>18:59</td>
                        <td>19:00<br>-<br>19:59</td>
                        <td>20:00<br>-<br>20:59</td>
                        <td>21:00<br>-<br>21:59</td>
                        <td>22:00<br>-<br>22:59</td>
                        <td>23:00<br>-<br>23:59</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        for ($i = 0; $i < count($dataArray); $i++){
                            ?>
                            <tr>
                                <?php 
                                    for ($k=0; $k < count($dataArray[$i]) ; $k++) { 
                                        ?>
                                        <td><?=$dataArray[$i][$k]?></td>
                                        <?
                                    }
                                ?>
                            </tr>
                            <?
                        }
                    ?>
                </tbody>
            </table>
    <?php
        }
    ?>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>