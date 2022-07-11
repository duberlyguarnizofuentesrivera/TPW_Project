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
    <link rel="stylesheet" href="css/sentmessage.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <script src="js/mostrarPopUp.js" defer></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Resultados - Tell U</title>
    <script async>(function (w, d) {
            let h = d.head || d.getElementsByTagName("head")[0];
            let s = d.createElement("script");
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
<div class="container d-block mx-auto">
    <div class="row pt-5">
        <div class="col text-center">
            <h2>Mensaje creado correctamente!</h2>
        </div>
    </div>
    <div class="row py-5 mx-auto">
        <div class="col text-center">
            <p>Tu código de seguimiento es el siguiente:</p>

        </div>
    </div>
    <div class="row py-3">
        <div class="col text-center">
            <span class="follow-up-code">
                <?php
                $follow_up = $_GET["followup"];
                echo $follow_up;
                ?>
            </span>
        </div>
    </div>
    <div class="row py-5">
        <div class="col text-center">
            <p class="text-start">Guarda este código si deseas el mensaje que acabas de crear, para que puedas hacer un seguimiento. Si escribes un mensaje nuevo, puedes poner este código en el formulario al momento de generarlo, para que puedas hacer seguimiento a varios mensajes a la vez.</p>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col text-center">
            <a href="../index.php" class="boton-efecto">Regresar</a>
        </div>
        <div class="col text-center">
            <a href="buscar.php" class="boton-efecto">Buscar mensajes</a>
        </div>
    </div>
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
