<html lang="es">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script defer src="view/js/buscarSeguimiento.js"></script>
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/fonts/stylesheet.css">
    <script src="view/js/mostrarPopUp.js" defer></script>
    <script defer src="view/js/buscarSeguimiento.js"></script>
    <script src="view/js/validacionFormulario.js" defer></script>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Bienvenido - Tell U</title>
    <script async>(function (w, d) {
            let h = d.head || d.getElementsByTagName("head")[0];
            let s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.setAttribute("src", "https://app.bluecaribu.com/conversion/integration/20fe0ad0db71eacbd93a3c703a51c6b4");
            h.appendChild(s);
        })(window, document);</script>
</head>

<body class="bg-celeste">
<!-- inicio de barra de navegación -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="view/img/logo.png" width="50" alt="navigation bar logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item">
                    <a class="nav-link " href="view/buscar.php">Buscar Mensaje</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="view/nosotros.html">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view/servicios.html">Servicios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link " href="view/equipo.html">Equipo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="view/contacto.php">Contacto</a>
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

<div class="container g-0" id="content">

    <div class="row clearfix">
        <div class="col">
            <div class="col text-center">
                <div class="row">
                    <div class="col">
                        <img class="w-50" src="view/img/logo_blanco.png" alt="logo">
                    </div>
                    <div class="col text-start py-3">
                        <div class="card">
                            <div class="card-body bg-celeste text-white">
                                <h2>TellU te permite escribir y leer mensajes anónimos, ¡con solo un nombre de
                                    destinatario!</h2>
                                <p class="h6">Utiliza el menú para conocer las funciones de TellU.<br>Puedes enviar y
                                    recibir mensajes (bueno, algo así) solo con un nombre. Si alguien ha dejado un
                                    mensaje para alguien con tu nombre, podrás ver ese mensaje en el
                                    listado. Si no, ¡no desesperes! ¡Alguien pensará pronto en tí!</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="w-100 d-none d-xs-block d-lg-none "></div>
        <div class="d-flex ">
        </div>
        <div class="col text-center ">
            <div class="sticky-md-bottom sticky-xs-top ">
                <img class="img-fluid h-75 align-bottom g-0" src="view/img/img_index.png" alt="main image">
                <div class="col text-center position-absolute bottom-0 start-50 translate-middle text-white">
                    <a onclick="writeMessage()" href="#" class="boton-efecto text-white " id="btnNuevoMensaje">Dejar un
                        mensaje</a>
                    <p class="py-3 small ">Al dar clic en el botón, estás aceptando nuestra <a href=" ">política de
                            privacidad</a></p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- inicio de footer -->
<footer class="footer mt-auto py-3 bg-light text-center fixed-bottom ">
    <div class="container ">
        <span class="text-muted ">Página desarrollada por el grupo 4  <a class="text-muted" href="view/adminlogin.php">admin login</a></span>
    </div>
</footer>
<!-- fin de footer -->


<div id="writeMessagePopUp" class="messageForm invisible">
    <div class="p-2"><i id="btnCerrar" class="fa-solid fa-xmark"></i></div>
    <div id="backgroundOverlay" class="backgroundOverlay"></div>
    <div>
        <h1 id="formH1">Nuevo Mensaje</h1>
    </div>
    <form method="post" action="controller/agregarMensaje.php">
        <div class="form-group py-1">
            <label for="cmbPais" class="form-label">País <span class="formValidationMessage"
                                                               id="paisErrorSpan"></span></label>
            <select class="form-control" name="cmbPais" id="cmbPais">
                <option value="Chile" selected id="cmbPais-1">Chile</option>
                <option value="Colombia" id="cmbPais-2">Colombia</option>
                <option value="Perú" id="cmbPais-3">Perú</option>
            </select>
        </div>
        <div class="form-group py-1">
            <label for="txtNombre" class="form-label">Nombres <span class="formValidationMessage"
                                                                    id="nombreErrorSpan"></span></label>
            <input type="text" placeholder="Ej.: Luis Manuel " class="form-control" name="txtNombre"
                   maxlength="50" id="txtNombre"
                   title="Agrega aquí los nombres completos del destinatario."
                   required="required" aria-required="true">
        </div>
        <div class="form-group py-1">
            <label for="txtNombre" class="form-label">Apellidos <span class="formValidationMessage"
                                                                      id="apellidoErrorSpan"></span></label>
            <input type="text" placeholder="Ej.: Gonzales Landa " class="form-control" name="txtApellido"
                   maxlength="50" id="txtApellido"
                   title="Agrega aquí los apellidos del destinatario, lo más completo que puedas."
                   required="required" aria-required="true">
        </div>
        <div class="form-group py-1">
            <label for="txtMensaje" class="form-label">Mensaje <span class="formValidationMessage"
                                                                     id="mensajeErrorSpan"></span></label>
            <textarea placeholder="Escribe aquí tu mensaje" class="form-control" name="txtMensaje"
                      maxlength="160" id="txtMensaje"
                      title="Ingresa el mensaje que quieres dejar. No se permiten nombres completos o información sensible."
                      required="required" aria-required="true"></textarea>
        </div>
        <div class="text-center py-3 mt-5">
            <span id="formErrorSpan"></span>
            <button type="submit" class="boton-efecto text-white " id="btnCrearMensaje">Crear!
            </button>
        </div>
        <div class="form-group py-1">
            <label for="txtSeguimiento" class="form-label">Código de seguimiento <i class="fa-solid fa-circle-info"
                                                                                    title="Si deseas ver un registro de tus mensajes, ingresa tu código de seguimiento, si no tienes uno, se creará uno después de enviar tu mensaje"> </i></label>
            <input type="text" class="form-control" name="txtSeguimiento"
                   maxlength="40" id="txtSeguimiento">
        </div>
    </form>
</div>
</body>

</html>