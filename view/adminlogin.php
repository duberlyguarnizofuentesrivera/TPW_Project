<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
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
<div class="container mx-5">
    <div class="my-3 row justify-content-md-center">
        <img class="w-25" src="img/logo.png" alt="logo">
    </div>

    <form method="post" action="adminpanel.php">
        <div class="my-3 row justify-content-sm-center">
            <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="usuario" name="usuario">
            </div>
        </div>
        <div class="my-3 row justify-content-sm-center">
            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="my-3 row justify-content-sm-center">
            <div class="col-sm-6">
                <input class="boton-efecto" type="submit" value="Iniciar sesión" name="btnSubmit"/>
            </div>
        </div>
    </form>
    <div class="row text-center">
        <div class="col text-muted">
            (Credenciales de prueba: ADMIN/ADMIN)
        </div>
    </div>
</div>
</body>
</html>
