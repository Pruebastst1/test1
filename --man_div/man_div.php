<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
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
  <style>
    .table td:nth-child(3) {
      width: 60%; /* Define el ancho de la tercera columna */
    }
  </style>
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
           $ses_div_id     = $_SESSION['ses_div_id'];
           $ses_nivel      = $_SESSION['ses_nivel'];

           if ($ses_usu_id==""){
                 ?> <script>location.href='index.php';</script> <?php
           }
    ?>
    
    
  <!-- ======= Header ======= -->
  <?php
  include_once "lib_header.php";
  include_once "lib_sidebar.php";?>
  <!-- End Sidebar-->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Mantención Divisiones</h1>
      <nav>
       <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Maestros</li>
          <li class="breadcrumb-item active">Divisiones</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">              

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Divisiones</h5>  
               
              <!-- Primary Color Bordered Table -->
              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>                     
                    <th scope="col" colspan="2"><a href="man_div_ag.php" class="btn btn-primary">  <i class="bi bi-plus-circle"></i> Agregar</a></th>                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                     $consulta="select * from gd_divisiones order by div_div1, div_div2, div_div3, div_div4, div_div5";
                     $res=mysqli_query($link,$consulta);
                     while ($arr=mysqli_fetch_array($res)){
                          
                            $v_div_id     = $arr['div_id'];
                            $v_div_div1   = $arr['div_div1'];
                            $v_div_div2   = $arr['div_div2']; 
                            $v_div_div3   = $arr['div_div3']; 
                            $v_div_div4   = $arr['div_div4']; 
                            $v_div_div5   = $arr['div_div5'];
                            $v_div_nombre = $arr['div_nombre'];
                             
                            // Array para almacenar las divisiones no vacías
                            $divisiones = array();

                            // Verificar y agregar las divisiones no vacías al array
                            if ($v_div_div1 != "") {
                                $divisiones[] = $v_div_div1;
                            }
                            if ($v_div_div2 != "") {
                                $divisiones[] = $v_div_div2;
                            }
                            if ($v_div_div3 != "") {
                                $divisiones[] = $v_div_div3;
                            }
                            if ($v_div_div4 != "") {
                                $divisiones[] = $v_div_div4;
                            }
                            if ($v_div_div5 != "") {
                                $divisiones[] = $v_div_div5;
                            }

                            // Unir las divisiones con un guion
                            $division = implode('-', $divisiones);
                                 
                            $v_division = $division;
                  ?>
                  <tr>
                    <th scope="row"><?php echo $v_div_id ?></th>
                    <td><?php echo $v_division ?></td>
                    <td><?php echo $v_div_nombre ?></td>
<td>
    <button type="button" class="btn btn-success edit-div" data-div-id="<?php echo $v_div_id ?>">
        <i class="bi bi-pencil"></i>
    </button>
    <button class="btn btn-danger delete-div" data-div-id="<?php echo $v_div_id ?>">
        <i class="bi bi-trash"></i>
    </button>
</td>
                  </tr>
                     <?php } ?>
                </tbody>
              </table>
              <!-- End Primary Color Bordered Table -->
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
    $(".delete-div").click(function() {
        var divId = $(this).data('div-id');

        $.ajax({
            url: 'man_div_p.php',
            type: 'POST',
            data: { id_div: divId, f_op: 'b' },
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

    $(".edit-div").click(function() {
        var divId = $(this).data('div-id');
        var originalName = $("#div_nombre_" + divId).text().trim();
        var originalCode = $("#div_codigo_" + divId).text().trim();

        var newName = prompt("Edita el nombre de la división:", originalName);
        var newCode = prompt("Edita el código de la división:", originalCode);

        if (newName != null && newName != "" && newCode != null && newCode != "") {
            newName = newName.toUpperCase(); // Convertir a mayúsculas

            $.ajax({
                url: 'man_div_p.php',
                type: 'POST',
                data: { id_div: divId, f_op: 'e', f_nombre: newName, f_codigo: newCode },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.error) {
                        showErrorToast("Error al editar: " + data.message);
                    } else {
                        showSuccessToast("División editada correctamente");
                        location.reload();
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

</script>
</body>
</html>
