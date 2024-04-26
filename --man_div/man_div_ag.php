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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- CSS de Toastify -->
  <link rel="stylesheet" type="text/css" href="assets/css/toastify.min.css">
  <!-- JavaScript de Toastify -->
  <script type="text/javascript" src="assets/js/toastify-js"></script>
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
  if ($ses_usu_id==""){
  ?> <script>location.href='index.php';</script> <?php
  }
  ?>  
  <script>
    function validarMayusculas(input) {
      input.value = input.value.toUpperCase(); // Convierte el texto a mayúsculas
    }
  </script> 
  <script>
    // Funcion que valida el código de las DIV, valida que solo se ingrese valores alfanuméricos.
    function validarCodigo(input) {
      input.value = input.value.toUpperCase();
      // Eliminar caracteres no alfanuméricos
      input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
      // Truncar el texto si excede los 5 caracteres
      if (input.value.length > 5) {
        input.value = input.value.substring(0, 5);
      }
    }
  </script>
  <style>
    .small-input {
      width: 60px; /* Ajusta el ancho según sea necesario */
    }
  </style>
  <!-- ======= Header ======= -->
  <?php
  include_once "lib_header.php";
  include_once "lib_sidebar.php";?>
  <!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Mantención de Divisiones</h1>
      <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Maestros</li>
          <li class="breadcrumb-item active">Divisiones</li>
          <li class="breadcrumb-item active">Agregar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Divisiones</h5>
              <!-- General Form Elements -->
              <form name="FormDiv" id="FormDiv2" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Código</label>
                  <div class="col-sm-10">
                    <div class="d-inline-block">
                      <input type="text" class="form-control" name="f_div1" size="5" oninput="validarCodigo(this)" required>
                    </div>
                    <div class="d-inline-block">
                      <input type="text" class="form-control" name="f_div2" size="5" oninput="validarCodigo(this)">
                    </div>
                    <div class="d-inline-block">
                      <input type="text" class="form-control" name="f_div3" size="5" oninput="validarCodigo(this)">
                    </div>
                    <div class="d-inline-block">
                      <input type="text" class="form-control" name="f_div4" size="5" oninput="validarCodigo(this)">
                    </div>
                    <div class="d-inline-block">
                      <input type="text" class="form-control" name="f_div5" size="5" oninput="validarCodigo(this)">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_nombre" oninput="validarMayusculas(this)" required>
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
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
        // Handler for form submission
        $('#FormDiv2').submit(function(e) {
            e.preventDefault(); // Evita la presentación del formulario
            // Guarda una referencia al formulario
            var formData = new FormData(this);
            // Tu llamada AJAX aquí
            $.ajax({
                url: 'man_can_p.php', // URL a tu script PHP de manejo
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
                        $('#FormDiv2')[0].reset(); // Vaciar el formulario
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
</body>
</html>
