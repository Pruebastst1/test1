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
              <form name="f1" id="formUsuario"   method="POST" action="#" enctype="multipart/form-data">
  			    <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Login</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="f_login" id="f_login"  required>
                  </div>
                </div>          
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="f_nombre" id="f_nombre"   oninput="validarMayusculas(this)" required>
                  </div>
                </div>
				<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Apellido Pat.</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_ape_p"  id="f_ape_p"   oninput="validarMayusculas(this)" required>

                  </div>

                </div>
				<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Apellito Mat.</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_ape_m"   oninput="validarMayusculas(this)" >

                  </div>

                </div>

				

				<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Mail</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_mail"     >

                  </div>

                </div>

				

				<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Cargo</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_cargo"   oninput="validarMayusculas(this)" >

                  </div>

                </div>

				

				<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Unidad</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_unidad"   oninput="validarMayusculas(this)" >

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

						$con2="select * from divisiones order by div_div1, div_div2, div_div3, div_div4, div_div5 ";

						$res=mysqli_query($link,$con2);

						while ($arr=mysqli_fetch_array($res)){

								$v_div_id		= $arr['div_id'];	

								$v_div_div1		= $arr['div_div1'];

								$v_div_div2		= $arr['div_div2'];

								$v_div_div3		= $arr['div_div3'];

								$v_div_div4		= $arr['div_div4'];

								$v_div_div5		= $arr['div_div5'];

								$v_div_nombre 	= $arr['div_nombre'];

								

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

								

								// Calcular la cantidad de espacios necesarios para alinear los nombres

								$longitud_codigo = strlen($division);

								$cantidad_espacios = 20 - $longitud_codigo;



								// Generar espacios para alinear los nombres

								$espacios = str_repeat("&nbsp;", $cantidad_espacios);



								 

					   ?>

							

                           <option value="<?php echo $v_div_id ?>"><?php echo $v_division,$espacios," ",$v_div_nombre ?></option>

					  <?php } ?>

                      

                    </select>

                  </div>

                </div>

				

				 

				

				<div class="row mb-3">

                  <label class="col-sm-2 col-form-label">Tipo Usuario</label>

                  <div class="col-sm-10">

                    <select class="form-select" aria-label="Default select example" name="f_tipo">

                      <option selected>Seleccione...</option>

					  <?php 

						$con2="select * from tipousu";

						$res=mysqli_query($link,$con2);

						

						while ($arr=mysqli_fetch_array($res)){

							

								$v_tpu_id		= $arr['tpu_id'];

								$v_tpu_nombre	= $arr['tpu_nombre'];

								   

					  ?>

                      <option value="<?php echo $v_tpu_id ?>"><?php echo $v_tpu_nombre ?></option>

						<?php } ?>

                       

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
           <button type="submit" class="btn btn-success">Grabar 2</button>

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

  <?php include ("lib_footer.php"); ?>

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
        $('#formUsuario').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this); // Utiliza FormData para recoger el archivo y otros datos

            $.ajax({
                type: "POST",
                url: "man_usu_p2.php",
                data: formData,
                processData: false, // Importante para el manejo de FormData
                contentType: false, // Importante para el manejo de FormData
                dataType: "json", // Esperando respuesta en formato JSON
                success: function(response) {
                    if(response.error) {
                        alert("Error: " + response.message); // Mostrar mensaje de error
                    } else {
                        alert("Éxito: " + response.message); // Mostrar mensaje de éxito
                    }
                },
                error: function() {
                    alert("Hubo un error al enviar los datos al servidor");
                }
            });
        });
    });
</script>


</body>



</html>