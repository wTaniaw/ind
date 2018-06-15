<script>
  function CrearCarrera(id)
  {
    Ventana("NuevaCarrera.php?universidad_id="+id);
  }
</script>
<style>
  ::-webkit-scrollbar-button{
            width:8px;
            height: 9px;
            }
            ::-webkit-scrollbar-track{
            background:#3c454e;
            border:thin solid #1a1f25;
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb{
            background: -webkit-linear-gradient(top,#408e41, #4ca06d);
            -webkit-box-shadow:   inset 0 1px 0 rgba(255,255,225,.5),
                inset 1px 0 0 rgba(255,255,255,.4),
                inset 0 1px 2px rgba(255,255,255,.3);

            border:thin solid #232c34;
            border-radius: 10px;
            -webkit-border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover{
            background: -webkit-linear-gradient(top, #4ca06d, #408e41);
        }
        /* Pseudo-clase */
        ::-webkit-scrollbar-thumb:window-inactive {
            background: rgba(77,161,112,.6);
        }
        
</style>
<h1 class="text-shadow">Estructura académica</h1><br>
<br>
<div class="accordion" data-role="accordion" style="background-color:white;">
<?php
require_once("funciones.php");
$rs=ConsultarLista("Select * from Universidades");
while($registro=mysql_fetch_array($rs))
{
  $nombre=$registro["Nombre"];
  $id=$registro["id"];
?>

<div class="frame">
    <div class="heading " style="font-size:20px"><?php echo $nombre; ?></div>
    <div class="content">
    <br><input type="button" value="Crear carrera" class="button success sombra text-shadow" onclick="CrearCarrera(<?php echo $id; ?>)">
      <?php
      require_once("funciones.php");
      $rs2=ConsultarLista("Select * from Carreras where Universidad_id=$id");

      ?><table class="table hovered sombra">
        <thead>
<tr>
<th>Clave</th>
<th>Carrera</th>
          </tr>
          
        </thead>
        <?php
      while($registro2=mysql_fetch_array($rs2))
      {
        $nombre2=$registro2["Nombre"];
        $id2=$registro2["id"];
      ?>
      
      

<tr style="cursor:pointer" onclick="Abrir('Carrera.php?carrera_id=<?php echo $id2; ?>')">
  <td><?php echo $id2; ?></td>
<td><?php echo $nombre2; ?></td>
</tr>
      <?php
      }
      ?>
       </table>
    </div>
</div>
<?php
}
?>
</div>
