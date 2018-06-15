<?php
session_start();
ob_start();
if(isset($_POST["user"]) and isset($_POST["pass"]))
	$usuario=$_POST["user"];
	$pass=$_POST["pass"];
	require_once("funciones.php");
	$resultado=ConsultarRegistro("select count(*) as valor, Nombre,Contrasena ,Tipo,id from Usuarios where Nombre='$usuario' and Contrasena='$pass' group by Nombre,Contrasena,Tipo,id");
	$cuantos=0;
		$usuario=$resultado["Nombre"];
		$tipo_usuario=$resultado["Tipo"];
		$cuantos=$resultado["valor"];
		$id=$resultado["id"];
	if($cuantos>0)
	{
		$_SESSION["usuario"]=$usuario;
		$_SESSION["tipo"]=$tipo_usuario;
		$_SESSION["usuario_id"]=$id;
		if($tipo_usuario=="Escolares")
		{
			$administrativo=ObtenerAdministrativo($id);
			$_SESSION["administrativo"]=$administrativo;
			?><script>location.href="Escolares.php"</script><?php
		}
		else if($tipo_usuario=="Alumno")
		{
			$alumno=ObtenerAlumno($id);
			$alumno_id=ConsultarValor("Select id as valor from Alumnos where Usuario_id=$id");
			$_SESSION["alumno"]=$alumno;
			$_SESSION["alumno_id"]=$alumno_id;
			?><script>location.href="Alumno.php"</script><?php
		}
		else if($tipo_usuario=="Docente")
		{
			$docente=ObtenerDocente($id);
			$_SESSION["docente"]=$docente;
		?><script>location.href="Docente.php"</script><?php
		}
	}
	else
	{
		?><script>location.href='index.php?r="error"';</script><?php
	}
?>
