<?php
session_start();
error_reporting(1);
include_once "conex.php";
$link = conectarse();

// Recuperar datos del POST
$f_nombre = $_POST['f_nombre'];
$f_fecha = $_POST['f_fecha'];
$f_op = $_POST['f_op'];
$id_fer = isset($_GET['id_fer']) ? $_GET['id_fer'] : 0;

// Convertir a entero para asegurar el tipo de dato correcto y seguridad adicional
$id_fer = (int)$id_fer;

if ($id_fer > 0) $f_op = "b";

// OPCION AGREGAR NUEVO
if ($f_op == "a") {
    // Preparar la sentencia SQL para insertar datos
    $stmt = $link->prepare("INSERT INTO `gd_feriados` (`fer_id`, `fer_fecha`, `fer_nombre`) VALUES (NULL, ?, ?)");

    if (!$stmt) {
        echo json_encode(['error' => true, 'message' => "Error al preparar la sentencia: " . mysqli_error($link)]);
        exit;
    }

    // Vincular los parámetros a la sentencia preparada
    $stmt->bind_param("ss", $f_fecha, $f_nombre);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => "Datos insertados correctamente"]);
    } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }

    // Cerrar la sentencia
    $stmt->close();
}

// Redireccionar a man_feriados.php al final del script
//header("Location: man_feriados.php");
exit(); // Asegúrate de terminar el script después de redireccionar

