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

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
      die('Error: the ID is not an integer.');
    }
    $sql = 'DELETE FROM students WHERE id=?';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($id));
  }
  else {
    die('Error: the ID is empty.');
  }
  ?>
    <body>
    </body>
</html>
