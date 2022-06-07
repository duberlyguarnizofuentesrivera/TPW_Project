<?php
//ya validados, procedemos a guardar en nuestra DB la info (por ahora, la DB es una archivo de texto)
$nombre = $apellido = $pais = $mensaje = "";
$log_file = fopen("log.txt", "a") or die("no se puede abrir archivo de LOG!!");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $pais = $_POST["cmbPais"];
    $mensaje = $_POST["txtMensaje"];
    $db_file = fopen("db.txt", "a") or die("no se puede abrir el archivo!");
    //guardamos los datos además de la fecha y hora de la petición
    $registro = $nombre . "@" . $apellido . "@" . $pais . "@" . $mensaje . "@" . $_SERVER["REQUEST_TIME"] . "\n";
    fwrite($db_file, $registro);
    fclose($db_file);
    fwrite($log_file, "registro creado: {$registro}");
    //terminando de guardar, vamos a la página de resultados
    header("Location: buscar.php");
    exit();
} else {
    fwrite($log_file, "no se pudo guardar el registro, el método no es POST");
}
fclose($log_file);