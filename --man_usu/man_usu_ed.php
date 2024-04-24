<?php
session_start();
include_once "conex.php"; 
		   $link=conectarse();
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
</head>
<body>
  <?php
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
		   //$id_usu=$_GET['id_usu'];
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
<?

		   $consulta="select * from gd_usuges where usu_id = '$a1'";

		   $res=mysqli_query($link,$consulta);

		   while ($arr=mysqli_fetch_array($res)){

			    

				$v_usu_id		= $arr['usu_id'];

				$v_usu_login	= $arr['usu_login'];

				$v_usu_nombre	= $arr['usu_nombre'];

				$v_usu_ape_p	= $arr['usu_ape_p'];

				$v_usu_ape_m	= $arr['usu_ape_m'];

				$v_usu_cargo	= $arr['usu_cargo'];

				$v_usu_mail		= $arr['usu_mail'];

				$v_usu_unidad	= $arr['usu_unidad'];

				$v_usu_tpu_id	= $arr['usu_tpu_id'];

				$v_usu_div_id	= $arr['usu_div_id'];

				$v_usu_estado	= $arr['usu_estado'];

				$v_usu_nivel	= $arr['usu_nivel'];

				$v_usu_obs		= $arr['usu_obs'];

				$v_usu_pass		= $arr['usu_pass'];		  
		   }
?>
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Mantención de Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="menu.php">Home</a></li>
          <li class="breadcrumb-item">Configuración</li>
          <li class="breadcrumb-item active">Editar Usuarios</li>
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
              <form name="f1" id="demo-form2"   method="POST" action="man_usu_p.php" enctype="multipart/form-data">             
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Login</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="f_login" value="<?php echo $v_usu_login ?>"  disabled>
                  </div>
                </div>
<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_nombre"   oninput="validarMayusculas(this)" value="<?php echo $v_usu_nombre ?>"  required>

                  </div>

                </div>
<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Apellido Pat.</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_ape_p"   oninput="validarMayusculas(this)" value="<?php echo $v_usu_ape_p ?>"  required>

                  </div>

                </div>
<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Apellito Mat.</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_ape_m"   oninput="validarMayusculas(this)" value="<?php echo $v_usu_ape_m ?>"  required>

                  </div>

                </div>
<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Mail</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_mail"  value="<?php echo $v_usu_mail ?>"    required>

                  </div>

                </div>
<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Cargo</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_cargo"   oninput="validarMayusculas(this)" value="<?php echo $v_usu_cargo ?>"  required>

                  </div>

                </div>
<div class="row mb-3">

                  <label for="inputText" class="col-sm-2 col-form-label">Unidad</label>

                  <div class="col-sm-10">

                    <input type="text" class="form-control" name="f_unidad"   oninput="validarMayusculas(this)" value="<?php echo $v_usu_unidad ?>"  required>

                  </div>

                </div>
<div class="row mb-3">

                  <label for="inputNumber" class="col-sm-2 col-form-label">imagen</label>

                  <div class="col-sm-10">

                    <input class="form-control" type="file" id="formFile" name="f_imagen">

                  </div>

                </div>
<div class="row mb-3">

					<label for="inputNumber" class="col-sm-2 col-form-label">imagen</label>

					<div class="col-sm-10">

						<?php

						$nombreImagen = $v_usu_id . ".jpg"; // Nombre de la imagen del usuario

						$rutaImagen = "xfiles/userprofile/" . $nombreImagen;

						$rutaImagenConTimestamp = $rutaImagen . "?t=" . time(); // Agregar timestamp						

						// Verificar si la imagen del usuario existe

						if (file_exists($rutaImagen)) {

							// Si la imagen existe, mostrarla

							?>

							<img src="<?php echo $rutaImagenConTimestamp; ?>" width="100">

							<?php

						} else {

							// Si la imagen no existe, mostrar la imagen "sinfoto.jpg"

							?>
							<img src="xfiles/userprofile/sinfoto.jpg" width="100">
							<?php
						}
						?>

					</div>

				</div>
