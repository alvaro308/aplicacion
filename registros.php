<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_start();

if (!isset($_SESSION['usuarios_temporales'])) {
    $_SESSION['usuarios_temporales'] = [];
}


function registrarUsuario($nombre, $email, $tel, $password) {
    $_SESSION['usuarios_temporales'][] = [
        'username' => $nombre,
        'email' => $email,
        'tel' => $tel,
        'pass' => $password
    ];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if (!empty($nombre) && !empty($email) && !empty($tel) && !empty($pass)) {
        registrarUsuario($nombre, $email, $tel, $pass);
        echo "<p style='color: green; text-align: center;'>Usuario registrado en sesión.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Por favor, completa todos los campos.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>                                                                                                                                                                                                                                                            
    <div class="login">
        <form method="post">
            <input type="email" placeholder="Ingrese email" name="email" required>
            <br><br>
            <input type="number" placeholder="Ingrese teléfono" name="tel" required>
            <br><br>
            <input type="text" placeholder="Ingrese el username" name="username" required>
            <br><br>
            <input type="password" placeholder="Ingrese su contraseña" name="pass" required>
            <br><br>
            <button type="submit">Registrar</button>
            <a href="login.php"><button type="button">ir a login</button> </a>
        </form>

        <br><br>

        <table class="table-estilo-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php $acumulador = 1; ?>
                <?php foreach ($_SESSION['usuarios_temporales'] as $registro): ?>
                    <tr>
                        <td><?php echo $acumulador++; ?></td>
                        <td><?php echo htmlspecialchars($registro['username']); ?></td>
                        <td><?php echo htmlspecialchars($registro['email']); ?></td>
                        <td><?php echo htmlspecialchars($registro['tel']); ?></td>
                        <td><?php echo htmlspecialchars($registro['pass']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>