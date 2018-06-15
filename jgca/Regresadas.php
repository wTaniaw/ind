<div class="topcoat-navigation-bar">
            <div class="topcoat-navigation-bar__item center full">
                <h1 class="topcoat-navigation-bar__title">
                <button class="topcoat-icon-button" onclick="javascript:history.back(1)">
                    <span class='icomatic' style='color:white';font-size:20px >arrowleft</span>
                </button>
                  &nbsp;Vendidas &nbsp;
                <button class="topcoat-icon-button">
                  <span class='icomatic' style='color:white';font-size:20px > plus</span>
                </button>
                </h1>
            </div>
        </div>
<?php
require_once("funciones.php");
$rs=ConsultarLista("Select id,Tipo,Precio from Elementos where Estatus='Adquirida'");
?>
<div class="topcoat-list">
  <h3 class="topcoat-list__header">Joyas</h3>
  <ul class="topcoat-list__container">
  <?php
while($resultado=mysql_fetch_array($rs))
{
  $id=$resultado["id"];
  $tipo=$resultado["Tipo"];
  $precio=$resultado["Precio"];
  ?>
  <li class="topcoat-list__item">
    <span style="color:white">Clave <?php echo $id;?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="font-size:20px"><?php echo $tipo;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <span style="color:#F7819F;font-size:17px"><?php echo '$'.$precio;?></span>
    <div class="topcoat-button-bar">
    <div class="topcoat-button-bar__item">
    <button class="topcoat-button-bar__button"><span class='icomatic' style='color:white';font-size:20px >cart</span></button>
    </div>
  <div class="topcoat-button-bar__item">
    <button class="topcoat-button-bar__button"><span class='icomatic' style='color:white';font-size:20px >back</span></button>
  </div>
  <div class="topcoat-button-bar__item">
    <button class="topcoat-button-bar__button"><span class='icomatic' style='color:white';font-size:20px >calendar</span></button>
  </div>
</div>
    </li>
  <?php }?>
    </ul>
</div>