<div class="row mb-3">

                  <label class="col-sm-2 col-form-label">División</label>

                  <div class="col-sm-10">

                    <select class="form-select monospace-font" aria-label="Default select example" name="f_division">

                      <option selected>Seleccione...</option>

					  <?php 

						$con2="select * from gd_divisiones order by div_div1, div_div2, div_div3, div_div4, div_div5 ";

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
                           <option value="<?php echo $v_div_id ?>" <?php if ($v_usu_div_id==$v_div_id) echo "selected"; ?>><?php echo $v_division,$espacios," ",$v_div_nombre ?></option>

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

						$con2="select * from gd_tipousu";

						$res=mysqli_query($link,$con2);
						while ($arr=mysqli_fetch_array($res)){
								$v_tpu_id		= $arr['tpu_id'];

								$v_tpu_nombre	= $arr['tpu_nombre'];

					  ?>

                      <option value="<?php echo $v_tpu_id ?>" <?php if ($v_usu_tpu_id==$v_tpu_id) echo "selected"; ?>><?php echo $v_tpu_nombre ?></option>
						<?php } ?>
 </select>

                  </div>

                </div>
<div class="row mb-3">

                  <label class="col-sm-2 col-form-label">Nivel Jerárquico</label>

                  <div class="col-sm-10">

                    <select class="form-select" aria-label="Default select example" name="f_nivel">

                      <option selected>Seleccione...</option>

                      <option value="1" <?php if ($v_usu_nivel==1) echo "selected"; ?>>Uno</option>

                      <option value="2" <?php if ($v_usu_nivel==2) echo "selected"; ?>>Dos</option>

                      <option value="3" <?php if ($v_usu_nivel==3) echo "selected"; ?>>Tres</option>

                    </select>

                  </div>

                </div>
				<div class="row mb-3">

                  <label for="inputPassword" class="col-sm-2 col-form-label">Observaciones</label>

                  <div class="col-sm-10">

                    <textarea class="form-control" style="height: 100px" name="f_obs"><?php echo $v_usu_obs ?></textarea>

                  </div>

                </div>
