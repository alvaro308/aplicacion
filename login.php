<!DOCTYPE html>
<head>
<?php     
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = $_POST['username'];
    $pass_input = $_POST['pass'];

    if (isset($_SESSION['user_reg']) && isset($_SESSION['pass_reg'])) {
        if ($user_input === $_SESSION['user_reg'] && $pass_input === $_SESSION['pass_reg']) {
            $_SESSION['logged_in'] = true;
            header("Location: botones.php");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos.";
        }
    } else {
        $error = "Debe registrarse primero.";
    }
}
?>
</head>
    <body>
        
    
<link rel="stylesheet" href="estilos.css">
<div class="login">
    <form> 
        
        <input type="text" placeholder="Ingrece el username">
        <br>
        <br>
        <input type="password" placeholder="ingrece su contraceña">
        <br>
        <br>
        <button type="submit">login</button>
    </form>


</div>
<a href="registros.php" class="btn-registro">Ir a Registro</a>
    </body>
</html>