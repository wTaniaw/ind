<script>
  function GuardarMensaje()
  {
    var nombre=$("#nombre").val();
    var correo=$("#correo").val();
    var mensaje=$("#mensaje").val();
    Cargando();
    $.post("Guardar.php?metodo=GuardarMensaje&nombre="+nombre+"&mensaje="+mensaje+"&correo="+correo,function(data){
      ValidarGuardado(data,"El mensaje se envió correctamente","Ocurrió un error al enviar el mensaje");
      if(data=="bien")
      {
        CerrarVentana();
        CerrarLoader();
      }
    });  
  }

</script>
<table class="cell-hovered grid stiped table">

        <tbody>
            <tr>
                <td>
                  <b>Nombre</b><br>
                  <div class="input-control text"><input type="text" id="nombre" required="required"></div>
                </td>
                <td>
                  <b>Correo</b><br>
                  <div class="input-control text"><input type="text" id="correo"></div>
                </td>
                <td>
                  <b>Mensaje</b><br>
                  <div class="input-control text"><input type="text" id="mensaje"></div>
                </td>
            </tr>
            <tr>
              <td colspan="3">
                <center><input type="button" value="Guardar" class="button primary text-shadow sombra" onclick="GuardarMensaje()">     </center>
              </td>
            </tr>
            </tbody>
            </table>