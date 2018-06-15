<?php
    require_once("funciones.php");
    $deuda_id=$_REQUEST["deuda_id"];
    Ejecutar("update Deudas set Pagada=1 where id=$deuda_id");
?>
<a id="redi" href="Deuda.php?deuda_id=<?php echo $deuda_id; ?>"></a>
<script>
	$("#redi").trigger("click");
</script>
