
<script>
$(document).ready(function(){
  TablaDinamicaDefault("#tablaencuestas");
});
function AbrirEncuesta(id)
{
  Abrir("AbrirEncuesta.php?encuesta_id="+id);
}
</script>
<center>

<h1 class="text-shadow">Encuestas</h1>
<a href="Encuesta.php">Click aquí para ir a la página de captura de encuestas</a>
<br>
        <table class="hovered cell-hovered bordere sombra table" id="tablaencuestas">
          <thead>
            <tr>
            <th>Clave</th>
              <th>Maestría</th>
              <th>Sexo</th>
              <th>Edad</th>
              <th>Acción</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listaencuestas=ConsultarLista("select * from Encuesta");
        while($encuesta=mysql_fetch_array($listaencuestas))
        {
          $encuesta_id=$encuesta["id"];
          echo "<tr>";
          echo "<td>".$encuesta["id"]."</td>";
          echo "<td>".$encuesta["maestria"]."</td>";
          echo "<td>".$encuesta["sexo"]."</td>";
          echo "<td>".$encuesta["edad"]." años</td>";
          echo "<td><input type='button' class='button primary' value='Abrir información' onclick='AbrirEncuesta(".$encuesta_id.")'></td>";
          echo "</tr>";
        }
        ?>
        </table>
        <br><br>
    </div>
</div>
</center>
