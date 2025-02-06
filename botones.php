<!DOCTYPE html>
<o>

    <head>
        <link rel="stylesheet" href="estilos.css">
        <?php
        $mostrar2 = false;
        $valor1 = 0;
        $num1 = 0;
        $num2 = 0;
        $saludo = "";
        $mostrar = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST["formulario"] == "suma") {
                $num1 = $_POST["num1"] ?? 0;
                $num2 = $_POST["num2"] ?? 0;
                $valor1 = $num2 + $num1;
                $mostrar2 = true;
            } else if ($_POST["formulario"] == "texto") {
                $saludo = "hola mundo3";
                $mostrar = true;
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
            <div class="panel panel-right">
                <h4>cambiar el fondo de pantalla</h4>
                <button class="rojo" onclick="cambiarFondo('#ff3131')">Rojo</button>
                <button class="azul" onclick="cambiarFondo('#00f3ff')">Azul</button>
                <button class="verde" onclick="cambiarFondo('#b9ff00')">Verde</button>
            </div>
            <div class="panel panel-left">
                <form method="post">
                    <h4>formulario de registro</h4>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre1" id="nombre1" placeholder="ingrece su nombre" required>
                    <label for="segundo apellido">Segundo apellido</label>
                    <input type="text" name="nombre2" id="nombre2" placeholder="ingrece su segundo nombre" required>
                    <label for="primer apellido">Primer apellido</label>
                    <input type="text" name="apellido1" id="apellido1" placeholder="ingrece su apellido" required>
                    <label for="segundo nombre">Segundo nombre</label>
                    <input type="text" name="apellido2" id="apellido2" placeholder="ingrece su segundo apellido"
                        required>
                    <label for="correo electronico">Correo electronico</label>
                    <input type="email" name="corro electronico" id="correo electronico"
                        placeholder="ingrece su correo electronico" required>
                    <label for="numero telefonico">Numero telefonico</label>
                    <input type="number" name="tel" id="tel" placeholder="ingrece numero telefonico" required>
                    <br>
                    <br>
                    <button> registrar </button>
                </form>
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