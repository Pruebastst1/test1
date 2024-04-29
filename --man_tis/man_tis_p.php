<?php
session_start();
error_reporting(1);
include_once "conex.php";
$link = conectarse();

// Recuperar datos del POST
$f_nombre = $_POST['f_nombre'];
$f_op = $_POST['f_op'];
$id_tis = $_POST['id_tis'];

// OPCION AGREGAR NUEVO
if ($f_op == "a") {
    // Preparar la sentencia SQL para insertar datos
    $stmt = $link->prepare("INSERT INTO `gd_tiposolicitud` (`tis_id`, `tis_nombre`) VALUES (NULL, ?)");
    $stmt->bind_param("s", $f_nombre);

if ($stmt->execute()) {
echo json_encode(['success' => true]);
exit();
   } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }
    $stmt->close();
}
// opcion EDITAR
if ($f_op == "e") {
    // Preparar la sentencia SQL para editar datos
    $stmt = $link->prepare("UPDATE `gd_tiposolicitud` SET `tis_nombre` = ? WHERE `tis_id` = ?");
    $stmt->bind_param("si", $f_nombre, $id_tis);

if ($stmt->execute()) {
echo json_encode(['success' => true]);
exit();
   } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }
    $stmt->close();
}
// opción ELIMINAR
if ($f_op == "b") {
    // Preparar la sentencia SQL para eliminar datos
    $stmt = $link->prepare("DELETE FROM `gd_tiposolicitud` WHERE `tis_id` = ?");
    $stmt->bind_param("i", $id_tis);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
        exit();
    }
    $stmt->close();
}

// mensaje error
echo json_encode(['error' => true, 'message' => "Operación no válida"]);
