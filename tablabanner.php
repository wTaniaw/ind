 <table class="hovered cell-hovered bordered sombra table" id="tablapublicaciones">
          <thead>
            <tr>
              <th>Imagen</th>
              <th>Acción</th>
            </tr>
          </thead>
        <?php
        require_once("funciones.php");
        $listabanners=ConsultarLista("select * from Banner order by id desc");
        while($banner=mysql_fetch_array($listabanners))
        {
          $banner_id=$banner["id"];
          $activa=$banner["activo"];
          $ext=$banner["ext"];
          echo "<tr>";
          echo "<td><center><img src='images/slider/$banner_id.$ext' style='width:400px'></center></td>";
          if($activa==1)
          {
          echo "<td><input type='button' id='botoncerrarbanner' class='button danger' value='Cerrar banner' onclick='CerrarBanner(".$banner_id.")'></td>";
          }
          else{
            echo "<td><input id='botonactivarbanner' type='button' class='button success' value='Activar banner' onclick='ActivarBanner(".$banner_id.")'></td>";
          }
          echo "</tr>";
        }
        ?>
        </table>