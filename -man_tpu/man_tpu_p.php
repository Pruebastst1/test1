<?php
session_start();
include_once "conex.php";
$link = conectarse();

// Verificar si se reciben los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $f_nombre = $_POST['f_nombre'];

    // Preparar la consulta para insertar el nuevo tipo de usuario
    $consulta = "INSERT INTO `gd_tipousu` (`tpu_nombre`) VALUES (?)";

    // Preparar la sentencia
    $stmt = $link->prepare($consulta);
    if (!$stmt) {
        echo json_encode(['error' => true, 'message' => "Error1 al preparar la consulta: " . $link->error]);
        exit;
    }

    // Vincular los parámetros y ejecutar la consulta
    $stmt->bind_param("s", $f_nombre);
        if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['error' => true, 'message' => "Error2 al ejecutar la consulta: " . $stmt->error]);
        exit();
    }
    $stmt->close();
    $link->close();
}
