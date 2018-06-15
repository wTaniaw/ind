<!DOCTYPE html>

<?php
include("Menuprincipal.php");
?>
<style type="text/css">
  body{
    font-size:14px;
    color:#2E2E2E;
  }
  h2{
    color:#084B8A;
  }
  h3{
    color:#FA8258;
  }
</style>
<body>
<center>
<script>
  function GuardarMensaje()
  {
    var nombre=$("#nombre").val();
    var correo=$("#correo").val();
    var mensaje=$("#mensaje").val();
    $.post("Guardar.php?metodo=GuardarMensaje&nombre="+nombre+"&mensaje="+mensaje+"&correo="+correo,function(data){
      if(data=="bien")
      {
      alert("El mensaje se envió correctamente, si es necesario nosotros nos contactaremos con usted.")
      }
    });
  }

</script><br><br><br>
<table class="">

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
                <center><input type="button" value="Enviar mensaje" class="btn btn-success large" onclick="GuardarMensaje()">     </center><br><br><br>
              </td>
            </tr>
            </tbody>
            </table>

            </center>
</body><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include("footer.php"); ?>
</html>