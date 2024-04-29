<?php
session_start();
error_reporting(1);
include_once "conex.php";
$link = conectarse();

// Verificar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $f_op = $_POST['f_op'] ?? '';
    $f_nombre = $_POST['f_nombre'] ?? '';
    $id_can = $_POST['id_can'] ?? '';

    // Realizar la operación correspondiente según la opción
    if ($f_op == "a") {
        $consulta = "INSERT INTO `gd_canales` (`can_id`, `can_nombre`) VALUES (NULL, ?)";
        $stmt = $link->prepare($consulta);
        $stmt->bind_param("s", $f_nombre);
    } elseif ($f_op == "e") {
        $consulta = "UPDATE `gd_canales` SET `can_nombre` = ? WHERE  `can_id` = ?";
        $stmt = $link->prepare($consulta);
        $stmt->bind_param("si", $f_nombre, $id_can);
    } elseif ($f_op == "b") {
        $consulta = "DELETE FROM `gd_canales` WHERE  `can_id` = ?";
        $stmt = $link->prepare($consulta);
        $stmt->bind_param("i", $id_can);
    } else {
        // Operación no válida
        echo json_encode(['error' => true, 'message' => "Operación no válida"]);
        exit(); // Terminar el script después de enviar la respuesta JSON
    }

    // Ejecutar la consulta preparada y manejar la respuesta
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
        exit(); // Terminar el script después de enviar la respuesta JSON
    } else {
        echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
        exit(); // Terminar el script después de enviar la respuesta JSON
    }
} else {
    // Si la solicitud no es de tipo POST, retornar un error
    echo json_encode(['error' => true, 'message' => "Solicitud no válida"]);
    exit(); // Terminar el script después de enviar la respuesta JSON
}
