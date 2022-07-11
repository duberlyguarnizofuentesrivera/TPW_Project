<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script defer src="js/buscarSeguimiento.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Admin Panel - Tell U</title>
</head>
<body>
<!-- inicio de barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php"><img src="img/logo.png" width="50" alt="navigation bar logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link " href="buscar.php">Buscar Mensaje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="nosotros.html">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.html">Servicios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="equipo.html">Equipo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="adminlogin.php">Admin Login</a>
                </li>

            </ul>
            <form class="d-flex">
                <input class="form-control form-control-sm me-2" id="txtBuscarSeguimiento" type="search" placeholder="Cod. Seguimiento"
                       aria-label="Search">
                <a class="btn btn-sm btn-outline-success" onclick="buscarSeguimiento()">Seguimiento</a>
            </form>
            <form class="d-flex">
                <a href="https://www.facebook.com/TELL-U-111749471558640"><i class="fa-brands fa-facebook px-2"></i></a>
                <a href="https://twitter.com/TELLU83367017"><i class="fa-brands fa-twitter px-2"></i></a>
            </form>
        </div>
    </div>
</nav>
<!-- fin de barra de navegación -->
<div class="container m-5">

    <?php

    $log_file = fopen("log.txt", "a");
    $datetime = date("Y-m-d H:i:s");
    try {

        $usuario = $_POST['usuario'];
        $clave = $_POST['password'];
        $loginSql = "SELECT username, password FROM administradores WHERE username= ? AND password = ?";
        $requestSql = "SELECT * FROM mensajes";
        require "../controller/propiedades.php";
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
                $id = $contenido['id'];
                $pais = $contenido['pais'];
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
