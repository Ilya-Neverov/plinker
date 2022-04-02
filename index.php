<?php
    error_reporting(0);
    !$file_n = max(str_replace('.php', "",  (array_diff(scandir('certificate/'), ['..'], ['.']))));
    $file_n++;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Форма для сертификата</title>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <ul class="menu">
            <li><a href="index.php">Форма</a></li>
            <li><a href="position.php">Позиции</a></li>
            <li><a href="issued.php">Выписанные сертификаты</a></li>
        </ul>
        <h1>Заполнить данные</h1>
        <form action="certificate.php" method="post">
                <p class="default">
                    <label>Номер сертификата</label><br>
                    <input  name="numder" type="text" size="5" value="<?php echo"$file_n" ?>">
                </p>
                <p class="default">
                    <label>Дата с которой действует сертификат</label><br>
                    <input name="date_start" type="date" value="<?php echo date("Y-m-d"); ?>"">
                </p>
                <p class="default">
                    <label>Дата окончания действует сертификат</label><br>
                    <input name="date_stop" type="date" value="<?php $valid = date("Y-m-d", strtotime("+1 month" . "+3 day")); echo "$valid" ?>">
                </p>
                <p class="fio">
                    <label>Вести имя</label>
                    <input name="fio" type="text" size="50">
                </p>
                
             <?php
                $file = array_diff(scandir('cataloq/'), ['..'], ['.']);
                foreach ($file as $value ){
                    $way = 'cataloq/' . "$value";
                    $r = file($way); 
                    echo '<div class="card">';
                    echo '<h3>' . "$r[0]" . '</h3>';
                    if ($r[1] > "  "){ echo '<label>' . "$r[1]" . '</label><br>';}
                    echo '<p>';
                    if ($r[2] > "  ") {echo '<input name="service[]" type="checkbox" value="' . "$r[2]" . '"><label>' . "$r[2]" . '</label>';} 
                    if ($r[4] > "  ") {echo '<input name="service[]" type="checkbox" value="' . "$r[4]" . '"><label>' . "$r[4]" . '</label>';} 
                    if ($r[6] > "  ") {echo '<input name="service[]" type="checkbox" value="' . "$r[6]" . '"><label>' . "$r[6]" . '</label>';} 
                    if ($r[8] > "  ") {echo '<input name="service[]" type="checkbox" value="' . "$r[8]" . '"><label>' . "$r[8]" . '</label>';} 
                    if ($r[10] > "  ") {echo '<input name="service[]" type="checkbox" value="' . "$r[10]" . '"><label>' . "$r[10]" . '</label>';} 
                    if ($r[12] > "  ") {echo '<input name="service[]" type="checkbox" value="' . "$r[12]" . '"><label>' . "$r[12]" . '</label>';} 
                    echo '</p>'; 
                    echo '</div>';
                }
            if (!empty($file)){
                echo '<input class="button" type="reset" value="Очистить">';
                echo '<input class="button" type="submit" value="Соxранить">';
         } else {
             echo '<div><a class="button" href="position.php">Внести позицию</a></div>';
         }
         ?>
         
        </form>
    </body>
</html>
