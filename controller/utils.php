<?php


$nombreErr = $apellidoErr = $paisErr = $mensajeErr = $formErr = "";
function validarFormulario(): void
{
    $nombre = $apellido = $pais = $mensaje = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = limpiarCaracteresEspeciales($_POST["txtNombre"]);
        $apellido = limpiarCaracteresEspeciales($_POST["txtApellido"]);
        //validamos también el selector de pais por si alguien quiere enviar un request con data malintencionada por ahi
        $pais = limpiarCaracteresEspeciales($_POST["cmbPais"]);
        $mensaje = limpiarCaracteresEspeciales($_POST["txtMensaje"]);
        if (camposVacios($nombre, $apellido, $pais, $mensaje)) {
            $nombre = $apellido = $pais = $mensaje = "";
            $GLOBALS['formErr'] = "Por favor, rellene todos los campos.";
        } else {
            if (mensajeValido($mensaje, $nombre, $apellido)) {
                echo "Implementación realizada en JS";
            } else {
                $nombre = $apellido = $pais = $mensaje = "";
                $GLOBALS['mensajeErr'] = "El mensaje no puede contener información sensible (nombres, apellidos, etc.)";
            }
        }
    }
}

/*Valida que no haya caracteres extraños en los campos... para evitar inyección de código*/
function limpiarCaracteresEspeciales($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

/*valida que no haya campos vacíos*/
function camposVacios($nombre, $apellido, $pais, $mensaje): bool
{
    if (empty($nombre) || empty($apellido) || empty($pais) || empty($mensaje)) {
        return true;
    } else {
        //validamos que al menos tengan un carácter
        if (strlen($nombre) < 1 || strlen($apellido) < 1 || strlen($pais) < 1 || strlen($mensaje) < 1) {
            return true;
        } else {
            return false;
        }
    }
}

/*Envía una notificación al navegador*/
function notificacion($msg): void
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function mensajeValido($msg, $nom, $apell): bool
{
    //TODO: deberíamos validar también con una lista de palabras que los mensajes no contengan nombres propios
    //o apellidos comunes (sueltos o tal vez juntos)

    //primero verificamos que el nombre y apellidos sean de dos o más palabras
    $arrayNombre = explode(" ", $nom);
    $arrayApellido = explode(" ", $apell);
    //luego iteramos en cada nombre y apellido para verificar que el mensaje no los contenga
    foreach ($arrayNombre as $nombre) {
        if (str_contains($msg, $nombre)) {
            return false;
        }
    }
    foreach ($arrayApellido as $apellido) {
        if (str_contains($msg, $apellido)) {
            return false;
        }
    }
    return true;
}
