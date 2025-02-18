<!DOCTYPE html>
<o>

    <head>
        <link rel="stylesheet" href="estilos.css">
        <?php
        $mostrar2 = false;
        session_start();
        $valor1 = 0;
        $num1 = 0;
        $num2 = 0;
        $saludo = "";
        $mostrar = false;
        if (!isset($_SESSION['registros'])) {
            $_SESSION['registros'] = [];
        }
        if (isset($_POST['limpiar'])) {
            unset($_SESSION['registros']);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST["formulario"] == "suma") {
                $num1 = $_POST["num1"] ?? 0;
                $num2 = $_POST["num2"] ?? 0;
                $valor1 = $num2 + $num1;
                $mostrar2 = true;
                echo "<script>alert('la suma se registro correctamente!');</script>";
            } else if ($_POST["formulario"] == "texto") {
                $saludo = "hola mundo3";
                $mostrar = true;
            } else if ($_POST["formulario"] == "registro") {
                echo "<script>alert('Registro guardado correctamente!');</script>";
                $registro = [
                    'nombre1' => $_POST["nombre1"] ?? "",
                    'nombre2' => $_POST["nombre2"] ?? "",
                    'apellido1' => $_POST["apellido1"] ?? "",
                    'apellido2' => $_POST["apellido2"] ?? "",
                    'correo_electronico' => $_POST["correo_electronico"] ?? "",
                    'tel' => $_POST["tel"] ?? "",
                ];
                $_SESSION['registros'][] = $registro;
            }else{
                
            }
        }
        ?>
    </head>
    <style>
        container {
            background-color:
                <?php echo $colorinicial; ?>
            ;
        }
    </style>

    <body>

        <script>
            function cambiarFondo(color) {
                document.querySelector('.panel-right').style.backgroundColor = color;
            }
        </script>
        <title>botones</title>
        <?php include 'menu.php'; ?>
        <?php include 'header.php'; ?>
        <div class="container">
            <div class="panel panel-left">
                <form method="post">
                    <h4>funcion saludar</h4>
                    <INput type="" name="formulario" value="texto"></INput>
                    <button type="submit">saludar</button>

                </form>
                <br>
                <?php if ($mostrar): ?>
                    <label class="label1">
                        <?php echo $saludo; ?>

                    </label>
                <?php endif; ?>
            </div>
            <div class="panel panel-right">
                <h4>cambiar el fondo de pantalla</h4>
                <button class="rojo" onclick="cambiarFondo('#ff3131')">Rojo</button>
                <button class="azul" onclick="cambiarFondo('#00f3ff')">Azul</button>
                <button class="verde" onclick="cambiarFondo('#b9ff00')">Verde</button>
            </div>
            <div class="panel panel-left">
                <form method="post">
                    <h4>Formulario de Registro</h4>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre1" id="nombre1" placeholder="ingrese su nombre" required>
                    <label for="segundo nombre">Segundo Nombre</label>
                    <input type="text" name="nombre2" id="nombre2" placeholder="ingrese su segundo nombre" required>
                    <label for="primer apellido">Primer Apellido</label>
                    <input type="text" name="apellido1" id="apellido1" placeholder="ingrese su apellido" required>
                    <label for="segundo apellido">Segundo Apellido</label>
                    <input type="text" name="apellido2" id="apellido2" placeholder="ingrese su segundo apellido"
                        required>
                    <label for="correo electronico">Correo Electrónico</label>
                    <input type="email" name="correo_electronico" id="correo_electronico"
                        placeholder="ingrese su correo electrónico" required>
                    <label for="numero telefonico">Número Telefónico</label>
                    <input type="number" name="tel" id="tel" placeholder="ingrese número telefónico" required>
                    <br>
                    <br>
                    <input type="hidden" name="formulario" value="registro">
                    <button type="submit">Registrar</button>
                </form>
                <form method="post"><button type="submit"name="limpiar" id>Eliminar datos</button>
            </form>
                <table class="table-estilo-2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Segundo nombre</th>
                            <th>Primer apellido</th>
                            <th>Segundo apellido</th>
                            <th>Correo electronico</th>
                            <th>Numero telefonico</th>
                        </tr>
                    </thead>
                    <?php $acumulador=1 ?>
                    <?php foreach ($_SESSION['registros'] as $registro): ?>
                        <tr>
                            <td><?php echo $acumulador ++; ?></td>
                                         
                            <td><?php echo htmlspecialchars($registro['nombre1']); ?></td>
                            <td><?php echo htmlspecialchars($registro['nombre2']); ?></td>
                            <td><?php echo htmlspecialchars($registro['apellido1']); ?></td>
                            <td><?php echo htmlspecialchars($registro['apellido2']); ?></td>
                            <td><?php echo htmlspecialchars($registro['correo_electronico']); ?></td>
                            <td><?php echo htmlspecialchars($registro['tel']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="panel panel-left">
                <h4>
                    suma de numeros
                </h4>
                <form method="post">
                    <input type="" name="formulario" value="suma">
                    numero 1:<input type="double" name="num1" id="num1" placeholder="3" required>
                    <br>
                    numero 2:<input type="double" name="num2" id="num2" placeholder="5" required>
                    <button type="submit">
                        sumar
                    </button>
                </form>
                <br>
                <?php if ($mostrar2): ?>
                    <label class="label1">
                        <?php echo $num1 + $num2; ?>

                    </label>
                <?php endif; ?>
            </div>
            <br>
        </div>
        <div class="container">
            <div class="panel panel-left">

            </div>
            <div class="panel panel-left">
            </div>
            <div class="panel panel-left">
            </div>
            <div class="panel panel-left">
            </div>
            <br>
        </div>
        <?php include 'footer.php'; ?>
    </body>

    </html>