<?php

//ya validados, procedemos a guardar en nuestra DB la info (por ahora, la DB es una archivo de texto)
$nombre = $apellido = $pais = $mensaje = "";
$log_file = fopen("log.txt", "a");
$datetime = date("Y-m-d H:i:s");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $pais = $_POST["cmbPais"];
    $mensaje = $_POST["txtMensaje"];
    $seguimiento = $_POST["txtSeguimiento"];
    $sql = "";
    $has_previous_follow_code = false;
    if ($seguimiento == null or strlen($seguimiento) != 40) {
        $has_previous_follow_code = false;
        $seguimiento = sha1($nombre . $apellido . $pais . $mensaje . $datetime);
    } else {
        $has_previous_follow_code = true;
    }

    try {
        $registro = $nombre . "@" . $apellido . "@" . $pais . "@" . $mensaje . "@" . $_SERVER["REQUEST_TIME"] . "\n";
        $sql = "INSERT INTO mensajes (mensaje, pais, nombre_destinatario, apellido_destinatario, seguimiento) VALUES (?, ?, ?, ?, ?)";
        require "propiedades.php";
        $server = $GLOBALS["DbServername"];
        $dbname = $GLOBALS["DbName"];
        $user = $GLOBALS["DbUsername"];
        $pass = $GLOBALS["DbPassword"];
        $conn = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8mb4", $user, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($sql);
        $stmt->execute([$mensaje, $pais, $nombre, $apellido, $seguimiento]);

        fwrite($log_file, "$datetime registro creado: $registro");
        fclose($log_file);
        $conn = null;
        $newFollow = $has_previous_follow_code ? "yes" : "no";
        $nextAddress = "Location: ../mensajeenviado.php?newfollow=$newFollow&followup=$seguimiento";
        header($nextAddress);
        exit();
    } catch (PDOException $e) {

        $error = $e->getMessage();
        fwrite($log_file, "$datetime EXCEPCIÓN SQL con: $sql, ERROR: $error \n");
    }


} else {
    fwrite($log_file, " $datetime no se pudo guardar el registro, el método no es POST");
}
fclose($log_file);