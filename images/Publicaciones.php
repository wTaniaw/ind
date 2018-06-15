
        
     
<script>
$(document).ready(function(){
  $("input[name='file']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "GuardarBanner.php";
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                  if(datos=="tamaño")
                  {
                    MensajeE("El tamaño máximo de la fotografía es de 2MB");
                  }
                  else
                  {
                    MensajeB("La fotografía se guardó correctamente");
                    $("#respuesta").html("");
                    $("#respuesta").html(datos);
                    window.location="Escolares.php?pagina=publicaciones";
                  }

                }
            });
        });
  TablaDinamicaDefault("#tablapublicaciones");
});
function GuardarPublicacion()
{
  var titulo=$("#titulo").val();
  var texto=$("#texto").val();
  var textoboton=$("#textoboton").val();
  var colorboton=$('input:radio[name=colorboton]:checked').val()
  var imagen=$('input:radio[name=imagen]:checked').val()
  var colorfondo=$('input:radio[name=colorfondo]:checked').val()
  var link=$("#link").val();
  VerificarInput("#titulo");
  VerificarInput("#texto");
  if(
  VerificarInput("#titulo")&&
  VerificarInput("#texto")
)
{
  Cargando();
  $.post("Guardar.php?metodo=GuardarPublicacion&titulo="+titulo+"&texto="+texto+"&textoboton="+textoboton+"&link="+link+"&colorboton="+colorboton+"&imagen="+imagen+"&colorfondo="+colorfondo,function(data){
    ValidarGuardado(data,"La publicación se guardó correctamente","Ocurrió un error al guardar la publicación");
    Abrir("Publicaciones.php");
    CerrarLoader();
    });
}
else {
  MensajeE("Verifica los campos remarcados en rojo");
}
}
function CerrarPublicacion(id)
{
  Cargando();
  $.post("Guardar.php?metodo=CerrarPublicacion&publicacion_id="+id,function(data){
    ValidarGuardado(data,"La publicación se cerró correctamente", "Ocurrió un error al cerrar la publicación");
    CerrarLoader();
    $("#botoncerrar").fadeOut();
  });
}
function ActivarPublicacion(id)
{
  Cargando();
  $.post("Guardar.php?metodo=ActivarPublicacion&publicacion_id="+id,function(data){
    ValidarGuardado(data,"La publicación se activo correctamente", "Ocurrió un error al activar la publicación");
    CerrarLoader();
    $("#botonactivar").fadeOut();
  });
}
function AbrirPublicacion(id)
{
  Ventana("EditarPublicacion.php?publicacion_id="+id);
}

