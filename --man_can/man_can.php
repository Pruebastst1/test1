<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <?php
  include_once "lib_title.php";
  ?>
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
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/toastify.min.css">
<!-- JavaScript de Toastify -->
<script type="text/javascript" src="assets/js/toastify-js"></script>
    <style>
        .right-align {
            text-align: right;
        }
    </style>
</head>

<body>

    <?php

    include_once "conex.php";

    $link=conectarse();
    $ses_usu_id     = $_SESSION['ses_id'];
    $ses_usu_nombre = $_SESSION['ses_nombre'];
    $ses_usu_ape_p  = $_SESSION['ses_ape_p'];
    $ses_usu_ape_m  = $_SESSION['ses_ape_m'];
    $ses_usu_cargo  = $_SESSION['ses_cargo'];
    $ses_div_id     = $_SESSION['ses_div_id'];
    $ses_nivel      = $_SESSION['ses_nivel'];

    if ($ses_usu_id==""){
         ?> <script>location.href='index.php';</script> <?php
    }
    ?>
    
     <!-- ======= Header ======= -->
      <?php
    include_once "lib_header.php";
    include_once "lib_sidebar.php";
    ?>
      <!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
          <li class="breadcrumb-item">Maestros</li>
      <li class="breadcrumb-item">Canales</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Canales</h5>
              <p class="right-align"><a href="man_can_ag.php" class="btn btn-primary" title="Agregar Nuevo"><i class="bi bi-plus-circle"></i> Agregar</a></p>


              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Nombres</th>
           <th scope="col"> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $consulta="select * from gd_canales";
                      $res=mysqli_query($link,$consulta);
                      while ($arr=mysqli_fetch_array($res)){
                            $v_can_id       = $arr['can_id'];  
                            $v_can_nombre   = $arr['can_nombre'];
                  ?>
                  <tr>
                    <th scope="row"><?php echo $v_can_id ?></th>
                    <td id="can_nombre_<?php echo $v_can_id ?>"><?php echo $v_can_nombre ?></td>
                     
                     
                    <td>
                         <input type="hidden" name="f_op" value="a">
                         <button class="btn btn-danger delete-canal" data-f_op="b" data-canal-id="<?php echo $v_can_id ?>"><i class="bi bi-trash"></i></button>
                         <button class="btn btn-success edit-canal" data-original-value="<?php echo $v_can_nombre ?>" data-canal-id="<?php echo $v_can_id ?>"><i class="bi bi-pencil"></i></button>
                    </td>
                  </tr>
                  
                      <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section></main>
  <!-- ======= Footer ======= -->
  <?php
  include_once "lib_footer.php";
  ?>
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

  <script src="assets/js/main.js"></script>
<script>
$(document).ready(function() {
    $(".delete-canal").click(function() {
        var canalId = $(this).data('canal-id');
        var f_op = $(this).data('f_op');

        $.ajax({
            url: 'man_can_p.php',
            type: 'POST',
            data: { id_can: canalId, f_op: f_op },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.error) {
                    showErrorToast(data.message);
                } else {
                    showSuccessToast(data.message);
                    location.reload();
                }
            },
            error: function(xhr, status, error) {
                showErrorToast(error);
            }
        });
    });

    $(".edit-canal").click(function() {
        var canalId = $(this).data('canal-id');
        var originalValue = $("#can_nombre_" + canalId).text();

        var newValue = prompt("Edita el nombre del canal:", originalValue);

        if (newValue != null && newValue != "") {
            newValue = newValue.toUpperCase(); // Convertir a mayúsculas
            $.ajax({
                url: 'man_can_p.php',
                type: 'POST',
                data: { id_can: canalId, f_op: 'e', f_nombre: newValue },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.error) {
                        showErrorToast("Error al editar: " + data.message);
                    } else {
                        showSuccessToast("Canal editado correctamente");
                      reloadTable();
                    }
                },
                error: function(xhr, status, error) {
                    showErrorToast("Error al editar: " + error);
                }
            });
        }
    });

    function showSuccessToast(message) {
        Toastify({
            text: "Éxito: " + message,
            duration: 5000,
            close: true,
            gravity: "top",
            position: 'right',
            backgroundColor: "#388E3C",
            className: "info",
        }).showToast();
    }

    function showErrorToast(message) {
        Toastify({
            text: "Error: " + message,
            duration: 5000,
            close: true,
            gravity: "top",
            position: 'right',
            backgroundColor: "#E53935",
            className: "info",
        }).showToast();
    }
});
function reloadTable() {
        $.ajax({
            url: 'man_can_p.php', // La URL de donde obtienes los datos de la tabla
            type: 'GET', // Puedes usar GET si es necesario
            success: function(response) {
                // Reemplaza el contenido de la tabla con el nuevo contenido
                $(".datatable").html($(response).find(".datatable").html());
            },
            error: function(xhr, status, error) {
                showErrorToast("Error al actualizar la tabla: " + error);
            }
        });
    }

</script>
</body>
</html>