<?php 
$estado=$_REQUEST['estadon'];
?>
<br><b>Municipio nacimiento</b><br>
                  <div class="input-control select ">
                    <select id="municipion" required="required">
                      <option value="0">Selecciona una opción</option>
                      <?php

              require_once("funciones.php");
              conectar();
              $resultado=mysql_query("select * from Municipios where Estado_id=$estado")or die(mysql_error());

                 while($filas=mysql_fetch_array($resultado))
              {
              $Nombre=$filas["Nombre"];
              $id=$filas["id"];
              ?>
                      <option value="<?php echo "$id"; ?>"><?php echo "$Nombre"; ?></option>
                  <?php
                   }
                   cerrar();
              ?>
                    </select>
                  </div>