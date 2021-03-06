<?php
require "propiedades.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
function listarMensajes($nombre, $apellido, $paisOSha): array
{
    $datetime = date("Y-m-d H:i:s");
    $log_file = fopen("log.txt", "a");
    $mensajes = array();

    try {
        $sql = "";
        if (strlen($paisOSha) == 40) {
            $sql = "SELECT mensaje, nombre_destinatario, apellido_destinatario, timestamp FROM mensajes WHERE seguimiento = ?";
        } else {
            $sql = "SELECT mensaje, nombre_destinatario, apellido_destinatario, timestamp FROM mensajes WHERE pais = ?";
        }
        $server = $GLOBALS["DbServername"];
        $dbname = $GLOBALS["DbName"];
        $user = $GLOBALS["DbUsername"];
        $pass = $GLOBALS["DbPassword"];

        $conn = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8mb4", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$paisOSha]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $filas = $stmt->fetchAll();
        if (strlen($paisOSha) == 40) {
            foreach ($filas as $fila => $contenido) {
                $mensajes[] = array(
                    "nombre" => $contenido['nombre_destinatario'],
                    "apellido" => $contenido['apellido_destinatario'],
                    "mensaje" => $contenido['mensaje'],
                    "fecha" => $contenido['timestamp']
                );
            }
        } else {
            foreach ($filas as $fila => $contenido) {
                if (equivalente($nombre, $contenido['nombre_destinatario']) && equivalente($apellido, $contenido['apellido_destinatario'])) {
                    $mensajes[] = array(
                        "nombre" => $contenido['nombre_destinatario'],
                        "apellido" => $contenido['apellido_destinatario'],
                        "mensaje" => $contenido['mensaje'],
                        "fecha" => $contenido['timestamp']
                    );
                }
            }
        }
        fwrite($log_file, "$datetime Consulta SQL exitosa $sql\n");
        $conn = null;
    } catch (PDOException $e) {

        $error = $e->getMessage();
        fwrite($log_file, "$datetime EXCEPCI??N SQL con: $sql, ERROR: $error\n");
    }

    //-----------------------
    fclose($log_file);
    return $mensajes;
}

function equivalente($dato1, $dato2): bool
{
    //removemos tildes, dieresis, etc
    $dato1 = remover_tildes($dato1);
    $dato2 = remover_tildes($dato2);
    //pasamos todo a min??sculas
    $dato1 = strtolower($dato1);
    $dato2 = strtolower($dato2);
    //convertimos en arrays
    $arrayDato1 = explode(" ", $dato1);
    $arrayDato2 = explode(" ", $dato2);
    $arrayDato1Trimmed = array();
    $arrayDato2Trimmed = array();

    $numeroCoincidencias = 0;
    //limpiamos los datos
    foreach ($arrayDato1 as $dato1) {
        $arrayDato1Trimmed[] = trim($dato1);
    }
    foreach ($arrayDato2 as $dato2) {
        $arrayDato2Trimmed[] = trim($dato2);
    }
    //comparamos los datos
    foreach ($arrayDato1Trimmed as $dato1) {
        foreach ($arrayDato2Trimmed as $dato2) {
            similar_text($dato1, $dato2, $similitud);
            //similitud mayor al 80% por palabra, esto tal vez deber??a ser m??s alto, queda por comprobar
            if ($similitud > 80) {
                $numeroCoincidencias++;
            }
        }
    }
    //verificamos que al menos coincida una palabra
    return $numeroCoincidencias >= 1;

}

//funci??n para remover las tildes y dieresis de letras, para poder hacer comparaci??n fon??tica de los nombres
// esta funci??n es una implementaci??n de la autor??a de los creadores de WordPress, nuestro grupo no la ha hecho
function remover_tildes($string)
{
    if (!preg_match('/[\x80-\xff]/', $string))
        return $string;

    $chars = array(
        // Decompositions for Latin-1 Supplement
        chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',
        chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',
        chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',
        chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',
        chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',
        chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',
        chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',
        chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',
        chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',
        chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',
        chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',
        chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',
        chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',
        chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',
        chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',
        chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',
        chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',
        chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',
        chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',
        chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',
        chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',
        chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',
        chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',
        chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',
        chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',
        chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',
        chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',
        chr(195) . chr(191) => 'y',
        // Decompositions for Latin Extended-A
        chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',
        chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',
        chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',
        chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',
        chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',
        chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',
        chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',
        chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',
        chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',
        chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',
        chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',
        chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',
        chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',
        chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',
        chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',
        chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',
        chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',
        chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',
        chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',
        chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',
        chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',
        chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',
        chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',
        chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',
        chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',
        chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',
        chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',
        chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',
        chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',
        chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',
        chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',
        chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',
        chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',
        chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',
        chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',
        chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',
        chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',
        chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',
        chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',
        chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',
        chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',
        chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',
        chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',
        chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',
        chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',
        chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',
        chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',
        chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',
        chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',
        chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',
        chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',
        chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',
        chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',
        chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',
        chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',
        chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',
        chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',
        chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',
        chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',
        chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',
        chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',
        chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',
        chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',
        chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's'
    );

    return strtr($string, $chars);
}