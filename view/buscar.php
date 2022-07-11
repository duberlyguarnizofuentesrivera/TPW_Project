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
    <link rel="stylesheet" href="css/search.css">
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

<div class="container searchContainer">
    <div class="row">
        <div class="col col-3"></div>
        <div class="col col-6">
            <h1 class="mb-3">Buscar mensajes</h1>
            <h3 class="mb-5">Ingresa los datos y da clic en buscar, para que veas los resultados</h3>
            <form method="post" action="resultados.php">
                <div class="formbuilder-select form-group field-cmbPais py-1">
                    <label for="cmbPais" class="formbuilder-select-label">País<span class="tooltip-element">?</span></label>
                    <select class="form-control" name="cmbPais" id="cmbPais">
                        <option value="Chile" selected id="cmbPais-1">Chile</option>
                        <option value="Colombia" id="cmbPais-2">Colombia</option>
                        <option value="Perú" id="cmbPais-3">Perú</option>
                    </select>
                </div>
                <div class="formbuilder-text form-group field-txtNombre py-1">
                    <label for="txtNombre" class="formbuilder-text-label">Nombres<span
                                class="formbuilder-required">*</span><span class="tooltip-element">?</span></label>
                    <input type="text" placeholder="Ej.: Luis Pedro" class="form-control" name="txtNombre"
                            maxlength="50" id="txtNombre"
                           title="Agrega aquí los nombres, lo más completo que puedas."
                           required="required" aria-required="true">
                </div>
                <div class="formbuilder-text form-group field-txtNombre py-1">
                    <label for="txtApellido" class="formbuilder-text-label">Apellidos<span
                                class="formbuilder-required">*</span><span class="tooltip-element">?</span></label>
                    <input type="text" placeholder="Ej.: Gonzales Landa " class="form-control" name="txtApellido"
                            maxlength="50" id="txtApellido"
                           title="Agrega aquí los apellidos del destinatario, lo más completo que puedas."
                           required="required" aria-required="true">
                </div>
                <div class="text-white text-center py-3 mt-5">
                    <button type="submit" class="boton-efecto text-white " id="buscar">Buscar!</button>
                </div>
            </form>
        </div>
        <div class="col col-3"></div>
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