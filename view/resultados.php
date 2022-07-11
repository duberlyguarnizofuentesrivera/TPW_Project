<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <script defer src="js/buscarSeguimiento.js"></script>
    <link rel="stylesheet" href="css/cards.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <script src="js/mostrarPopUp.js" defer></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Resultados - Tell U</title>
    <script async>(function (w, d) {
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.setAttribute("src", "https://app.bluecaribu.com/conversion/integration/20fe0ad0db71eacbd93a3c703a51c6b4");
            h.appendChild(s);
        })(window, document);</script>
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

<div class="container cardContainer">
    <h1 class="text-white mb-3">Resultados</h1>
    <?php
    include '../controller/listarMensajes.php';
    $registros = array();

    $nombre = ucwords(strtolower($_POST['txtNombre']));
    $apellido = ucwords(strtolower($_POST['txtApellido']));
    $pais = ucwords($_POST['cmbPais']);
    $registros = listarMensajes($nombre, $apellido, $pais);
    echo "<h2 class=\"text-white mb-5\">Mensajes en <span class=\"searchTerms\">" . $pais . "</span> para <span
                class=\"searchTerms\">" . $nombre . " " . $apellido . "</span>:</h2>";
    ?>

    <ol class="messageCard">
        <?php
        $index = 1;
        foreach ($registros as $registro) {
            $fechaInt = strtotime($registro['fecha']);
            $fecha = date('d/m/Y', $fechaInt);
            $nombreOriginal = ucwords(strtolower($registro['nombre']));
            $apellidoOriginal = ucwords(strtolower($registro['apellido']));
            echo "<li class=\"messageCardItem\" style=\"--animation-order:" . $index . "\"><a class=\"messageCardLink\">
                <div class=\"messageCardContent articles__content--lhs\">
                    <h3 class=\"messageCardTitle\">" . $registro['mensaje'] . "</h3>
                    <div class=\"messageCardFooter\">
                        <span>" . $nombreOriginal . " " . $apellidoOriginal . "</span>
                        <span>" . $fecha . "</span>
                    </div>
                </div>
                <div class=\"messageCardContent articles__content--rhs\" aria-hidden=\"true\">
                    <h3 class=\"messageCardTitle\">" . $registro['mensaje'] . "</h3>
                    <div class=\"messageCardFooter\">
                        <p>Perú</p>
                        <span>" . $fecha . "</span>
                    </div>
                </div>
            </a>
        </li>";
            $index++;
        }
        ?>
    </ol>
</div>

<!-- inicio de footer -->
<footer class="footer mt-auto py-3 bg-light text-center fixed-bottom ">
    <div class="container ">
        <span class="text-muted ">Página desarrollada por el grupo 4.  <a class="text-muted" href="adminlogin.php">Admin login</a></span>
    </div>
</footer>
<!-- fin de footer -->

</body>
</html>