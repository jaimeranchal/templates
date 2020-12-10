<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Prueba validación</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>

<?php
// Variables
$patron_tfno = "/[0-9]{9}/";
$errores = []; // Array donde se guardan los mensajes de error

/* asignar y filtrar variables del formulario */
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
    $email= filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $tfno = filter_var($_POST["tfno"], FILTER_SANITIZE_NUMBER_INT);
    $web = filter_var($_POST["web"], FILTER_SANITIZE_URL);
    $comentario = filter_var($_POST["comentarios"], FILTER_SANITIZE_STRING);

    /* validar los datos que lo necesitan */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = "Inválido";
        $errores[] = "Formato de email inválido";
        /* echo("Formato de email inválido"); */
    }
    if (!preg_match($patron_tfno, $tfno)){
        $tfno = "Inválido";
        $errores[] = "Formato de número de teléfono inválido:<br>" . 
                    "Se esperaban 9 dígitos, sin espacios ni guiones";
        /* echo("Formato de número inválido"); */
    }
    if (!filter_var($web, FILTER_VALIDATE_URL)) {
        $web = "Inválido";
        $errores[] = "Formato de dirección web inválido";
        /* echo("Formato de web inválido"); */
    }
}

?>

    <body class="container">
        <!-- formulario -->
        <div class="shadow p-4 bg-white mt-5 pt-1">
            <h2>Contacta con nosotros</h2>
            <p>Revise los datos introducidos</p>
            <ul>
                <li><b>Nombre: </b><?=$nombre ?></li>
                <li><b>Email: </b><?=$email ?></li>
                <li><b>Teléfono: </b><?=$tfno?></li>
                <li><b>Página web: </b><?= $web?></li>
                <li><b>Comentario: </b><?= $comentario?></li>
            </ul>
            <?php if (count($errores) > 0) : ?>
            <h3>Errores</h3>
            <ul>
            <?php foreach ($errores as $error) { ?>
                <li><?=$error?></li>
            <?php } endif; ?>
            </ul>
            <a class="btn btn-primary" href="./index.html">Volver al formulario</a>
        </div>
        <!-- javascript libraries -->
        <!-- JQuery -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
        </script>
        <!-- Popper -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
        </script>
        <!-- BootStrap -->
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
        </script>
    </body>
</html>
