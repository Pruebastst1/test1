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

		   if ($ses_usu_id==""){
		         ?> <script>location.href='index.php';</script> <?php
		   }
		   
		   $id_tid	= $_GET['id_tid'];
		   $consulta="select * from gd_tiposdocto where tid_id = '$id_tid'";
		   $res=mysqli_query($link,$consulta);
		   while ($arr=mysqli_fetch_array($res)){
				 
				$v_tid_id		= $arr['tid_id'];	
				$v_tid_codigo	= $arr['tid_codigo'];
				$v_tid_nombre	= $arr['tid_nombre'];
				 
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
      <h1>Mantención de Tipos de Documento</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
          <li class="breadcrumb-item">Maestros</li>
          <li class="breadcrumb-item active">Tipos de Documento</li>
		  <li class="breadcrumb-item active">Editar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tipos de Documento</h5>

              <!-- General Form Elements -->
              <form name="f1" id="demo-form2"   method="POST" action="man_tid_p.php" enctype="multipart/form-data">
			  
			     
                
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Código</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="f_codigo"  value="<?php echo $v_tid_codigo ?>" maxlength="5" oninput="validarMayusculas(this)" required>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_nombre"  value="<?php echo $v_tid_nombre ?>" oninput="validarMayusculas(this)" required>
                  </div>
                </div>
				
				 

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"> </label>
                  <div class="col-sm-10">
                    <input type="hidden" name="f_op" value="e">
					<input type="hidden" name="id_tid" value="<?php echo $v_tid_id ?>">
					<input type="submit" class="btn btn-primary" value="Grabar">
					<a href="man_tid.php" class="btn btn-danger" >Volver</a>
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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>