<header class = "header">
<?php 
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !* true) {
        header("location:login.php");
        exit();
    }
    ?>
<div class="logo">
    <h1>
        alvaro
    </h1>
</div>
<nav class="navbar">
    <ul>
        <li><a href="index.php">Inicio</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li> <a href="login.php">login</a></li>
        <li> <a href="registros.php">Registro</a></li>
        <li> <a href="logout.php">👤</a></li>
    </ul>
</nav>
</header>