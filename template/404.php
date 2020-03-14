<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>

    <h1>Упс! Данной страницы не существует. Через 5 секунд вы будете перенаправлены на главную страницу!</h1>

    <script type="text/javascript">
        setTimeout('location.replace("/")',5000);
    </script>

<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>