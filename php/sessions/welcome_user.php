<?php session_start(); ?>
<body>
    <!-- Cuerpo -->
    <h1>Página de usuario</h1>
    <!-- Control de sesión iniciada -->
    <?php if (isset($_SESSION['usuario']) === false) { ?>
    <p>No has iniciado sesión</p>
    <?php } else { ?>
    <!-- cuerpo de  la página de usuario -->
    <p>Bienvenido, <?= $_SESSION['usuario']?> (<a href="logout.php">Cerrar sesión</a>) </p>
    <?php } ?>
</body>
