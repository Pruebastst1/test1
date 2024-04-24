<?php
session_start();
error_reporting(1);
include_once "lib_title.php";

include_once "conex.php";
$link = conectarse();

// Definir las variables y obtener los valores del formulario
$id_usu = $_POST['id_usu'];
$f_login = $_POST['f_login'];
$f_nombre = $_POST['f_nombre'];
$f_ape_p = $_POST['f_ape_p'];
$f_ape_m = $_POST['f_ape_m'];
$f_mail = $_POST['f_mail'];
$f_cargo = $_POST['f_cargo'];
$f_unidad = $_POST['f_unidad'];
$f_file_nombre = $_FILES['f_imagen']['name'];
$f_division = $_POST['f_division'];
$f_nivel = $_POST['f_nivel'];
$f_tipo = $_POST['f_tipo'];
// Capturar el valor de "f_obs" desde el formulario o asignar un valor por defecto
if (!isset($_POST['f_obs'])) {
    $f_obs = "Valor por defecto para obs";
} else {
    $f_obs = $_POST['f_obs'];
}
$f_op = $_POST['f_op'];

// OPCION AGREGAR NUEVO
if ($f_op == "a") {
    $consulta = "INSERT INTO `gd_usuges` (`usu_id`, `usu_login`, `usu_nombre`, `usu_ape_p`, `usu_ape_m`, `usu_cargo`, `usu_mail`, `usu_unidad`, `usu_tpu_id`, `usu_div_id`, `usu_estado`, `usu_nivel`, `usu_obs`, `usu_pass`) 
                                VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'VI', ?, ?, ?)";
    $stmt = mysqli_prepare($link, $consulta);
    mysqli_stmt_bind_param($stmt, 'sssssssssss', $f_login, $f_nombre, $f_ape_p, $f_ape_m, $f_cargo, $f_mail, $f_unidad, $f_tipo, $f_division, $f_nivel, $f_obs, $f_login);
    mysqli_stmt_execute($stmt);

    // Recupera el último registro
    $ultimo_id = mysqli_insert_id($link);
    $id_usr = $ultimo_id;

    // Agrega los permisos que tiene el tipo de USUARIO
    $consulta_permisos = "INSERT INTO gd_permisos (per_usu_id, per_opc_id)
                          SELECT ?, prt_opc_id FROM permtipo WHERE prt_tpu_id = ?";
    $stmt_permisos = mysqli_prepare($link, $consulta_permisos);
    mysqli_stmt_bind_param($stmt_permisos, 'ss', $id_usr, $f_tipo);
    mysqli_stmt_execute($stmt_permisos);

    if ($f_file_nombre != "") {
        $fileNameCmps = explode(".", $f_file_nombre);
        $fileExtension = strtolower(end($fileNameCmps));
        $destino =  "xfiles/userprofile/" . $id_usr . "." . $fileExtension;
        $nombre_archivo = $id_usr . "." . $fileExtension;
        if (copy($_FILES['f_imagen']['tmp_name'], $destino)) {
            $status = "Archivo subido: <b>" . $f_file_nombre . "</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    }
}

// opción EDITAR
if ($f_op == "e") {
    $consulta = "UPDATE `gd_usuges` set
                                     `usu_mail`        = ?, 
                                     `usu_nombre`      = ?, 
                                     `usu_ape_p`       = ?, 
                                     `usu_ape_m`       = ?, 
                                     `usu_cargo`       = ?, 
                                     `usu_unidad`      = ?,
                                     `usu_tpu_id`      = ?,
                                     `usu_div_id`      = ?,
                                     `usu_nivel`       = ?,
                                     `usu_obs`         = ? 
                             WHERE  `usu_id` = ?";
    $stmt = mysqli_prepare($link, $consulta);
    mysqli_stmt_bind_param($stmt, 'ssssssssssi', $f_mail, $f_nombre, $f_ape_p, $f_ape_m, $f_cargo, $f_unidad, $f_tipo, $f_division, $f_nivel, $f_obs, $id_usu);
    mysqli_stmt_execute($stmt);
    $id_usr = $id_usu;

    if ($f_file_nombre != "") {
        $fileNameCmps = explode(".", $f_file_nombre);
        $fileExtension = strtolower(end($fileNameCmps));
        $destino =  "xfiles/userprofile/" . $id_usr . "." . $fileExtension;
        $nombre_archivo = $id_usr . "." . $fileExtension;
        if (copy($_FILES['f_imagen']['tmp_name'], $destino)) {
            $status = "Archivo subido: <b>" . $f_file_nombre . "</b>";
        } else {
            $status = "Error al subir el archivo";
        }
    }
}

// opción REINICIAR PASSWORD
if ($f_op == "rp") {
    $consulta = "UPDATE `gd_usuges` SET  `usu_password` =  `usu_login` where `usu_id` = ?";
    $stmt = mysqli_prepare($link, $consulta);
    mysqli_stmt_bind_param($stmt, 'i', $id_usu);
    mysqli_stmt_execute($stmt);
}

// opción ACTIVAR USUARIO
if ($f_op == "au") {
    $consulta = "UPDATE `gd_usuges` SET  `usu_estado` = 'VI' where `usu_id` = ?";
    $stmt = mysqli_prepare($link, $consulta);
    mysqli_stmt_bind_param($stmt, 'i', $id_usu);
    mysqli_stmt_execute($stmt);
}

// opción DESACTIVAR USUARIO
if ($f_op == "du") {
    $consulta = "UPDATE `gd_usuges` SET  `usu_estado` = 'IN' where `usu_id` = ?";
    $stmt = mysqli_prepare($link, $consulta);
    mysqli_stmt_bind_param($stmt, 'i', $id_usu);
    mysqli_stmt_execute($stmt);
}
header("Location: man_usu.php");
exit();