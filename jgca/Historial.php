<?php
require_once("funciones.php");
$id=$_REQUEST['id'];
$rs=ConsultarRegistro("Select * from Elementos where id=$id");

  $id=$rs["id"];
  $tipo=$rs["Tipo"];
  $precio=$rs["Precio"];

?>

<div class="topcoat-navigation-bar">
            <div class="topcoat-navigation-bar__item center full">
                <h2 class="topcoat-navigation-bar__title">
                  <span style="color:white">Clave <?php echo $id;?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span style="color:white;color:white"><?php echo $tipo;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <span style="color:white"><?php echo '$'.$precio;?></span>
                <button class="topcoat-icon-button" onclick="AgregarJoya()">
                  &nbsp;&nbsp;$&nbsp;&nbsp;
                </button>
                </h2>
            </div>
        </div>

  <div class="topcoat-list">
  <h3 class="topcoat-list__header">Movimientos</h3>
  <ul class="topcoat-list__container">  
    <li class="topcoat-list__item" style="background-color:white" id="elemento-<?php echo $id; ?>">
<span style="color:black">Fecha Adquisición: <?php echo $rs['FechaAdquisicion']?>    </span>
    <hr>
    
    </li>
    <li class="topcoat-list__item" style="background-color:white" id="elemento-<?php echo $id; ?>">
<span style="color:black">Fecha Venta: <?php echo $rs['FechaVenta']?>    </span>
    <hr>
    </li>
    <li class="topcoat-list__item" style="background-color:white" id="elemento-<?php echo $id; ?>">
<span style="color:black">Fecha Pagada: <?php echo $rs['FechaPagada']?>    </span>
    <hr>
    
    </li>
    <li class="topcoat-list__item" style="background-color:white" id="elemento-<?php echo $id; ?>">
<span style="color:black">Fecha Dinero entregado: <?php echo $rs['FechaDineroEntregado']?>    </span>
    <hr>
    
    </li>
    <li class="topcoat-list__item" style="background-color:white" id="elemento-<?php echo $id; ?>">
<span style="color:black">Fecha Devolución: <?php echo $rs['FechaDevolucion']?>    </span>
    <hr>
    
    </li>
    </ul>
</div>
<script>
function Vender(id)
{
  $("#elemento-"+id).html("<span style='color:black'>Vendiendo joya</span>");
  $.post("GuardarVendida.php?id="+id,function(data){
  if(data=="bien")
  {
    alert("La joya se vendió correctamente");
    Existencia();
  }
  else
  {
    alert("Ocurrió un error al vender la joya");
  }
})  
}
function Regresar(id)
{
  $("#elemento-"+id).html("<span style='color:black'>Regresando joya</span>");
$.post("GuardarRegresar.php?id="+id,function(data){
  if(data=="bien")
  {
    alert("La joya se regresó correctamente");
    Existencia();
  }
  else
  {
    alert("Ocurrió un error al regresar la joya");
  }
})  
}

</script>