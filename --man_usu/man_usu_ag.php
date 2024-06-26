<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php include_once "lib_title.php"; ?>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|
  Nunito:300,300i,400,400i,600,600i,700,700i|
  Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/toastify.min.css">
<!-- JavaScript de Toastify -->
<script type="text/javascript" src="assets/js/toastify-js"></script>
<style>
        .monospace-font {
            font-family: 'Courier New', Courier, monospace;
        }
  </style>
</head>
<body>
  <?php
		   include_once "conex.php";
		   $link=conectarse();
		   //mysqli_query("SET NAMES 'utf8'");
		   $ses_usu_id     = $_SESSION['ses_id'];
		   $ses_usu_nombre = $_SESSION['ses_nombre'];
		   $ses_usu_ape_p  = $_SESSION['ses_ape_p'];
		   $ses_usu_ape_m  = $_SESSION['ses_ape_m'];
		   $ses_usu_cargo  = $_SESSION['ses_cargo'];
		   $ses_div_id	   = $_SESSION['ses_div_id'];
		   $ses_nivel	   = $_SESSION['ses_nivel'];
		   if ($ses_usu_id=="") {
		         ?> <script>location.href='index.php';</script>
                 <?php
		   }
    ?>
    <script>
        function validarMayusculas(input) {
            input.value = input.value.toUpperCase(); // Convierte el texto a mayúsculas
        }
    </script>
  <!-- ======= Header ======= -->
  <?php
  include_once "lib_header.php";
  include_once "lib_sidebar.php";?>
  <!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Mantención de Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
          <li class="breadcrumb-item">Usuarios</li>
          <li class="breadcrumb-item active">Agregar Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datos del Usuario</h5>

              <!-- General Form Elements -->
          <form name="CreUsu" id="CreUsu2" enctype="multipart/form-data">
			  
			    <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Login</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="f_login"  required>
                  </div>
                </div>
                
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_nombre"
                    oninput="validarMayusculas(this)" required>
                  </div>
                </div>
							
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Apellido Pat.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_ape_p"
                    oninput="validarMayusculas(this)" required>
                  </div>
                </div>
								
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Apellito Mat.</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_ape_m"
                    oninput="validarMayusculas(this)" required>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mail</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_mail"     required>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Cargo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_cargo"
                    oninput="validarMayusculas(this)" required>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Unidad</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_unidad"   oninput="validarMayusculas(this)" required>
                  </div>
                </div>
								  
				<div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">imagen</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile" name="f_imagen">
                  </div>
                </div>	
				<div class="row mb-3">
                  <label class="col-sm-2 col-form-label">División</label>
                  <div class="col-sm-10">
                    <select class="form-select monospace-font" aria-label="Default select example" name="f_division">
                      <option selected>Seleccione...</option>
<?php
// Consulta para obtener las divisiones
$con_divisiones = "SELECT * FROM gd_divisiones
ORDER BY div_div1, div_div2, div_div3, div_div4, div_div5";
$stmt_divisiones = $link->prepare($con_divisiones);
if (!$stmt_divisiones) {
    echo json_encode(['error' => true, 'message' => "Error al preparar la consulta: " . $link->error]);
    exit;
}

// Ejecutar la consulta para obtener las divisiones
if ($stmt_divisiones->execute()) {
    $res_divisiones = $stmt_divisiones->get_result();

    // Generar las opciones para las divisiones
    while ($arr_divisiones = $res_divisiones->fetch_assoc()) {
        // Obtener las divisiones no vacías
        $divisiones = array_filter([$arr_divisiones['div_div1'], $arr_divisiones['div_div2'],
            $arr_divisiones['div_div3'], $arr_divisiones['div_div4'], $arr_divisiones['div_div5']]);
        
        // Unir las divisiones con un guion
        $v_division = implode('-', $divisiones);
        
        // Generar espacios para alinear los nombres
        $v_div_nombre = $arr_divisiones['div_nombre'];
        $cantidad_espacios = max(0, 20 - strlen($v_division));
        $espacios = str_repeat("&nbsp;", $cantidad_espacios);

        // Generar la opción
        echo '<option value="' . $arr_divisiones['div_id'] . '">' . $v_division . $espacios . ' ' . $v_div_nombre . '</option>';
    }
} else {
    echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt_divisiones->error]);
}
$stmt_divisiones->close();
?>

</select>
</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2 col-form-label">Tipo Usuario</label>
    <div class="col-sm-10">
        <select class="form-select" aria-label="Default select example" name="f_tipo">
            <option selected>Seleccione...</option>
            <?php
            // Consulta para obtener los tipos de usuario
            $con_tipousu = "SELECT * FROM gd_tipousu";
            $stmt_tipousu = $link->prepare($con_tipousu);
            if (!$stmt_tipousu) {
                echo json_encode(['error' => true, 'message' => "Error al preparar la consulta: " . $link->error]);
                exit;
            }

            // Ejecutar la consulta para obtener los tipos de usuario
            if ($stmt_tipousu->execute()) {
                $res_tipousu = $stmt_tipousu->get_result();

                // Generar las opciones para los tipos de usuario
                while ($arr_tipousu = $res_tipousu->fetch_assoc()) {
                    echo '<option value="' . $arr_tipousu['tpu_id'] . '">' . $arr_tipousu['tpu_nombre'] . '</option>';
                }
            } else {
                echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt_tipousu->error]);
            }
            $stmt_tipousu->close();
            ?>
        </select>
    </div>
</div>
	
				<div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Nivel Jerárquico</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="f_nivel">
                      <option selected>Seleccione...</option>
                      <option value="1">Uno</option>
                      <option value="2">Dos</option>
                      <option value="3">Tres</option>
                    </select>
                  </div>
                </div>
                

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"> </label>
                  <div class="col-sm-10">
                    <input type="hidden" name="f_op" value="a">
					<input type="submit" class="btn btn-primary" value="Grabar">
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include_once "lib_footer.php"; ?>
  <!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handler for form submission
        $('#CreUsu2').submit(function(e) {
            e.preventDefault(); // Evita la presentación del formulario

            // Guarda una referencia al formulario
            var formData = new FormData(this);

            // Tu llamada AJAX aquí
            $.ajax({
                url: 'man_usu_p.php', // URL a tu script PHP de manejo
                type: 'POST', // Método de solicitud
                data: formData, // Datos del formulario
                processData: false, // Evita que jQuery procese los datos
                contentType: false, // No establece el tipo de contenido
                dataType: "json", // Tipo de datos esperados en la respuesta
                success: function(response) {
                    if(response.success) {
                        Toastify({
                            text: "Éxito: Operación realizada correctamente",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: 'right',
                            backround: "#388E3C",
                            className: "info",
                        }).showToast();

                        $('#CreUsu2')[0].reset(); // Vaciar el formulario
                    } else {
                        alert("Error: " + response.message); // Mostrar mensaje de error
                    }
                },
                error: function(xhr, status, error) {
                    // Maneja el error
                    console.error(xhr.responseText);
                    alert("Error en la solicitud. Por favor, intenta de nuevo más tarde.");
                }
            });
        });
    });
</script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>