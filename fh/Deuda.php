 <?php include("Header.php"); ?>
 <div class="card">
<?php 
$deuda_id=$_REQUEST['deuda_id'];
require_once("Funciones.php");
$rs=ConsultarRegistro("Select * from Deudas where id=$deuda_id");
$descripcion=$rs["Descripcion"];
$cantidad=$rs["Cantidad"];
$fechalimite=$rs["FechaLimite"];
$fechapago=$rs["FechaPago"];
$pagada=$rs["Pagada"];
$recu=$rs["Recurrente"];

?>

 <div class="card">
        <ul class="table-view">
  <li class="table-view-cell media">
    <a class="">
      <span class="media-object pull-left icon icon-list"></span>
      <div class="media-body">
    	<b><?php echo $descripcion; ?></b>
      </div>
    </a>
  </li>
  <li class="table-view-cell media">
    <a class="">
      <span class="media-object pull-left icon icon-list"></span>
      <div class="media-body">
    	Cantidad: <?php echo $cantidad; ?>
      </div>
    </a>
  </li>
  <li class="table-view-cell media">
    <a class="">
      <span class="media-object pull-left icon icon-list"></span>
      <div class="media-body">
    	Fecha Límite: <?php echo Fecha($fechalimite); ?>
      </div>
    </a>
  </li>
  <li class="table-view-cell media">
    <a class="">
      <span class="media-object pull-left icon icon-list"></span>
      <div class="media-body">
    	Fecha Pago: <?php echo Fecha($fechapago); ?>
      </div>
    </a>
  </li>
  <li class="table-view-cell media">
    <a class="">
      <span class="media-object pull-left icon icon-list"></span>
      <div class="media-body">
    	Pagada: <?php echo Activo($pagada); ?>
      </div>
    </a>
  </li>
  <li class="table-view-cell media">
    <a class="">
      <span class="media-object pull-left icon icon-list"></span>
      <div class="media-body">
    	Recurrente: <?php echo Activo($recu); ?>
      </div>
    </a>
  </li>
</ul>
<br>
<?php 
if($pagada==0){
?>
<button class="btn btn-primary btn-block">Abonar</button>
<a href="PagarDeuda.php?deuda_id=<?php echo $deuda_id?>" class="btn btn-positive btn-block">Pagar</a>
<?php } ?>
</div>
<?php include("Footer.php"); ?>