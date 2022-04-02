<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Результат редактирования данных</title>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="css/save_position.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>               
        <ul class="menu">
            <li><a href="index.php">Форма</a></li>
            <li><a href="position.php">Позиции</a></li>
            <li><a href="issued.php">Выписанные сертификаты</a></li>
        </ul>
        <h1>Удаленые данные</h1>
        
        <?php
        foreach ($_POST as $key => $value) {
            $value = trim(strip_tags(filter_input(INPUT_POST, "$key", FILTER_UNSAFE_RAW)));
        }
        $array = file('certificate/' . $value . '.php');
        $delete = array("\r\n", "\r", "\n");
        $file = str_replace($delete, "", $array);
        echo '<p>Был удален сертификат под № <b>' . "$file[0]" . '</b></p>';
        echo '<p>действующий с ' . "$file[1]" . '</p>';
        echo '<p>Срок окончания действия сертификата ' . "$file[2]" . '</p>';
        echo '<p>Выписанный: ' . "$file[3]" . '</p>';
        echo '<p>Заказанные услуги: ' . "$file[4]" . '</p>';
        unlink('certificate/' . $value . '.php');
        echo '<div><a class="button" href="issued.php">Удалить еще позицию</a></div>';
        ?>
        
    </body>
</html>