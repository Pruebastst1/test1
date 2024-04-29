<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <?php
  include_once "lib_title.php"
  ?>
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
		   $ses_div_id	   = $_SESSION['ses_div_id'];
		   $ses_nivel	   = $_SESSION['ses_nivel'];
		   if ($ses_usu_id=="") {
		         ?> <script>location.href='index.php';</script>
                 <?php
		   }
    ?>
   <!-- ======= Header ======= -->
    <?php include_once "lib_header.php";?>
    <!-- End Header -->   <!-- ======= Sidebar ======= -->
    <?php include_once "lib_sidebar.php";
    $data = "menu.php";
    $a = cifraCesar($data, 3);
    $data = "man_usu_ag.php?cod=2";
    $b = cifraCesar($data, 3);
    ?>
	  <!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php?a=<?=$a ?>">Home</a></li>
          <li class="breadcrumb-item">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Usuarios</h5>
              <p align="right"><a href="index.php?a=<?=$b ?>">
                <button type="button" title="Agregar Nuevo" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Agregar</button>
            </a> </p>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Apellido Pat.</th>
                    <th scope="col">Apellido Mat.</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Unidad</th>
					<th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>
<?php
$consulta = "SELECT * FROM gd_usuges";
$stmt = $link->prepare($consulta);
if (!$stmt) {
    echo json_encode(['error' => true, 'message' => "Error al preparar la sentencia: " . $link->error]);
    exit;
}
// Ejecutar la sentencia
if ($stmt->execute()) {
    $res = $stmt->get_result();
    while ($arr = $res->fetch_assoc()) {
        $v_usu_id       = $arr['usu_id'];
        $v_usu_mail     = $arr['usu_mail'];
        $v_usu_nombre   = $arr['usu_nombre'];
        $v_usu_ape_p    = $arr['usu_ape_p'];
        $v_usu_ape_m    = $arr['usu_ape_m'];
        $v_usu_cargo    = $arr['usu_cargo'];
        $v_usu_unidad   = $arr['usu_unidad'];
        $v_usu_estado   = $arr['usu_estado'];
?>
<tr>
    <th scope="row"><?php echo $v_usu_ape_p ?></th>
    <td><?php echo $v_usu_ape_m ?></td>
    <td><?php echo $v_usu_nombre ?></td>
    <td><?php echo $v_usu_unidad ?></td>
    <td>
        <?php if ($v_usu_estado == "IN") { ?>
            <span class="badge border-success border-1 text-danger">Inactivo</span>
        <?php } else { ?>
            <span class="badge border-success border-1 text-success">Activo</span>
        <?php } ?>
    </td>
    <td>
        <?php
        $data = "man_usu_ed.php?id_usu=$v_usu_id";
        $c = cifraCesar($data, 3);
        ?>
        <a href="index.php?a=<?php echo $c ?>"><button type="button" class="btn btn-success">
            <i class="bi bi-pencil"></i></button></a>
    </td>
</tr>
<?php
    }
} else {
    echo json_encode(['error' => true, 'message' => "Error al ejecutar la consulta: " . $stmt->error]);
}
// Cerrar la sentencia
$stmt->close();
?>
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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  bv<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
