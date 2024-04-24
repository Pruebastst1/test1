<?php
session_start();
error_reporting(1);
include_once "conex.php";
$link = conectarse();

$f_nombre = $_POST['f_nombre'];
$f_plazo = $_POST['f_plazo'];
$f_op = $_POST['f_op'];
$id_mat = $_POST['id_mat'];

// OPCION AGREGAR NUEVO
if ($f_op == "a") {
    $consulta = "INSERT INTO `gd_materias` (`mat_id`, `mat_nombre`, `mat_plazo`) VALUES (NULL, ?, ?)";
    $stmt = $link->prepare($consulta);
    if (!$stmt) {
        echo json_encode(['error' => true, 'message' => "Error al preparar la consulta: " . $link->error]);
        exit;
    }

    $stmt->bind_param("ss", $f_nombre, $f_plazo);
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
    $consulta = "UPDATE `gd_materias` SET `mat_nombre` = ?, `mat_plazo` = ? WHERE `mat_id` = ?";
    $stmt = $link->prepare($consulta);
    if (!$stmt) {
        echo json_encode(['error' => true, 'message' => "Error al preparar la consulta: " . $link->error]);
        exit;
    }

    $stmt->bind_param("ssi", $f_nombre, $f_plazo, $id_mat);
    if ($stmt->execute()) {
        header("Location: man_mat.php");
        exit();
    } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }
    $stmt->close();
}

// opcion ELIMINAR
if ($f_op == "b") {
    $consulta = "DELETE FROM `gd_materias` WHERE `mat_id` = ?";
    $stmt = $link->prepare($consulta);
    if (!$stmt) {
        echo json_encode(['error' => true, 'message' => "Error al preparar la consulta: " . $link->error]);
        exit;
    }

    $stmt->bind_param("i", $id_mat);
    if ($stmt->execute()) {
        header("Location: man_mat.php");
        exit();
    } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
    }
    $stmt->close();
}
?>
