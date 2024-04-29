<?php
session_start();
error_reporting(1);
include("conex.php");
$link = conectarse();

$des_mes[1] = "ENERO";
$des_mes[2] = "FEBRERO";
$des_mes[3] = "MARZO";
$des_mes[4] = "ABRIL";
$des_mes[5] = "MAYO";
$des_mes[6] = "JUNIO";
$des_mes[7] = "JULIO";
$des_mes[8] = "AGOSTO";
$des_mes[9] = "SEPTIEMBRE";
$des_mes[10] = "OCTUBRE";
$des_mes[11] = "NOVIEMBRE";
$des_mes[12] = "DICIEMBRE"; 
?>
<style>
	#tablaFeriados thead th:nth-child(1) {
  width: 10%;
}

#tablaFeriados thead th:nth-child(2) {
  width: 15%;
}

#tablaFeriados thead th:nth-child(3) {
  width: 15%;
}

#tablaFeriados thead th:nth-child(5) {
  width: 8%;
}

</style>
<h5 class="card-title">Feriados</h5>
<!-- Table with stripped rows -->
<div class="table-responsive">
  <table class="table table-bordered border-primary" id="tablaFeriados">
    <thead>
      <tr>
        <th scope="col" style="width: 10%">AÑO</th>
        <th scope="col" style="width: 15%">Mes</th>
        <th scope="col" style="width: 15%">Fecha</th>
        <th scope="col">Nombre</th>
        <th scope="col" style="width: 8%"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $consulta = "SELECT * FROM gd_feriados ORDER BY fer_fecha DESC";
      $res = mysqli_query($link, $consulta);
      while ($arr = mysqli_fetch_array($res)) {
        $v_fer_id = $arr['fer_id'];
        $v_fer_fecha = $arr['fer_fecha'];
        $v_fer_nombre = $arr['fer_nombre'];
        $fecha_ano = date('Y', strtotime($v_fer_fecha));
        $fecha_mes = intval(date('m', strtotime($v_fer_fecha)));
      ?>
        <tr>
          <td><?php echo $fecha_ano ?></td>
          <td><?php echo $des_mes[$fecha_mes] ?></td>
          <td><?php echo $v_fer_fecha ?></td>
          <td><?php echo $v_fer_nombre ?></td>
          <td>
            <button class="btn btn-danger" data-idregistro="<?php echo $v_fer_id ?>" id="btnEliminar1"><i class="bi bi-trash"></i></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
