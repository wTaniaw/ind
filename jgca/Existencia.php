<div class="topcoat-navigation-bar">
            <div class="topcoat-navigation-bar__item center full">
                <h2 class="topcoat-navigation-bar__title">
                <button class="topcoat-icon-button" onclick="AgregarJoya()">
                  <span class='icomatic' style='color:white';font-size:20px > plus</span>
                </button>
                <button class="topcoat-icon-button" onclick="Vendidas()">
                  <span class='icomatic' style='color:white';font-size:20px > cart</span>
                </button>
                <button class="topcoat-icon-button" onclick="Pagadas()">
                  <span class='icomatic' style='color:white';font-size:20px > checkmark</span>
                </button>
                </h2>
            </div>
        </div>
<?php
require_once("funciones.php");
$rs=ConsultarLista("Select id,Tipo,Precio from Elementos where Estatus='Adquirida' order by Tipo");
?>
<div class="topcoat-list">
  <h3 class="topcoat-list__header">Existencias</h3>
  <ul class="topcoat-list__container">
  <?php
while($resultado=mysql_fetch_array($rs))
{
  $id=$resultado["id"];
  $tipo=$resultado["Tipo"];
  $precio=$resultado["Precio"];
  if($tipo=="Anillo")
  {
  echo '<li class="topcoat-list__item" style="background-color:#E9EAFF" id="elemento-'.$id.'">';  
  }
  else if($tipo=="Cadena")
  {
  echo '<li class="topcoat-list__item" style="background-color:#FFEDFF" id="elemento-'.$id.'">';  
  }
  else if($tipo=="Pulsera")
  {
  echo '<li class="topcoat-list__item" style="background-color:#E4FFF0" id="elemento-'.$id.'">';  
  }
  else if($tipo=="Aretes")
  {
  echo '<li class="topcoat-list__item" style="background-color:#FFF9ED" id="elemento-'.$id.'">';  
  }
  else if($tipo=="Esclava")
  {
  echo '<li class="topcoat-list__item" style="background-color:white" id="elemento-'.$id.'">';
  }
  ?>
    <span style="color:#132616">Clave <?php echo $id;?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:#132616;color:#06203C"><b><?php echo $tipo;?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:#132616"><?php echo '$'.$precio;?></span>
    <hr>


    <div class="topcoat-button-bar">
    <div class="topcoat-button-bar__item">
    <button class="topcoat-button-bar__button" onclick="Vender(<?php echo $id;?>)"><span class='icomatic' style='color:white';font-size:20px >cart</span></button>
    </div>
  <div class="topcoat-button-bar__item">
    <button class="topcoat-button-bar__button" onclick="Regresar(<?php echo $id;?>)"><span class='icomatic' style='color:white';font-size:20px >arrowleft</span></button>
  </div>
  <div class="topcoat-button-bar__item">
    <button class="topcoat-button-bar__button" onclick="Historial(<?php echo $id;?>)"><span class='icomatic' style='color:white';font-size:20px >calendar</span></button>
  </div>
</div>


    </li>
  <?php }?>
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