<?php
require_once("funciones.php");
$publicacion_id=$_REQUEST["publicacion_id"];
$publicacion=ConsultarRegistro("Select * from Publicaciones where id=$publicacion_id");
?>
<script>
$(document).ready(function(){
});
function EditarPublicacion()
{
    var titulo2=$("#titulo2").val();
    var texto2=$("#texto2").val();
    var textoboton2=$("#textoboton2").val();
    var colorboton2=$('input:radio[name=colorboton2]:checked').val()
    var imagen2=$('input:radio[name=imagen2]:checked').val()
    var colorfondo2=$('input:radio[name=colorfondo2]:checked').val()
    var link2=$("#link2").val();
    VerificarInput("#titulo2");
    VerificarInput("#texto2");
    if(
    VerificarInput("#titulo2")&&
    VerificarInput("#texto2")
  )
  {
    Cargando();
    $.post("Guardar.php?metodo=EditarPublicacion&titulo="+titulo2+"&texto="+texto2+"&textoboton="+textoboton2+"&link="+link2+"&colorboton="+colorboton2+"&imagen="+imagen2+"&colorfondo="+colorfondo2+"&publicacion_id=<?php echo $publicacion_id; ?>",function(data){
      ValidarGuardado(data,"La publicación se guardó correctamente","Ocurrió un error al guardar la publicación");
      if(data=="bien")
    {
      Abrir("Publicaciones.php");
      CerrarVentana();
    }
    });
  }
  else {
    MensajeE("Verifica los campos remarcados en rojo");
  }
}

</script>
<h1>Información de publicación</h1><br>
<?php

$colorboton=$publicacion["ColorBoton"];
$colorfondo=$publicacion["ColorFondo"];
$imagen=$publicacion["Imagen"];
?>
<table class="cell-hovered stiped table bordered border">
    <tbody>
        <tr>
            <td>
              <b>Título</b><br>
              <div class="input-control text"><input value="<?php echo $publicacion['Titulo']?>" type="text" id="titulo2" required="required"></div>
            </td>
            <td>
              <b>Texto</b><br>
              <div class="input-control text"><input type="text" id="texto2" value="<?php echo $publicacion['Texto']?>"></div>
            </td>
            <td>
              <b>Texto botón</b><br>
              <div class="input-control text"><input type="text" id="textoboton2" value="<?php echo $publicacion['TextoBoton']?>"></div>
            </td>
          </tr>
            <tr>
            <td colspan="3">
              <b>Color botón</b><br>
              <label class="input-control radio small-check">
                  <input type="radio" value="success" name="colorboton2" <?php if($colorboton=="success"){ echo "checked='checked'"; }?>>
                  <span class="check"></span>
                  <span class="caption"></span>
              </label>
              <input type="button" class="button success" value="Ejemplo">&nbsp;&nbsp;&nbsp;&nbsp;

              <label class="input-control radio small-check">
                  <input type="radio" value="primary" name="colorboton2" <?php if($colorboton=="primary"){ echo "checked='checked'"; }?>>
                  <span class="check"></span>
                  <span class="caption"></span>
              </label>
              <input type="button" class="button primary" value="Ejemplo">&nbsp;&nbsp;&nbsp;&nbsp;

              <label class="input-control radio small-check">
                  <input type="radio" value="warning" value="warning" name="colorboton2" <?php if($colorboton=="warning"){ echo "checked='checked'"; }?>>
                  <span class="check"></span>
                  <span class="caption"></span>
              </label>
              <input type="button" class="button warning" value="Ejemplo">&nbsp;&nbsp;&nbsp;&nbsp;

              <label class="input-control radio small-check">
                  <input type="radio" value="sinboton" name="colorboton2"  <?php if($colorboton=="sinboton"){ echo "checked='checked'"; }?>>
                  <span class="check"></span>
                  <span class="caption">Sin botón</span>
              </label>
            </td>
          </tr>
          <tr>
            <td>
              <b>Link</b><br>
              <div class="input-control text"><input type="text" id="link2" required="required" value="<?php echo $publicacion['Link']; ?>"></div>
            </td>
            <td colspan="2">
              <b>Fondo</b><br>
              <div style="margin:20px">
                <label class="input-control radio small-check">
                    <input type="radio"  value="bg-darkEmerald" name="colorfondo2" <?php if($colorfondo=="bg-darkEmerald"){ echo "checked='checked'"; }?>>
                    <span class="check"></span>
                    <span class="caption"></span>
                </label>
                <span class="bg-darkEmerald fg-white padding10 text-shadow" style="width:100px" >Verde</span>&nbsp;&nbsp;&nbsp;&nbsp;

                <label class="input-control radio small-check">
                    <input type="radio" value="bg-darkMagenta" name="colorfondo2" <?php if($colorfondo=="bg-darkMagenta"){ echo "checked='checked'"; }?>>
                    <span class="check"></span>
                    <span class="caption"></span>
                </label>
                <span class="bg-darkMagenta fg-white padding10 text-shadow" style="width:100px">Guinda</span>&nbsp;&nbsp;&nbsp;&nbsp;

                <label class="input-control radio small-check">
                    <input type="radio" value="bg-darkBlue" name="colorfondo2" <?php if($colorfondo=="bg-darkBlue"){ echo "checked='checked'"; }?>>
                    <span class="check"></span>
                    <span class="caption"></span>
                </label>
                <span class="bg-darkBlue fg-white padding10 text-shadow" style="width:100px">Azul</span>&nbsp;&nbsp;&nbsp;&nbsp;

                <label class="input-control radio small-check">
                    <input type="radio" value="bg-darkCrimson" name="colorfondo2" <?php if($colorfondo=="bg-darkCrimson"){ echo "checked='checked'"; }?>>
                    <span class="check"></span>
                    <span class="caption"></span>
                </label>
                <span class="bg-darkCrimson fg-white padding10 text-shadow" style="width:100px">Rojo</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            </td>
        </tr>
        <tr>
          <td colspan="3">
            <b>Imagen</b><br><br>
            <label class="input-control radio small-check">
                <input type="radio" value="img/Administrador.png" name="imagen2" checked="checked">
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Administrator.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Application.png" name="imagen2" <?php if($imagen=="img/Application.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Application.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Books.png" name="imagen2" <?php if($imagen=="img/Books.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Books.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Caution.png" name="imagen2" <?php if($imagen=="img/Caution.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Caution.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Contact.png" name="imagen2" <?php if($imagen=="img/Contact.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Contact.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Dictionary.png" name="imagen2" <?php if($imagen=="img/Dictionary.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Dictionary.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Folder.png" name="imagen2" <?php if($imagen=="img/Folder.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Folder.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

            <label class="input-control radio small-check">
                <input type="radio" value="img/Clock.png" name="imagen2" <?php if($imagen=="img/Clock.png"){ echo "checked='checked'"; }?>>
                <span class="check"></span>
                <span class="caption"></span>
            </label>
            <img src="img/Clock.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;

          </td>
        </tr>
    <tr>
      <th colspan="3"><br><input type="button" class="button success" value="Guardar" onclick="EditarPublicacion()"></th>
    </tr>
    </tbody>
</table>
