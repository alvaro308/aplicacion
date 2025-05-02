<!DOCTYPE html>
<head>
<?php     
session_start();

$nombre_usuario_logueado = $_SESSION['usuario_actual']['username'] ?? null;
$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {//ESCUCHA y se ejecuta cuando existe POST de cualquier formulario
$user_input = $_POST ['username'] ?? '' ;//asigna el valor que viene en la variable username que a su ves viene dentro del post //En caso de venir vacio lo asigna vacio
 $pass_input = $_POST ['pass'] ?? '' ;

$usuario_encontrado =false;


if(isset($_SESSION['usuarios_temporales'])){ //valida si existen valores en usuarios temporales
    foreach($_SESSION['usuarios_temporales'] as $usuario){
        if($usuario['username']===$user_input && $usuario['pass']===$pass_input){//valida si el username y el password existe dentro de la lista 
            $usuario_encontrado = true;
            $_SESSION['logged_in'] = true;
                $_SESSION['usuario_actual'] = $usuario;
            header(header:"location: botones.php") ; //si encuantra el usuario y clave dentro de la lista envia a botones.php
exit();
        }
    }

}
if($usuario_encontrado==false){
    $error = "usuarios no encontrados";
}
}

?>
</head>
    <body>
        
    
<link rel="stylesheet" href="estilos.css">
<div class="login">
    <form method="POST"> 
    <?php if (!empty($error)): ?>
                <p style="color: red; text-align: center; text-shadow: 3px 3px 3px white;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>
        <input type="text" placeholder="Ingrece el username" name="username">
        <br>
        <br>
        <input type="password" placeholder="ingrece su contraceña" name="pass">
        <br>
        <br>
        <button type="submit">login</button>
        <a href="registros.php"> <button type="button">ir a registros</button> </a>
    </form>


</div>
<a href="registros.php" class="btn-registro">Ir a Registro</a>
    </body>
</html>