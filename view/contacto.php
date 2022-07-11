<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
    <script defer src="js/buscarSeguimiento.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/stylesheet.css">
    <script async>(function (w, d) {
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.setAttribute("src", "https://app.bluecaribu.com/conversion/integration/20fe0ad0db71eacbd93a3c703a51c6b4");
            h.appendChild(s);
        })(window, document);</script>
</head>

<body style="background: url('img/img_contacto_2x.png') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
background-size: cover;
-o-background-size: cover;">

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

<div class="container text-white">
    <div class="row">
        <div class="col text-center">
            <img class="img-fluid" src="img/logo_blanco.png" alt="">
            <h1>
                Conversemos
            </h1>

        </div>
    </div>
    <div class="row text-center">
        <div class="col col-sm-8 col-md-4 mx-auto">
            <form>
                <div>
                    <label for="email" class="form-label">Tu correo: </label> <br>
                    <INPUT class="form-control" TYPE="email" NAME="email" MAXLENGTH=18 placeholder="correo@example.com">
                </div>
                <div>
                    <label for="text" class="form-label">Tu comentario</label> <br>
                    <textarea class="form-control" rows="4" NAME="comentario"
                              placeholder="Escribe un comentario sobre nosotros..."></textarea>
                </div>
                <div class="py-5">
                    <button type="submit" class="boton-efecto">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- inicio de footer -->
<footer class="footer mt-auto py-3 bg-light text-center fixed-bottom">
    <div class="container">
        <span class="text-muted ">Página desarrollada por el grupo 4.  <a class="text-muted" href="adminlogin.php">Admin login</a></span>
    </div>
</footer>
<!-- fin de footer -->

</body>

</html>