<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"
    />
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
</div>
</body>
</html>