<div class="row mb-3">

                  <label class="col-sm-2 col-form-label"> </label>

                  <div class="col-sm-10">

                    <input type="hidden" name="f_op" value="e">

					<input type="hidden" name="id_usu" value="<?php echo $id_usu ?>">

					<input type="submit" class="btn btn-primary" value="Grabar">

					

				 </div>

                </div>



              </form>

			  

			    <form name="f1" id="demo-form2"   method="POST" action="man_usu_p.php" enctype="multipart/form-data">

					<div class="row mb-3">

						  <label class="col-sm-2 col-form-label"> </label>

						  <div class="col-sm-10">

								<input type="hidden" name="f_op" value="rp">

								<input type="hidden" name="id_usu" value="<?php echo $id_usu ?>">

								<input type="submit" class="btn btn-success" value="Reiniciar Password"> Al ejecutar esta acción la contraseña se reincia a la por defecto.

							

						  </div>

                    </div>

				

				</form>

				

				<?php if ($v_usu_estado == "IN"){ ?>

				 <form name="f1" id="demo-form2"   method="POST" action="man_usu_p.php" enctype="multipart/form-data">

					<div class="row mb-3">

						  <label class="col-sm-2 col-form-label"> </label>

						  <div class="col-sm-10">

								<input type="hidden" name="f_op" value="au">

								<input type="hidden" name="id_usu" value="<?php echo $id_usu ?>">

								<input type="submit" class="btn btn-success" value="Activar Usuario"> Al ejecutar esta acción se activará la cuenta del usuario.

							

						  </div>

                    </div>

				

				</form>

				

				<?php } ?>

				

				<?php if ($v_usu_estado == "VI"){ ?>

				 <form name="f1" id="demo-form2"   method="POST" action="man_usu_p.php" enctype="multipart/form-data">

					<div class="row mb-3">

						  <label class="col-sm-2 col-form-label"> </label>

						  <div class="col-sm-10">

								<input type="hidden" name="f_op" value="du">

								<input type="hidden" name="id_usu" value="<?php echo $id_usu ?>">

								<input type="submit" class="btn btn-danger" value="Desactivar Usuario"> Al ejecutar esta acción se DESACTIVARÁ la cuenta del usuario.

							

						  </div>

                    </div>

				

				</form>

				

				<?php } ?>

				

				

				

				

				

				

				

				

				

			  <!-- End General Form Elements -->



            </div>

          </div>



        </div>

		

		

		

		

		

		

		

		

		

		

		

		

 

      </div>

    </section>

	

	

	

	

	 <a id="permisos"></a>

	 <section class="section">

      <div class="row">

        <div class="col-lg-6">



          <div class="card">

            <div class="card-body">

              <h5 class="card-title">Permisos</h5>



              <!-- Default Table -->

              <table class="table">

                <thead>

                  <tr>

                    <th scope="col">#</th>

                    <th scope="col">Menú</th>

                    <th scope="col">Programa</th>

                    <th scope="col">Acción</th>

                   

                  </tr>

                </thead>

                <tbody>

				   

				    <?php

					   $consulta="select * from gd_opciones,gd_menus where 

									  opc_men_id = men_id and

									  opc_id  in (select per_opc_id from gd_permisos where per_usu_id = '$id_usu')

									  order by men_orden,opc_orden";

									  

					   

					   $menu_ant = " ";

					   $res=mysqli_query($link,$consulta);

					   while ($arr=mysqli_fetch_array($res)){

							$v_opc_id			= $arr['opc_id'];

							$v_opc_nombre		= $arr['opc_nombre'];

							$v_opc_programa		= $arr['opc_programa'];	

							$v_opc_men_id		= $arr['opc_men_id'];

							$v_opc_orden		= $arr['opc_orden'];

							$v_men_nombre       = $arr['men_nombre'];

							

							if 	($menu_ant != $v_men_nombre){

								$menu_ant = $v_men_nombre;

								$menu_txt = $v_men_nombre." >";

							}else{

								$menu_txt = " ";

							}

					   

					?>

				   

				   

				   

                  <tr>

                    <th scope="row"><?php echo $v_opc_id ?></th>

                    <td><?php echo $menu_txt ?></td>

                    <td><?php echo $v_opc_nombre ?></td>

                    <td><a href="man_usu_per_p.php?id_usu=<?php echo $id_usu ?>&id_opc=<?php echo $v_opc_id ?>&op=b" class="btn btn-danger">Quitar</a></td>

                    

                  </tr>

				  

					   <?php } ?>

				  

				  

                  

                </tbody>

              </table>

              <!-- End Default Table Example -->

            </div>

          </div>



          

		  

		  

		   

           



        </div>

		

		

		



        <div class="col-lg-6">



          <div class="card">

            <div class="card-body">

              <h5 class="card-title">Opciones</h5>



              <!-- Table with stripped rows -->

              <table class="table">

                <thead>

                  <tr>

                    <th scope="col">#</th>

                    <th scope="col">Menú</th>

                    <th scope="col">Programa</th>

                    <th scope="col">Acción</th>

                   

                  </tr>

                </thead>

                <tbody>

				

				   

				   <?php

						   $consulta="select * from gd_opciones,gd_menus where 

						                  opc_men_id = men_id and

						                  opc_id not in (select per_opc_id from gd_permisos where per_usu_id = '$id_usu')

										  order by men_orden,opc_orden";

										   

						    

						   $res=mysqli_query($link,$consulta);

						   while ($arr=mysqli_fetch_array($res)){

								$v_opc_id			= $arr['opc_id'];

								$v_opc_nombre		= $arr['opc_nombre'];

								$v_opc_programa		= $arr['opc_programa'];	

								$v_opc_men_id		= $arr['opc_men_id'];

								$v_opc_orden		= $arr['opc_orden'];

								$v_men_nombre       = $arr['opc_nombre'];				

						   

					?>

				   

				   

                  <tr>

                     <th scope="row"><?php echo $v_opc_id ?></th>

				     <td><?php echo $v_men_nombre ?></td>

				     <td><?php echo $v_opc_nombre ?></td>

				     <td><a href="man_usu_per_p.php?id_usu=<?php echo $id_usu ?>&id_opc=<?php echo $v_opc_id ?>&op=a" class="btn btn-primary">Agregar</a></td>

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



  <!-- Template Main JS File -->

  <script src="assets/js/main.js"></script>



</body>



</html>