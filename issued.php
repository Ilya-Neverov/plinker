<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">

        <title>Выписанные сертификаты</title>
    </head>
    <body>
        <ul class="menu">
            <li><a href="index.php">Форма</a></li>
            <li><a href="position.php">Позиции</a></li>
            <li><a href="issued.php">Выписанные сертификаты</a></li>
            <link href="css/menu.css" rel="stylesheet" type="text/css"/>
            <link href="css/issued.css" rel="stylesheet" type="text/css"/>
               <link href="css/save_position.css" rel="stylesheet" type="text/css"/>
        </ul>
        <h1>Выданные сертификаты</h1>
        
        <?php
        $file = array_diff(scandir('certificate/'), ['..'], ['.']);
        krsort($file);
        echo '<table border="4" cellspacing="0" style="text-align: center; border: solid; border-color: #000000;" ><tr><th width="110">№ сертификата</th><th width="250">ФИО владельца сертификата</th><th width="210">Дата действия сертификата</th><th width="800">Услуги</th><th>Удалить</th></tr>';
        foreach ($file as $value) {
            $way = 'certificate/' . "$value";
            $r = file($way);
            echo '<tr>';
            echo '<td valign="center">';
            echo "$r[0]" . '</td>';
            echo '<td valign="center">';
            echo "$r[3]" . '</td>';
            echo '<td valign="center">';
            echo 'c ' . "$r[1]" . '<br>по ' . "$r[2]" . '</td>';
            echo '<td valign="center">';
            echo "$r[4]" . '</td>';
            echo '</td>';
            echo '<td><form valign="center" action="delete_issued.php" method="post"><input type="hidden" name="name_fale" value="' . "$r[0]" . '"><button class="button">Удалить</button></form></td>';
        }
        echo '</tr>';
        ?>        

    </body>
</html>
