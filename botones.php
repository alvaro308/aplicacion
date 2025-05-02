<!DOCTYPE html>


    <head>
        <link rel="stylesheet" href="estilos.css">
        <?php
        $mostrar2 = false;
        $valor1 = 0;
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $saludo = "";
        $mostrar = false;
        if (!isset($_SESSION['registros'])) {
            $_SESSION['registros'] = [];
        }
        if (isset($_POST['limpiar'])) {
            unset($_SESSION['registros']);
            header("location:" . $_SERVER['PHP_SELF']);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST["formulario"] == "suma") {
                $num1 = $_POST["num1"] ?? 0;
                $num2 = $_POST["num2"] ?? 0;
                $num3 = $_POST["num3"] ?? 0;
                $valor1 = ($num2 + $num1 + $num3);
                $mostrar2 = true;
            } else if ($_POST["formulario"] == "texto") {
                $saludo = "hola mundo3";
                $mostrar = true;
            } else if ($_POST["formulario"] == "registro") {

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
            <div class="panel panel-left-3">
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
        for($i=1;$i<=100;$i++){
           echo "<option value=\"$i\">$i</option>" ; 
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
            </div>
            <br>
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
        <div class="panel panel-right">
            <h4>cambiar el fondo de pantalla</h4>
            <button class="rojo" onclick="cambiarFondo('#ff3131')">Rojo</button>
            <button class="azul" onclick="cambiarFondo('#00f3ff')">Azul</button>
            <button class="verde" onclick="cambiarFondo('#b9ff00')">Verde</button>
            <button class="blanco" onclick="cambiarFondo('#ffffff')">blanco</button>
        </div>

        <div class="panel panel-left">
            <h4>
                calculadora
            </h4>
            <div class="calculadora">

                <input type="text" id="pantalla" readonly>
                <br>
                <br>
                <div class="botones">
                    <button onclick="agregarValor('7')">7</button>
                    <button onclick="agregarValor('8')">8</button>
                    <button onclick="agregarValor('9')">9</button>
                    <button onclick="agregarValor('/')">/</button>
                    <button onclick="agregarValor('4')">4</button>
                    <button onclick="agregarValor('5')">5</button>
                    <button onclick="agregarValor('6')">6</button>
                    <button onclick="agregarValor('*')">*</button>
                    <button onclick="agregarValor('1')">1</button>
                    <button onclick="agregarValor('2')">2</button>
                    <button onclick="agregarValor('3')">3</button>
                    <button onclick="agregarValor('-')">-</button>
                    <button onclick="agregarValor('0')">0</button>
                    <button onclick="limpiarPantalla()">C</button>
                    <button onclick="calcular()">=</button>
                    <button onclick="agregarValor('+')">+</button>
                    <button onclick="borrarCaracter('←')">←</button>
                </div>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="panel panel-left">
                <form method="post">
                    <h4>funcion saludar</h4>
                    <INput type="hidden" name="formulario" value="texto"></INput>
                    <button type="submit">saludar</button>

                </form>
                <br>
                <?php if ($mostrar): ?>
                    <label class="label1">
                        <?php echo $saludo; ?>

                    </label>
                <?php endif; ?>
            </div>
            <div class="panel panel-left">
                <h4>
                    suma de numeros
                </h4>
                <form method="post">
                    <input type="hidden" name="formulario" value="suma">
                    numero 1:<input type="double" name="num1" id="num1" placeholder="3" required>
                    <br>
                    numero 2:<input type="double" name="num2" id="num2" placeholder="5" required>
                    <br>
                    numero 3:<input type="double" name="num3" id="num3" placeholder="8" required>
                    <button type="submit">
                        sumar
                    </button>
                </form>
                <br>
                <?php if ($mostrar2): ?>
                    <label class="label1">
                        <?php echo $valor1 / 2; ?>

                    </label>
                <?php endif; ?>
            </div>
            <br>
        </div>
        <div class="panel panel-left">
        </div>
        <br>
        </div>
        <?php include 'footer.php'; ?>
    </body>

    </html>
    <script>
        function agregarValor(numero) {
            document.getElementById("pantalla").value += numero;
        }
        function limpiarPantalla() {
            document.getElementById("pantalla").value = "";
        }
        function calcular() {
            try {
                document.getElementById("pantalla").value = eval(document.getElementById("pantalla").value)
            } catch (error) {
                alert("error en la expresion")
            }

        }

        function borrarCaracter() {
            var pantalla = document.getElementById("pantalla");
            pantalla.value = pantalla.value.slice(0, -1);
        }

    </script>