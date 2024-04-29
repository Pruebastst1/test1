<?php
session_start();
error_reporting(1);

include_once "conex.php";
$link = conectarse();

// Verificar si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $f_op = $_POST['f_op'] ?? '';
    $f_nombre = $_POST['f_nombre'] ?? '';
    $id_div = $_POST['id_div'] ?? '';

    // Realizar la operación correspondiente según la opción
    if ($f_op == "a") {
        // Preparar la sentencia SQL para insertar datos
        $stmt = $link->prepare("INSERT INTO `gd_divisiones`
            (`div_id`, `div_div1`, `div_div2`, `div_div3`, `div_div4`, `div_div5`, `div_nombre`) 
                             VALUES (NULL, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $f_div1, $f_div2, $f_div3, $f_div4, $f_div5, $f_nombre);
    } elseif ($f_op == "e") {
        // Preparar la sentencia SQL para editar datos
        $stmt = $link->prepare("UPDATE `gd_divisiones` SET `div_div1` = ?, `div_div2` = ?,
            `div_div3` = ?, `div_div4` = ?, `div_div5` = ?, `div_nombre` = ?
            WHERE `div_id` = ?");
        $stmt->bind_param("ssssssi", $f_div1, $f_div2, $f_div3, $f_div4, $f_div5, $f_nombre, $id_div);
    } elseif ($f_op == "b") {
        // Preparar la sentencia SQL para eliminar datos
        $stmt = $link->prepare("DELETE FROM `gd_divisiones` WHERE `div_id` = ?");
        $stmt->bind_param("i", $id_div);
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
