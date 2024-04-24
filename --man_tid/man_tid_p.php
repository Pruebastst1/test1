<?php 
session_start(); 
error_reporting(1);
include_once "conex.php";
$link = conectarse();

$f_nombre = $_POST['f_nombre'];
$f_codigo = $_POST['f_codigo'];
$f_op = $_POST['f_op'];
$id_tid = $_POST['id_tid'];

// OPCION AGREGAR NUEVO
if ($f_op == "a") {
    $consulta = "INSERT INTO `gd_tiposdocto` (`tid_id`, `tid_codigo`, `tid_nombre`) VALUES (NULL, ?, ?)";
    $stmt = $link->prepare($consulta);
    $stmt->bind_param("ss", $f_codigo, $f_nombre);
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
    $consulta = "UPDATE `gd_tiposdocto` SET `tid_codigo` = ?, `tid_nombre` = ? WHERE `tid_id` = ?";
    $stmt = $link->prepare($consulta);
    $stmt->bind_param("ssi", $f_codigo, $f_nombre, $id_tid);
if ($stmt->execute()) {
echo json_encode(['success' => true]);
exit(); 
   } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }
    $stmt->close();
}

// opcion ELIMINAR
if ($f_op == "b") {
    $consulta = "DELETE FROM `gd_tiposdocto` WHERE `tid_id` = ?";
    $stmt = $link->prepare($consulta);
    $stmt->bind_param("i", $id_tid);
if ($stmt->execute()) {
echo json_encode(['success' => true]);
exit(); 
   } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }
    $stmt->close();
}
exit();