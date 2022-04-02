<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Результат сохранения данных</title>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <link href="css/certificate.css" rel="stylesheet" type="text/css"/>
        <link href="css/certificate_n.css" rel="stylesheet" type="text/css"/>
        <link href="css/font.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>               
        <?php
        foreach ($_POST as $key => $value) {
            $value = trim(strip_tags(filter_input(INPUT_POST, "$key", FILTER_UNSAFE_RAW)));
            if ($value == false) {
                $value = " ";
            }
            if ($value == true) {
                $data[] = $value;
            }
            $data[0] = trim($data[0]);
        }
        $array = array();
        $array[] = '.fio {' . "\n";
        $array[] = 'font-size: ' . "$data[0]" . 'px;' . "\n";
        $array[] = 'transform: rotate(' . "$data[1]" . 'deg);' . "\n";
        $array[] = 'color: ' . "$data[2]" . ';' . "\n";
        $array[] = 'margin-left: ' . "$data[3]" . 'px;' . "\n";
        $array[] = 'margin-top: ' . "$data[4]" . 'px;' . "\n";
        $array[] = '}' . "\n";
        $array[] = '.ser {' . "\n";
        $array[] = 'font-size: ' . "$data[5]" . 'px;' . "\n";
        $array[] = 'transform: rotate(' . "$data[6]" . 'deg);' . "\n";
        $array[] = 'color: ' . "$data[7]" . ';' . "\n";
        $array[] = 'margin-left: ' . "$data[8]" . 'px;' . "\n";
        $array[] = 'margin-top: ' . "$data[9]" . 'px;' . "\n";
        $array[] = '}' . "\n";
        $array[] = '.date_stop {' . "\n";
        $array[] = 'font-size: ' . "$data[10]" . 'px;' . "\n";
        $array[] = 'transform: rotate(' . "$data[11]" . 'deg);' . "\n";
        $array[] = 'color: ' . "$data[12]" . ';' . "\n";
        $array[] = 'margin-left: ' . "$data[13]" . 'px;' . "\n";
        $array[] = 'margin-top: ' . "$data[14]" . 'px;' . "\n";
        $array[] = '}' . "\n";
        $array[] = '.numder_date { ' . "\n";
        $array[] = 'font-size: ' . "$data[15]" . 'px;' . "\n";
        $array[] = 'transform: rotate(' . "$data[16]" . 'deg);' . "\n";
        $array[] = 'color: ' . "$data[17]" . ';' . "\n";
        $array[] = 'margin-left: ' . "$data[18]" . 'px;' . "\n";
        $array[] = 'margin-top: ' . "$data[19]" . 'px;' . "\n";
        $array[] = '}';
        file_put_contents('css/certificate_n.css', $array, LOCK_EX);
        echo '<div class="numder_date"><div class="text">' . '№ 1024 от 19,03,2022' . '</div></div>';
        echo '<div class="date_stop"><div class="text">' . "К рубежу до 19,04,2022" . '</div></div>';
        echo '<div class="fio"><div class="text">' . "ФИО ФИО ФИО ФИО ... ФИО ФИО ФИО ФИО" . '</div></div>';
        echo '<div class="ser">';
        echo '<div class="services"><ul>';
        echo '<li>' . 'Позиция 1 Позиция' . '</li>';
        echo '<li>' . 'Позиция 2 Позиция' . '</li>';
        echo '<li>' . 'Позиция 3 Позиция' . '</li>';
        echo '</ul></div>';
        echo '</div>';
        ?>
        <img class="img" src="ris.png" alt=""/>
        <input style="position: absolute; z-index: 2;" type="button" onclick="history.back();" value="Назад"/>
    </body>
</html>


