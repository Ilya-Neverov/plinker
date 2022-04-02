<?php
$way = 'css/certificate_n.css';
$r = file($way);
$delete = array('font-size: ', 'transform: rotate(', 'color: ', 'margin-left: ', 'margin-top: ', 'px;', 'deg)', ';', "\r\n", "\r", "\n");
$r = str_replace($delete, "", $r);
$size = getimagesize("ris.png");
?>           

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Редактирования настроек сертификата</title>
        <link href="css/mood_certificate.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>               
        <ul class="menu">
            <li><a href="index.php">Форма</a></li>
            <li><a href="position.php">Позиции</a></li>
            <li><a href="issued.php">Выписанные сертификаты</a></li>
        </ul>
        <h1>Настройка расположения</h1>
        
        <p>ИНФОРМАЦИЯ О ФОНЕ ШИРИНА: <?php echo"$size[0]"; ?> PIXEL; ВЫСОТА <?php echo"$size[1]"; ?> PIXEL</p>
        
        <?php
        if (empty($_FILES['font'])) {
            echo '<div class="font">';
            echo '<form action="mood_certificate.php" enctype="multipart/form-data" method="post">';
            echo '<label>Загрузка шрифта (формат файла <b> .ttf </b>)</label>';
            echo '<input type="file" name="font">';
            echo '<input type="submit" value="Отправить">';
            echo '</form>';
            echo '</div>';
        } else {
            $tmp_name = $_FILES['font']['tmp_name'];
            $_FILES['font']['name'] = 'font.ttf';
            $name = $_FILES['font']['name'];
            $format = $_FILES['font']['type'];
            if ($format == 'application/octet-stream') {
                move_uploaded_file($tmp_name, 'font/' . $name);
                echo '<div class="font"><label>Шрифт сохранен</label></div>';
            } else {
                echo '<div class="font"><label>Шрифт не сохранен</label></div>';
            }
        }
        ?>

        <?php
        if (empty($_FILES['ris'])) {
            echo '<div class="font">';
            echo '<form  action="mood_certificate.php" enctype="multipart/form-data" method="post">';
            echo '<label>Загрузка фона (формат файла <b> .png </b>)</label>';
            echo '<input type="file" name="ris">';
            echo '<input type="submit" value="Отправить">';
            echo '</form>';
            echo '</div>';
        } else {
            $tmp_name = $_FILES['ris']['tmp_name'];
            $_FILES['ris']['name'] = 'ris.png';
            $name = $_FILES['ris']['name'];
            $format = $_FILES['ris']['type'];

            if ($format == 'image/png') {
                move_uploaded_file($tmp_name, $name);
                echo '<div class="font"><label>Фон сохранен</label></div>';
            } else {
                echo '<div class="font"><label>фон не сохранен</label></div>';
            }
        }
        ?>
        
        <form  action="save_certificate_n_css.php" method="post">
            <div class="block">    
            <h2>Настройка блока ФИО:</h2>
            <label>Размер шрифта в pixel </label>
            <input name="fio_sixe" type="number" value="<?php echo "$r[1]"; ?>" ><br><br>
            <label>Поворот текста в градусах</label>
            <input name="fio_rotate" type="number" max="360" min="-360" step="0.1" value="<?php echo "$r[2]"; ?>" ><br><br>
            <label>Цвет текста</label>
            <input name="fio_color" type="color" value="<?php echo $r[3]?>"><br><br>
            <label>Отступ от левого края в pixel (до центра блока)</label>
            <input name="fio_left" type="number" max="<?php echo"$size[0]"; ?>" min="0" value="<?php echo "$r[4]"; ?>" ><br><br>
            <label>Отступ от верхнего края в pixel (до центра блока)</label>
            <input name="fio_top" type="number" max="<?php echo"$size[1]"; ?>" min="0" value="<?php echo "$r[5]"; ?>" ><br><br>
            </div>
            <div class="block">
            <h2>Настройка блока услуг:</h2>
            <label>Размер шрифта в pixel</label>
            <input name="ser_sixe" type="number" value="<?php echo "$r[8]"; ?>" ><br><br>
            <label>Поворот текста в градусах</label>
            <input name="ser_rotate" type="number" max="360" min="-360" step="0.1" value="<?php echo "$r[9]"; ?>" ><br><br>
            <label>Цвет текста</label>
            <input name="ser_color" type="color" value="<?php echo $r[10]?>"><br><br>
            <label>Отступ от левого края в pixel (до центра блока)</label>
            <input name="ser_left" type="number" max="<?php echo"$size[0]"; ?>" min="0" value="<?php echo "$r[11]"; ?>" ><br><br>
            <label>Отступ от верхнего края в pixel (до центра блока)</label>
            <input name="ser_top" type="number" max="<?php echo"$size[1]"; ?>" min="0" value="<?php echo "$r[12]"; ?>" ><br><br>
            </div>
            <div class="block">
            <h2>Настройка блока даты окончания действия</h2>
            <label>Размер шрифта в pixel</label>
            <input name="date_stop_sixe" type="number" value="<?php echo "$r[15]"; ?>" ><br><br>
            <label>Поворот текста в градусах</label>
            <input name="date_stop_rotate" type="number" max="360" min="-360" step="0.1" value="<?php echo "$r[16]"; ?>" ><br><br>
            <label>Цвет текста</label>
            <input name="date_stop_color" type="color" value="<?php echo $r[17]?>"><br><br>
            <label>Отступ от левого края в pixel (до центра блока)</label>
            <input name="date_stop_left" type="number" max="<?php echo"$size[0]"; ?>" min="0" value="<?php echo "$r[18]"; ?>" ><br><br>
            <label>Отступ от верхнего края в pixel (до центра блока)</label>
            <input name="date_stop_top" type="number" max="<?php echo"$size[1]"; ?>" min="0" value="<?php echo "$r[19]"; ?>" ><br><br>
            </div>
            <div class="block">
            <h2>Настройка блока номера сертификата</h2>
            <label>Размер шрифта в pixel</label>
            <input name="numder_date_sixe" type="number" value="<?php echo "$r[22]"; ?>" ><br><br>
            <label>Поворот текста в градусах</label>
            <input name="numder_date_rotate" type="number" max="360" min="-360" step="0.1" value="<?php echo "$r[23]"; ?>" ><br><br>
            <label>Цвет текста</label>
            <input name="numder_date_color" type="color" value="<?php echo $r[24]?>"><br><br>
            <label>Отступ от левого края в pixel (до центра блока)</label>
            <input name="numder_date_left" type="number" max="<?php echo"$size[0]"; ?>" min="0" value="<?php echo "$r[25]"; ?>" ><br><br>
            <label>Отступ от верхнего края в pixel (до центра блока)</label>
            <input name="numder_date_top" type="number" max="<?php echo"$size[1]"; ?>" min="0" value="<?php echo "$r[26]"; ?>" ><br><br>
            </div>
            <input class="save" type="submit" value="Соxранить">
        </form> 
    </body>
</html>