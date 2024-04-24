<?php 
session_start(); 
error_reporting(1);

//include ("conex.php");
//$conn=conectarse();

$host = "localhost";
$username = "ticcarcl_wmgesdoc";
$password = "RRMWTjf~TUAK";
$database = "ticcarcl_gesdoc";



// Crear conexión
$conn = mysqli_connect($host, $username, $password, $database);

// Verificar conexión
if (mysqli_connect_error()) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Recoger y escapar los valores del formulario para prevenir inyecciones SQL
$f_login = mysqli_real_escape_string($conn, $_POST['f_login']);
$f_nombre = mysqli_real_escape_string($conn, $_POST['f_nombre']);
$f_ape_p = mysqli_real_escape_string($conn, $_POST['f_ape_p']);

// Preparar la consulta SQL insertando directamente los valores escapados
$sql = "INSERT INTO usuges (usu_login, usu_nombre, usu_ape_p) VALUES ('$f_login', '$f_nombre', '$f_ape_p')";

// Ejecutar la consulta
if (mysqli_query($conn, $sql)) {
    echo json_encode(['error' => false, 'message' => "Datos insertados correctamente"]);
} else {
    echo json_encode(['error' => true, 'message' => "Error: " . mysqli_error($conn)]);
}

// Cerrar la conexión
mysqli_close($conn);