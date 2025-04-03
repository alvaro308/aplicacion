<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    if (isset($_POST['limpiar'])) {
        unset($_SESSION['registros']);
        header("location:" . $_SERVER['PHP_SELF']);
    }
    if (!isset($_SESSION['registros'])) {
        $_SESSION['registros'] = [];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST["formulario"] == "registro") {

            $registro = [
                'nombre1' => $_POST["nombre1"] ?? "",
                'nombre2' => $_POST["nombre2"] ?? "",
                'apellido1' => $_POST["apellido1"] ?? "",
                'apellido2' => $_POST["apellido2"] ?? "",
                'correo_electronico' => $_POST["correo_electronico"] ?? "",
                'color_de_ojos' => $_POST["color_de_ojos"] ?? "",
                'edad' => $_POST["edad"] ?? "",
                'consola' => $_POST["consola"] ?? "",
                'tel' => $_POST["tel"] ?? "",
            ];
            $_SESSION['registros'][] = $registro;
        } else {
        }
    }
    ?>
    <link rel="stylesheet" href="estilos.css">
</head>
<title>inicio</title>

<body>
    <?php include 'menu.php'; ?>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="panel panel-left-3">
            <form method="post" class="form">
                <h4>Formulario de Registro</h4>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre1" id="nombre1" placeholder="ingrese su nombre" required>
                <label for="segundo nombre">Segundo Nombre</label>
                <input type="text" name="nombre2" id="nombre2" placeholder="ingrese su segundo nombre" required>
                <label for="primer apellido">Primer Apellido</label>
                <input type="text" name="apellido1" id="apellido1" placeholder="ingrese su apellido" required>
                <label for="segundo apellido">Segundo Apellido</label>
                <input type="text" name="apellido2" id="apellido2" placeholder="ingrese su segundo apellido" required>
                <label for="correo electronico">Correo Electrónico</label>
                <input type="email" name="correo_electronico" id="correo_electronico"
                    placeholder="ingrese su correo electrónico" required>
                <label for="color de ojos">Color de ojos</label>
                <br>
                <select name="color_de_ojos" id="color_de_ojos">
                    <option value="seleccione">color de ojos</option>
                    <option value="verde">verde</option>
                    <option value="azul">azul</option>
                    <option value="cafe">cafe</option>
                    <option value="Negro">Negro</option>
                    <option value="Ámbar">Ámbar</option>
                    <option value="Avellana">Avellana</option>
                    <option value="gris">gris</option>

                </select>
                <br>
                <label for="edad">edad</label>
                <br>
                <select name="edad" id="edad">
                    <option value="seleccione">ingrece su edad</option>
                    <?php
                    for ($i = 1; $i <= 100; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="consola">consola</label>
                <br>
                <select name="consola" id="consola">
                    <option value="seleccione la consola">seleccione consola</option>
                    <option value="nintendo">nintendo</option>
                    <option value="xbox">xbox</option>
                    <option value="playstation">playstation</option>
                </select>
                <br>
                <label for="numero telefonico">Número Telefónico</label>
                <input type="number" name="tel" id="tel" placeholder="ingrese número telefónico" required>
                <br>
                <br>
                <input type="hidden" name="formulario" value="registro">
                <div style="display: flex; gap: 40%">

                    <button type="submit">Registrar</button>
            </form>
            <form method="post"><button type="submit" name="limpiar" id>Eliminar datos</button>
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
                    <th>color de ojos</th>
                    <th>edad</th>
                    <th>consola</th>
                    <th>numero telefonico</th>
                </tr>
            </thead>
            <?php $acumulador = 1 ?>
            <?php foreach ($_SESSION['registros'] as $registro): ?>
                <tr>
                    <td><?php echo $acumulador++; ?></td>

                    <td><?php echo htmlspecialchars($registro['nombre1']); ?></td>
                    <td><?php echo htmlspecialchars($registro['nombre2']); ?></td>
                    <td><?php echo htmlspecialchars($registro['apellido1']); ?></td>
                    <td><?php echo htmlspecialchars($registro['apellido2']); ?></td>
                    <td><?php echo htmlspecialchars($registro['correo_electronico']); ?></td>
                    <td><?php echo htmlspecialchars($registro['color_de_ojos']); ?></td>
                    <td><?php echo htmlspecialchars($registro['edad']); ?></td>
                    <td><?php echo htmlspecialchars($registro['consola']); ?></td>
                    <td><?php echo htmlspecialchars($registro['tel']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
        <br>
      
    </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>