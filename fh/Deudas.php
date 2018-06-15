
<?php include("Header.php"); ?>
<div class="card">
      <ul class="table-view">
      	<?php
require_once("Funciones.php");
$rs=ConsultarLista("Select * from Deudas where Activo=1 and Pagada=0");

while($registro=mysql_fetch_array($rs))
{
  $descripcion=$registro["Descripcion"];
  $cantidad=$registro["Cantidad"];
  $id=$registro["id"];
  $deuda_id=$registro["id"];
?>
  <li class="table-view-cell media">
    <a class="navigate-right" href="Deuda.php?deuda_id=<?php echo $id; ?>" data-transition="slide-out" >
      <span class="media-object pull-left icon icon-check"></span>
      <div class="media-body">
      	<?php 
		$cantabonada=ConsultarValor("Select ifnull(sum(Cantidad),0) as valor from Entradas where Activo=1 and Deuda_id=".$deuda_id);
      	?>
        <?php echo $descripcion; ?>
        <p>
        	$<?php echo $cantabonada; ?> / $<?php echo $cantidad; ?>
        </p>
      </div>
    </a>
  </li>  
  <?php } ?>
</ul>
</div>
   <?php include("Footer.php"); ?>