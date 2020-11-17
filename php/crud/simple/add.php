<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Acceso a bases de datos</title>
    </head>

    <?php
    require_once('connect_db.php');

    if (isset($_POST['first_name']) &&
        isset($_POST['last_name']) &&
        isset($_POST['nickname']) &&
        isset($_POST['date_of_birth']) && 
        isset($_POST['mark'])) {

    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $nickname = filter_var($_POST['nickname'], FILTER_SANITIZE_STRING);
    $date_of_birth = $_POST['date_of_birth'];
    $date = date_parse($date_of_birth);
    if (checkdate($date['month'], $date['day'], $date['year']) === false) {
      die('Error: the date of birth is not a date.');
    }
    $mark = $_POST['mark'];
    if (filter_var($mark, FILTER_VALIDATE_INT) === false) {
      die('Error: the mark is not an integer.');
    }

    $sql = 'INSERT INTO students(first_name,last_name,nickname,date_of_birth,mark) values(?,?,?,?,?)';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($first_name, $last_name, $nickname, $date_of_birth, $mark));
    }
    else {
    die('Some of the fields is empty. You must complete all the fields.');
    }
    ?>
    <body>
        <h1>Inserta un elemento</h1>    
        <ul>
            <li>Campo 1: <?=$campo1?></li>
            <li>Campo 2: <?=$campo2?></li>
            <li>Campo 3: <?=$campo3?></li>
            <li>Campo 4: <?=$campo4?></li>
        </ul>
    </body>
</html>
