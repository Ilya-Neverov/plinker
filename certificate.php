<?php
    if ($_POST['numder'] == true) {
        $numder = trim(strip_tags(filter_input(INPUT_POST, 'numder', FILTER_UNSAFE_RAW)));
    } else {
        $numder = 'Ввести номер сертификата';
    }

    if ($_POST['date_start'] == true) {
        $date_start = trim(strip_tags(filter_input(INPUT_POST, 'date_start', FILTER_UNSAFE_RAW)));
        $date_start = explode('-', $date_start);
        $date_start = $date_start[2] . '.' . $date_start[1] . '.' . $date_start[0];
    } else {
        $date_start = 'не ведена дата формирования Сертификата';
    }

    if ($_POST['date_stop'] == true) {
        $date_stop = trim(strip_tags(filter_input(INPUT_POST, 'date_stop', FILTER_UNSAFE_RAW)));
        $date_stop = explode('-', $date_stop);
        $date_stop = $date_stop[2] . '.' . $date_stop[1] . '.' . $date_stop[0];
        $date_stop_i = "явиться к рубежу до " . $date_stop;
    } else {
        $date_stop = 'вести дату окончания действия сертификата';
    }

    if ($_POST['fio'] == true) {
        $fio = trim(strip_tags(filter_input(INPUT_POST, 'fio', FILTER_UNSAFE_RAW)));
    } else {
        $fio = 'Ведите ФИО владельца сертификата';
    }

    if ($_POST['numder'] and $_POST['date_start'] == true) {
        $numder_date = "№ " . $numder . " от " . $date_start;
    } else {
        $numder_date = 'Номер или дата не введены';
    }

    if (!empty($_POST['service'])) {
        $post = $_POST['service'];
        foreach ($post as $value) {
            $services [] = trim(strip_tags($value));
        }
    } else {
        $services[] = 'Не выбранны позиции';
    }

    if ($_POST['numder'] and $_POST['date_start'] and $_POST['date_stop'] and $_POST['fio'] and!empty($_POST['service']) == true) {

        $file = array_diff(scandir('certificate/'), ['..'], ['.']);
        $key = array_search($numder . '.php', $file);

        if ($key > '0') {
            echo '<label class="info">Данный номер (' . "$numder" . ')  сертификата занят</label>';
        } else {
            $mark = 1;
            $ser = implode(', ', $services);
            $array = array($numder, $date_start, $date_stop, $fio, $ser);
            file_put_contents("certificate/" . $numder . ".php", implode("\n", $array), LOCK_EX);
            echo '<label class="info">Сертификат успешно сохранен под № ' . "$numder" . '</label>';
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo "$fio" . ' ' . "$numder_date" ?>;</title>

        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />

        <link href="css/certificate.css" rel="stylesheet" type="text/css"/>
        <link href="css/certificate_n.css" rel="stylesheet" type="text/css"/>
        <link href="css/font.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <?php
            echo '<div class="numder_date"><div class="text">' . "$numder_date" . '</div></div>';
            echo '<div class="date_stop"><div class="text">' . "$date_stop_i" . '</div></div>';
            echo '<div class="fio"><div class="text">' . "$fio" . '</div></div>';
            echo '<div class="ser">';
            echo '<div class="services"><ul>';
            if ($services == true) {
                foreach ($services as $valid) {
                    echo '<li>' . "$valid" . '</li>';
                }
                echo '</ul></div></div>';
            } else {
                echo '<h1>Не выбранны позиции</h1>';
            }
            echo '<img class="img" src="ris.png" alt=""/>';
            echo '<style type="text/css" media="print">';
            echo 'button {display: none; }';
            echo 'input {display: none; }';
            echo 'label {display: none; }';
            echo 'a {display: none; }';
            echo '</style>';
            echo '<input style="position: absolute; z-index: 2; margin-top: 70px" type="button" onclick="history.back();" value="Назад"/>';
            echo '<button style="position: absolute; z-index: 2; margin-top: 10px;"><a href="index.php">Новый сертификат</a></button>';
            if (!empty($mark)) {
                echo '<button onclick="window.print();" style="position: absolute; z-index: 2; margin-top: 40px;">Печать</button>';
            }
        ?>

    </body>
</html>