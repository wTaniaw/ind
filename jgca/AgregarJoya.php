Cantidad: &nbsp;<input type="number" class="topcoat-text-input" placeholder="Cantidad" value="" id="cantidad">
<hr>
Precio: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="topcoat-text-input" placeholder="Precio" value="" id="precio">
<hr>
Tipo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="docNav" id="tipo">
  <option value="Cadena">Cadena</option>
    <option value="Anillo">Anillo</option>
      <option value="Pulsera">Pulsera</option>
        <option value="Esclava">Esclava</option>
          <option value="Aretes">Aretes</option>
  </select>
<hr><br>
<button class="topcoat-button--cta" onclick="GuardarJoya()">Guardar</button>

<script>
function GuardarJoya()
{
  var tipo=$("#tipo").val();
  var precio=$("#precio").val();
  var cantidad=$("#cantidad").val();
$.post("GuardarJoya.php?tipo="+tipo+"&precio="+precio+"&cantidad="+cantidad,function(data){
if(data=="bien")
{
$("#precio").val("");
$("#cantidad").val("");
alert("La joya se guardó correctamente");
}
else
{
alert("Ocurrió un error al guardar la joya");
}
});
}
</script>