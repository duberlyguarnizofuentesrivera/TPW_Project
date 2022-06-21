<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Admin Panel - Tell U</title>
</head>
<body>
<div class="container m-5">

    <?php

    $log_file = fopen("log.txt", "a");
    $datetime = date("Y-m-d H:i:s");
    try {

        $usuario = $_POST['usuario'];
        $clave = $_POST['password'];
        $loginSql = "SELECT username, password FROM administradores WHERE username= ? AND password = ?";
        $requestSql = "SELECT * FROM mensajes";
        require "php/propiedades.php";
        $server = $GLOBALS["DbServername"];
        $dbname = $GLOBALS["DbName"];
        $user = $GLOBALS["DbUsername"];
        $pass = $GLOBALS["DbPassword"];
        $conn = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8mb4", $user, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($loginSql);
        $stmt->execute([$usuario, $clave]);
        $count = $stmt->rowCount();
        if ($count) {
            fwrite($log_file, "$datetime usuario logueado $usuario\n");
            echo "<h2>Lista de mensajes en el sistema:</h2>";
            $stmt = $conn->prepare($requestSql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $filas = $stmt->fetchAll();
            echo "<table class='table table-striped table-hover'>
<thead class='thead-dark'>
<th scope='col'>Id</th>
<th scope='col'>País</th>
<th scope='col'>Nombre</th>
<th scope='col'>Apellido</th>
<th scope='col'>Fecha</th>
<th scope='col'>mensaje</th>
</thead> ";
            foreach ($filas as $fila => $contenido) {
                $id =$contenido['id'];
                $pais =$contenido['pais'];
                $nombre = $contenido['nombre_destinatario'];
                $apellido = $contenido['apellido_destinatario'];
                $mensaje = $contenido['mensaje'];
                $fecha = $contenido['timestamp'];
                echo "<tr><td>$id</td><td>$pais</td><td>$nombre</td><td>$apellido</td><td>$fecha</td><td>$mensaje</td></tr>";
            }
            echo "</table>";
        } else {
            fwrite($log_file, "$datetime intento de logueo FALLIDO: $usuario con $count elementos recibidos\n");
            echo "<h2>CREDENCIALES ERRONEAS!</h2>";
        }
        $conn = null;
    } catch (PDOException $e) {
        $error = $e->getMessage();
        fwrite($log_file, "$datetime EXCEPCIÓN SQL con: $loginSql, ERROR: $error \n");
    }
    fclose($log_file);
    ?>

</div>
</body>
</html>
