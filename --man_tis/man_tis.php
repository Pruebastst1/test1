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
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
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
		         ?> <script>location.href='index.php';</script> <?php
		   }
    ?>
	
	 <!-- ======= Header ======= -->
	  <?php
    include_once "lib_header.php";
	  include_once "lib_sidebar.php"; ?>
	  <!-- End Sidebar-->



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
          <li class="breadcrumb-item">Maestros</li>
		  <li class="breadcrumb-item">Tipos de Solicitud</li>
          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tipos de Solicitud</h5>
              <p align="right"><a href="man_tis_ag.php">
                <button type="button" title="Agregar Nuevo" class="btn btn-primary">
                  <i class="bi bi-plus-circle"></i> Agregar</button>
                </a></p>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#Id</th>
                    <th scope="col">Nombres</th>  
                  </tr>
                </thead>
                <tbody>
				  <?php
				      $consulta="select * from gd_tiposolicitud";
					  $res=mysqli_query($link,$consulta);
					  while ($arr=mysqli_fetch_array($res)) {
							$v_tis_id		= $arr['tis_id'];
							$v_tis_nombre	= $arr['tis_nombre'];
				  ?>
                  <tr>
                    <th scope="row"><?php echo $v_tis_id ?></th>
                    <td><?php echo $v_tis_nombre ?></td>
                    
					 
                    <td>
					     
					     <a href="man_tis_ed.php?id_tis=<?php echo $v_tis_id ?>">
                <button type="button" class="btn btn-success">
                  <i class="bi bi-pencil"></i>
                </button></a>
						 <a href="man_tis_bo.php?id_tis=<?php echo $v_tis_id ?>">
              <button type="button" class="btn btn-danger">
                <i class="bi bi-trash"></i>
              </button></a>
				    </td>
                  </tr>
					  <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include_once "lib_footer.php"; ?>
  <!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short">
      
    </i></a>
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
