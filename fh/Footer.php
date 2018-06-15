    
<div id="NuevaDeuda" class="modal">
  <header class="bar bar-nav">
    <a class="icon icon-close pull-right" href="#NuevaDeuda"></a>
    <h1 class="title">Nueva Deuda</h1>
  </header>
  <div class="content">
    <p class="content-padded"  >
    	<form action="GuardarDeuda.php" style="padding: 10px">
		  <input type="text" placeholder="Descripción" name="descripcion">
		  <input type="text" placeholder="Cantidad $" name="cantidad">
		  <input type="date" placeholder="Fecha límite" name="fechalimite">
		  <input type="checkbox" placeholder="Recurrente" name="recurrente" id="recurrente"> <label for="recurrente">Recurrente</label><br><br>
		  <button class="btn btn-positive btn-block">Guardar</button>
		</form>
    </p>
  </div>
</div>
  </div>

  </body>
</html>