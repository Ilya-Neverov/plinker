<?php
error_reporting(0);
if ($_POST == true) {
    $mark = "1";
    $name = strip_tags(filter_input(INPUT_POST, 'name_fale', FILTER_UNSAFE_RAW));
    $name_fali = "cataloq/" . $name . ".php";
    $data = file($name_fali);
} else {
    $mark = "0";
    $data[0] = $data[1] = $data[2] = $data[3] = $data[4] = $data[5] = $data[6] = $data[7] = $data[8] = $data[9] = $data[10] = $data[11] = $data[12] = $data[13] = "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Позиции</title>
        <link href="css/save_position.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <ul class="menu">
            <li><a href="index.php">Форма</a></li>
            <li><a href="position.php">Позиции</a></li>
            <li><a href="issued.php">Выписанные сертификаты</a></li>
            <link href="css/position.css" rel="stylesheet" type="text/css"/>
        </ul>
        <h1>Позиции</h1>
        <a class="edit" href="mood_certificate.php">редактировать фона, шриф и расположение элиментов на сертификате, </a>
        
        <?php
        if ($mark == "0") {
            echo '<h2>Добавление позиции</h2>';
            echo '<form action="save_position.php" method="post">';
        } else {
            echo '<h2>Редактирование позиции</h2>';
            echo '<form action="editing_position.php" method="post">';
        }
        ?>

        <p>
            <label>Название услуги </label>
            <input name="name" type="text" size="59" value="<?php echo "$data[0]"; ?>" required <?php if ($mark == "1") {
            echo 'readonly';
        }; ?> >
        </p>   
        <p>   
            <label>Комментарий</label>
            <input name="comment" type="text" size="62" value="<?php echo "$data[1]"; ?>">
        </p>
        <table>
            <tr>
                <th>Предложение</th>
                <th>Цена</th>
            </tr>
            <tr>
                <td><input name="position1" type="text" size="50" value="<?php echo "$data[2]"; ?>"></td>
                <td><input name="price1" type="number" value="<?php echo "$data[3]"; ?>"></td>
            </tr>
            <tr>
                <td><input name="position2" type="text" size="50" value="<?php echo "$data[4]"; ?>"></td>
                <td><input name="price2" type="number" value="<?php echo "$data[5]"; ?>"></td>
            </tr>
            <tr>
                <td><input name="position3" type="text" size="50" value="<?php echo "$data[6]"; ?>"></td>
                <td><input name="price3" type="number" value="<?php echo "$data[7]"; ?>"></td>
            </tr>
            <tr>
                <td><input name="position4" type="text" size="50" value="<?php echo "$data[8]"; ?>"></td>
                <td><input name="price4" type="number" value="<?php echo "$data[9]"; ?>"></td>
            </tr>
            <tr>
                <td><input name="position5" type="text" size="50" value="<?php echo "$data[10]"; ?>"></td>
                <td><input name="price5" type="number" value="<?php echo "$data[11]"; ?>"></td>
            </tr>
            <tr>
                <td><input name="position6" type="text" size="50" value="<?php echo "$data[12]"; ?>"></td>
                <td><input name="price6" type="number" value="<?php echo "$data[13]"; ?>"></td>
            </tr>
        </table>
        
            <?php
            if ($mark == "0") {
                echo '<p><input class="button" type="reset" value="Очистить"></p>' . ' ';
                echo '<p><input class="button" type="submit" value="Соxранить"></p>';
                echo '</form>';
            } else {
                echo '<p><input class="button" type="submit" value="Соxранить"></p>' . ' ';
                echo '</form>';
                echo '<p><form class="p" action="position.php"><button class="button">Отмена редактирования</button></form></p>';
            }
            ?>

        <h2>Заведенные позиции</h2>
        
        <?php
        $file = array_diff(scandir('cataloq/'), ['..'], ['.']);
        echo '<table class="info" border="4" cellspacing="0" style="text-align: center; border: solid; border-color: #000000;" ><tr><th width="250">Услуга</th><th width="250">Позиция</th><th width="250">Стоимость</th><th>Редактировать</th><th>Удалить</th></tr>';
        foreach ($file as $value) {
            $way = 'cataloq/' . "$value";
            $r = file($way);
            echo '<tr>';
            echo '<td valign="center">';
            $r[0] = trim($r[0]);
            echo "$r[0]" . '<br>';
            if ($r[1] == true) {
                echo "$r[1]";
            }
            echo '</td>';
            echo '<td colspan="2"><table class="infoii" rules="cols" cellspacing="0" style="text-align: center; border-color: #000000;">';
            $s = count($r);                                             //14 элимента массива 
            for ($index = 2; $index < $s; $index = $index + 2) {
                if ((string) $r[$index] !== (string) " ") {
                    $price = $index + 1;
                    echo '<tr><td width="250">' . trim($r[$index]) . '</td>' . '<td width="250">' . trim($r[$price]) . '</td></tr>';
                }
            }
            echo '</table></td>';
            echo '<td><form action="position.php" method="post"><input type="hidden" name="name_fale" value="' . "$r[0]" . '"><button class="button">Редактировать</button></form></td>';
            echo '<td><form action="delete_position.php" method="post"><input type="hidden" name="name_fale" value="' . "$r[0]" . '"><button class="button">Удалить</button></form></td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>

    </body>
</html>

