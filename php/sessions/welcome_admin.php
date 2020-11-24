<?php session_start(); ?>
<body>
    <!-- Cuerpo -->
    <h1>Panel de control</h1>
    <!-- Control de sesión iniciada -->
    <?php if (isset($_SESSION['usuario']) === false) { ?>
    <p>No has iniciado sesión</p>
    <?php } elseif ($_SESSION['rol'] !== 'a') { ?>
    <p>No tienes permiso para acceder a esta página. Por favor inicie sesión como administrador </p>
    <?php } else { ?>
    <!-- cuerpo del panel de control -->
    <?php } ?>
</body>
