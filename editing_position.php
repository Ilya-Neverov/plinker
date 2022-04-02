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
        <h1>Результат редактирования данных</h1>
        
        <?php
        foreach ($_POST as $key => $value) {
            $value = trim(strip_tags(filter_input(INPUT_POST, "$key", FILTER_UNSAFE_RAW)));
            if ($value == false) {
                $value = " ";
            } else {
                $value = $value . " ";
            }
            if ($value == true) {
                $data[] = $value;
            }
            $data[0] = trim($data[0]);
        }
        if ($data[0] == "") {
            echo '<p>упс что-то пошло не так</p>';
            echo '<p>Название услуги являеться обязательным полем =( </p>';
            echo '<div><input class="button" type="button" onclick="history.back();" value="Вернуться на шаг назад"/></div>';
        } else {
            file_put_contents("cataloq/" . "$data[0]" . ".php", implode("\n", $data), LOCK_EX);
            echo '<p>Следующие данные были удачно сохранены: </p>';
            echo '<p>название услуги: ' . "$data[0]" . '</p>';
            if ($data[1] !== " ") {
                echo '<p>комментарий: ' . "$data[1]" . '</p>';
            }
            if ($data[2] !== " ") {
                echo '<p>предложениеж: ' . "$data[2]" . 'по цене: ' . "$data[3]" . ' рублей</p>';
            }
            if ($data[4] !== " ") {
                echo '<p>предложениеж: ' . "$data[4]" . 'по цене: ' . "$data[5]" . ' рублей</p>';
            }
            if ($data[6] !== " ") {
                echo '<p>предложениеж: ' . "$data[6]" . 'по цене: ' . "$data[7]" . ' рублей</p>';
            }
            if ($data[8] !== " ") {
                echo '<p>предложениеж: ' . "$data[8]" . 'по цене: ' . "$data[9]" . ' рублей</p>';
            }
            if ($data[10] !== " ") {
                echo '<p>предложениеж: ' . "$data[10]" . 'по цене: ' . "$data[11]" . ' рублей</p>';
            }
            if ($data[12] !== " ") {
                echo '<p>предложениеж: ' . "$data[12]" . 'по цене: ' . "$data[13]" . ' рублей</p>';
            }
            echo '<div><a class="button" href="position.php">Редактировать еще позицию</a></div>';
        }
        ?>
        
    </body>
</html>