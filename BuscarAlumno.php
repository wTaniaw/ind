<script>
$(document).ready(function(){
  $("#matricula").focus();
  ConvertirMayusculas("#nombre");
  ConvertirMayusculas("#apellidop");
  ConvertirMayusculas("#apellidom");
    $(".camposbusqueda").keypress(function(e) {
       if(e.which == 13) {
          BuscarAlumno();
       }
    });
});
function BuscarAlumno()
{
  var apellidom="";
  var apellidop="";
  var nombre="";
  var matricula="";
  matricula=$("#matricula").val();
  nombre=$("#nombre").val();
  apellidop=$("#apellidop").val();
  apellidom=$("#apellidom").val();
Cargando();
var liga="AlumnosEncontrados.php?matricula="+matricula+"&nombre="+nombre+"&apellidop="+apellidop+"&apellidom="+apellidom;
$.get(liga,function(data){
$("#resultados").html(data);
  CerrarLoader();
});
}

</script>
<br>
<center>
<h1>
    Búsqueda de alumnos
</h1>
<br>
<table class="table sombra">
  <thead>
  <tr>
<td>
  <b>Matrícula<br>
  <div class="input-control text">
  <input type="text" id="matricula" value="" class="camposbusqueda">
  </div>
</td>
<td>
  <b>Nombre<br>
  <div class="input-control text">
    <input type="text" id="nombre" value="" class="camposbusqueda">
    </div>
</td>
<td>
  <b>Apellido paterno<br>
  <div class="input-control text">
  <input type="text" id="apellidop" class="camposbusqueda">
  </div>
</td>
<td>
  <b>Apellido materno<br>
  <div class="input-control text">
  <input type="text" id="apellidom" class="camposbusqueda">
  </div>
</td>
  </tr>
</thead>
  <tr>
    <td colspan="4">
      <center><input type="button" onclick="BuscarAlumno()" class="button primary text-shadow sombra" value="Buscar"></center>
    </td>
  </tr>
</table>
<br>
<div id="resultados"></div>
<br>
</center>
