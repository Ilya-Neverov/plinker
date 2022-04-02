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
        $array = file('cataloq/' . $value . '.php');
        $delete = array("\r\n", "\r", "\n", " ");
        $file = str_replace($delete, "", $array);
        echo '<p>слудующие данные были удалены: </p>';
        echo '<p>название услуги: ' . "$file[0]" . '</p>';
        if ($file[1] !== "") {
            echo '<p>комментарий: ' . "$file[1]" . '</p>';
        }
        if ($file[2] !== "") {
            echo '<p>предложениеж: ' . "$file[2]" . 'по цене: ' . "$file[3]" . ' рублей</p>';
        }
        if ($file[4] !== "") {
            echo '<p>предложениеж: ' . "$file[4]" . 'по цене: ' . "$file[5]" . ' рублей</p>';
        }
        if ($file[6] !== "") {
            echo '<p>предложениеж: ' . "$file[6]" . 'по цене: ' . "$file[7]" . ' рублей</p>';
        }
        if ($file[8] !== "") {
            echo '<p>предложениеж: ' . "$file[8]" . 'по цене: ' . "$file[9]" . ' рублей</p>';
        }
        if ($file[10] !== "") {
            echo '<p>предложениеж: ' . "$file[10]" . 'по цене: ' . "$file[11]" . ' рублей</p>';
        }
        if ($file[12] !== "") {
            echo '<p>предложениеж: ' . "$file[12]" . 'по цене: ' . "$file[13]" . ' рублей</p>';
        }
        unlink('cataloq/' . $value . '.php');
        echo '<div><a class="button" href="position.php">Удалить еще позицию</a></div>';
        ?>
        
    </body>
</html>