</script>
<center>
<h1>Publicaciones</h1>
<div class="tabcontrol bordered border sombra" data-role="tabcontrol">
    <ul class="tabs">
        <li><a href="#Nuevo">Capturar nueva</a></li>
        <li><a href="#Busqueda">Búsqueda</a></li>
        <li><a href="#Banner">Banner</a></li>
    </ul>
    <div class="frames" style="background-color:white;">
      <div class="frame" id="Nuevo" style="background-color:white;padding:20px">
            <table class="cell-hovered stiped table bordered border">
                <tbody>
                    <tr>
                        <td>
                          <b>Título</b><br>
                          <div class="input-control text"><input type="text" id="titulo" required="required"></div>
                        </td>
                        <td>
                          <b>Texto</b><br>
                          <div class="input-control text"><input type="text" id="texto"></div>
                        </td>
                        <td>
                          <b>Texto botón</b><br>
                          <div class="input-control text"><input type="text" id="textoboton"></div>
                        </td>
                      </tr>
                        <tr>
                        <td colspan="3">
                          <b>Color botón</b><br>
                          <label class="input-control radio small-check">
                              <input type="radio" value="success" name="colorboton">
                              <span class="check"></span>
                              <span class="caption"></span>
                          </label>
                          <input type="button" class="button success" value="Ejemplo">&nbsp;&nbsp;&nbsp;&nbsp;

                          <label class="input-control radio small-check">
                              <input type="radio" value="primary" name="colorboton">
                              <span class="check"></span>
                              <span class="caption"></span>
                          </label>
                          <input type="button" class="button primary" value="Ejemplo">&nbsp;&nbsp;&nbsp;&nbsp;

                          <label class="input-control radio small-check">
                              <input type="radio" value="warning" value="warning" name="colorboton">
                              <span class="check"></span>
                              <span class="caption"></span>
                          </label>
                          <input type="button" class="button warning" value="Ejemplo">&nbsp;&nbsp;&nbsp;&nbsp;

                          <label class="input-control radio small-check">
                              <input type="radio" value="sinboton" name="colorboton" checked="checked">
                              <span class="check"></span>
                              <span class="caption">Sin botón</span>
                          </label>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Link</b><br>
                          <div class="input-control text"><input type="text" id="link" required="required"></div>
                        </td>
                        <td colspan="2">
                          <b>Fondo</b><br>
                          <div style="margin:20px">
                            <label class="input-control radio small-check">
                                <input type="radio" checked="checked" value="bg-darkEmerald" name="colorfondo">
                                <span class="check"></span>
                                <span class="caption"></span>
                            </label>
                            <span class="bg-darkEmerald fg-white padding10 text-shadow" style="width:100px">Verde</span>&nbsp;&nbsp;&nbsp;&nbsp;

                            <label class="input-control radio small-check">
                                <input type="radio" value="bg-darkMagenta" name="colorfondo">
                                <span class="check"></span>
                                <span class="caption"></span>
                            </label>
                            <span class="bg-darkMagenta fg-white padding10 text-shadow" style="width:100px">Guinda</span>&nbsp;&nbsp;&nbsp;&nbsp;

                            <label class="input-control radio small-check">
                                <input type="radio" value="bg-darkBlue" name="colorfondo">
                                <span class="check"></span>
                                <span class="caption"></span>
                            </label>
                            <span class="bg-darkBlue fg-white padding10 text-shadow" style="width:100px">Azul</span>&nbsp;&nbsp;&nbsp;&nbsp;

                            <label class="input-control radio small-check">
                                <input type="radio" value="bg-darkCrimson" name="colorfondo">
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
                            <input type="radio" value="img/Administrador.png" name="imagen" checked="checked">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Administrator.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Application.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Application.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Books.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Books.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Caution.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Caution.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Contact.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Contact.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Dictionary.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Dictionary.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Folder.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Folder.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="input-control radio small-check">
                            <input type="radio" value="img/Clock.png" name="imagen">
                            <span class="check"></span>
                            <span class="caption"></span>
                        </label>
                        <img src="img/Clock.png" width="90px">&nbsp;&nbsp;&nbsp;&nbsp;

                      </td>
                    </tr>
                <tr>
                  <th colspan="3"><br><input type="button" class="button success" value="Guardar" onclick="GuardarPublicacion()"></th>
                </tr>
                </tbody>
            </table>
      </div>

      <div class="frame" id="Busqueda" style="background-color:white;padding:20px">
        <table class="hovered cell-hovered bordere sombra table" id="tablapublicaciones">
          <thead>
            <tr>
              <th>Título</th>
              <th>Texto</th>
              <th>Abrir</th>
              <th>Cerrar/Activar</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listapublicaciones=ConsultarLista("select * from Publicaciones");
        while($publicacion=mysql_fetch_array($listapublicaciones))
        {
          $publicacion_id=$publicacion["id"];
          $activa=$publicacion["Activo"];
          echo "<tr>";
          echo "<td>".$publicacion["Titulo"]."</td>";
          echo "<td>".$publicacion["Texto"]."</td>";
          echo "<td><input type='button' class='button primary' value='Abrir información' onclick='AbrirPublicacion(".$publicacion_id.")'></td>";
          if($activa==1)
          {
          echo "<td><input type='button' id='botoncerrar' class='button danger' value='Cerrar publicación' onclick='CerrarPublicacion(".$publicacion_id.")'></td>";
        }
          else{
            echo "<td><input id='botonactivar' type='button' class='button success' value='Activar publicación' onclick='ActivarPublicacion(".$publicacion_id.")'></td>";
          }
          echo "</tr>";
        }
        ?>
        </table>
        <br><br>
            </div>
            <div class="frame" id="Banner" style="background-color:white;padding:20px">
              <table class="table hovered bordered cell-hovered sombra">
                <thead>
                  <tr>
                    <th>Selecciona la imagen</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <form method="post" id="formulario" enctype="multipart/form-data">
                        <div class="input-control file" data-role="input">
                        <input type="file" name="file">
                        <button class="button"><span class="mif-folder"></span></button>
                        </div>                        
                      </form>
                    </td>
                    
                  </tr>
                </tbody>
              </table>
        <table class="hovered cell-hovered bordered sombra table" id="tablapublicaciones">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Acción</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listapublicaciones=ConsultarLista("select * from Publicaciones");
        while($publicacion=mysql_fetch_array($listapublicaciones))
        {
          $publicacion_id=$publicacion["id"];
          $activa=$publicacion["Activo"];
          echo "<tr>";
          echo "<td>".$publicacion["Titulo"]."</td>";
          echo "<td>".$publicacion["Texto"]."</td>";
          echo "<td><input type='button' class='button primary' value='Abrir información' onclick='AbrirPublicacion(".$publicacion_id.")'></td>";
          if($activa==1)
          {
          echo "<td><input type='button' id='botoncerrar' class='button danger' value='Cerrar publicación' onclick='CerrarPublicacion(".$publicacion_id.")'></td>";
        }
          else{
            echo "<td><input id='botonactivar' type='button' class='button success' value='Activar publicación' onclick='ActivarPublicacion(".$publicacion_id.")'></td>";
          }
          echo "</tr>";
        }
        ?>
        </table>
        <br><br>
            </div>
    </div>
</div>
</center>
