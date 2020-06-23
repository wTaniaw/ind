<?php
session_start();
ob_start();
if (isset($_REQUEST['metodo'])) {
  $metodo = $_REQUEST['metodo'];
  switch ($metodo) {
    case "GuardarAspirante":
      GuardarAspirante();
      break;
    case "GuardarAsistencia":
      GuardarAsistencia();
      break;
    case "GuardarProfesor":
      GuardarProfesor();
      break;
    case "GuardarHistorialDocente":
      GuardarHistorialDocente();
      break;
    case "GuardarLibro":
      GuardarLibro();
      break;
    case "GuardarDirectores":
      GuardarDirectores();
      break;
    case "EditarPublicacion":
      EditarPublicacion();
      break;
    case "GuardarPublicacion":
      GuardarPublicacion();
      break;
    case "GuardarContrasena":
      GuardarContrasena();
      break;
    case "EliminarMovimiento":
      EliminarMovimiento();
      break;
    case "ActivarPublicacion":
      ActivarPublicacion();
      break;
    case "CerrarPublicacion":
      CerrarPublicacion();
      break;
    case "ActivarBanner":
      ActivarBanner();
      break;
    case "CerrarBanner":
      CerrarBanner();
      break;
    case "GuardarMatricula":
      GuardarMatricula();
      break;
    case "GuardarFolio":
      GuardarFolio();
      break;
    case "GuardarNcertificado":
      GuardarNcertificado();
      break;
    case "EditarProfesor":
      EditarProfesor();
      break;
    case "EditarMateria":
      EditarMateria();
      break;
    case "GenerarNumero":
      GenerarNumero();
      break;
    case "GuardarAdministrativo":
      GuardarAdministrativo();
      break;
    case "GuardarMateria":
      GuardarMateria();
      break;
    case "EditarAdministrativo":
      EditarAdministrativo();
      break;
    case "GuardarPeriodoActivo":
      GuardarPeriodoActivo();
      break;
    case "EstadoHistorial":
      EstadoHistorial();
      break;
    case "GuardarGrupo":
      GuardarGrupo();
      break;
    case "EliminarMateria":
      EliminarMateria();
      break;
    case "EliminarGrupo":
      EliminarGrupo();
      break;
    case "EditarAspirante":
      EditarAspirante();
      break;
    case "GuardarCarrera":
      GuardarCarrera();
      break;
    case "GuardarCalificacion":
      GuardarCalificacion();
      break;
    case "Inscribir":
      Inscribir();
      break;
    case "CapturarBaja":
      CapturarBaja();
      break;
    case "InscribirGrupo":
      InscribirGrupo();
      break;
    case "CargarGrupos":
      CargarGrupos();
      break;
    case "GuardarMensaje":
      GuardarMensaje();
      break;
    case "GuardarNuevoPeriodo":
      GuardarNuevoPeriodo();
      break;
    case "GuardarJefe":
      GuardarJefe();
      break;
  }
}
function GuardarAspirante()
{
  $nombre = $_REQUEST["nombre"];
  $apellidop = $_REQUEST["apellidop"];
  $apellidom = $_REQUEST["apellidom"];
  $telefono = $_REQUEST["telefono"];
  $celular = $_REQUEST["celular"];
  $municipion = $_REQUEST["municipion"];
  $curp = $_REQUEST["curp"];
  $fecha = $_REQUEST["fecha"];
  $correo = $_REQUEST["correo"];
  $calle = $_REQUEST["calle"];
  $genero = $_REQUEST["genero"];
  $colonia = $_REQUEST["colonia"];
  $numero = $_REQUEST["numero"];
  require_once("funciones.php");
  conectar();
  $resultado = mysql_query("insert into Aspirantes values(0,'$nombre','$apellidop','$apellidom','$telefono','$celular',$municipion,'$curp','$fecha','$correo','$calle','$colonia','$numero',0,0,now(),1,'$genero')");
  if ($resultado) {
    echo "bien";
  } else {
    echo "error";
  }
  cerrar();
}
function GuardarCarrera()
{
  $nombre = $_REQUEST["nombre"];
  $universidad_id = $_REQUEST["universidad_id"];
  require_once("funciones.php");
  conectar();
  $resultado = Ejecutar("insert into Carreras values(0,'$nombre',$universidad_id)");
  if ($resultado != null) {
    echo "bien";
  } else {
    echo "error";
  }
  cerrar();
}
function GuardarGrupo()
{
  $nombre = $_REQUEST["nombre"];
  $grado = $_REQUEST["grado"];
  $periodo = $_REQUEST["periodo"];
  $carrera_id = $_REQUEST["carrera_id"];
  require_once("funciones.php");
  conectar();
  $resultado = Ejecutar("insert into Grupos values(0,'$nombre',$grado,$carrera_id,$periodo)");
  if ($resultado != null) {
    echo "bien";
  } else {
    echo "error";
  }
  cerrar();
}
function EliminarMateria()
{
  $id = $_REQUEST["materia_id"];
  require_once("funciones.php");
  conectar();
  $vecesusada = ConsultarValor("Select count(*)as valor from Historialmateria where Materia_id=$id");
  if ($vecesusada > 0) {
    echo "usada";
  } else {
    $eliminaplan = Ejecutar("delete from Planes where Materia_id=$id");
    $eliminamateria = Ejecutar("delete from Materias where id=$id");
    if ($eliminaplan && $eliminamateria) {
      echo "bien";
    } else {
      echo "error";
    }
  }

  cerrar();
}
function EliminarGrupo()
{
  $id = $_REQUEST["grupo_id"];
  require_once("funciones.php");
  conectar();
  $eliminagrupo = Ejecutar("delete from Grupos where id=$id");
  if ($eliminagrupo) {
    echo "bien";
  } else {
    echo "error";
  }
  cerrar();
}
function GuardarProfesor()
{
  $nombre = $_REQUEST["nombre"];
  $apellidop = $_REQUEST["apellidop"];
  $apellidom = $_REQUEST["apellidom"];
  $telefono = $_REQUEST["telefono"];
  $celular = $_REQUEST["celular"];
  $curp = $_REQUEST["curp"];
  $fecha = $_REQUEST["fecha"];
  $correo = $_REQUEST["correo"];
  $contra = $_REQUEST["contra"];
  $direccion = $_REQUEST["direccion"];
  $usuario = $_REQUEST["usuario"];
  require_once("funciones.php");
  $usuario_id = Insertar("Insert into Usuarios values(0,'$usuario','$contra','Docente')");
  $docente_id = Insertar("insert into Docentes values(0,'$nombre','$apellidop','$apellidom','$telefono','$celular','$direccion','$curp','$fecha','$correo',$usuario_id)");
  if ($usuario_id != null && $docente_id != null) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarMateria()
{
  $nombre = $_REQUEST["nombre"];
  $grado_id = $_REQUEST["grado"];
  $clave = $_REQUEST["clave"];
  $carrera_id = $_REQUEST["carrera_id"];
  require_once("funciones.php");
  $materia_id = Insertar("Insert into Materias values(0,'$nombre','$clave')");
  $materia_id = Insertar("insert into Planes values(0,'$carrera_id','$grado_id','$materia_id')");
  if ($materia_id != null && $materia_id != null) {
    echo $materia_id;
  } else {
    echo "0";
  }
}
function GuardarPublicacion()
{
  $titulo = $_REQUEST["titulo"];
  $texto = $_REQUEST["texto"];
  $textoboton = $_REQUEST["textoboton"];
  $colorboton = $_REQUEST["colorboton"];
  $link = $_REQUEST["link"];
  $colorfondo = $_REQUEST["colorfondo"];
  $imagen = $_REQUEST["imagen"];
  require_once("funciones.php");
  $publicacion_id = Insertar("Insert into Publicaciones values(0,'$titulo','$texto','$colorboton','$textoboton','$link','$colorfondo','$imagen',1)");

  if ($publicacion_id != null) {
    echo "bien";
  } else {
    echo "error";
  }
}
function EditarPublicacion()
{
  $titulo = $_REQUEST["titulo"];
  $texto = $_REQUEST["texto"];
  $textoboton = $_REQUEST["textoboton"];
  $colorboton = $_REQUEST["colorboton"];
  $link = $_REQUEST["link"];
  $colorfondo = $_REQUEST["colorfondo"];
  $imagen = $_REQUEST["imagen"];
  $publicacion_id = $_REQUEST["publicacion_id"];
  require_once("funciones.php");
  $publicacion_id = Ejecutar("update Publicaciones set Titulo='$titulo',Texto='$texto',ColorBoton='$colorboton',TextoBoton='$textoboton',Link='$link',ColorFondo='$colorfondo',Imagen='$imagen'");
  if ($publicacion_id) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarDirectores()
{
  $directorchihuahua = $_REQUEST["directorchihuahua"];
  $directorjuarez = $_REQUEST["directorjuarez"];
  require_once("funciones.php");
  $parametros = Ejecutar("update Parametros set DirectorChihuahua='$directorchihuahua',DirectorJuarez='$directorjuarez' where id=1");
  if ($parametros) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarJefe()
{
  $puestojefe = $_REQUEST["puestojefe"];
  $nombrejefe = $_REQUEST["nombrejefe"];
  require_once("funciones.php");
  $parametros = Ejecutar("update Parametros set PuestoJefe='$puestojefe',NombreJefe='$nombrejefe' where id=1");
  if ($parametros) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarContrasena()
{
  $anterior = $_REQUEST["anterior"];
  $nueva = $_REQUEST["nueva"];
  $usuario_id = $_REQUEST["usuario_id"];
  $nueva2 = $_REQUEST["nueva2"];
  require_once("funciones.php");
  if ($nueva == $nueva2) {
    $contraanterior = ConsultarValor("select Contrasena as valor from Usuarios where id=$usuario_id");
    if ($anterior == $contraanterior) {
      $contrasenaactualizada = Ejecutar("update Usuarios set Contrasena='$nueva' where id=$usuario_id");
      if ($contrasenaactualizada) {
        echo "bien";
      } else {
        echo "error";
      }
    } else {
      echo "anterior";
    }
  } else {
    echo "confirmacion";
  }
}

function EditarProfesor()
{
  $nombre = $_REQUEST["nombre"];
  $apellidop = $_REQUEST["apellidop"];
  $apellidom = $_REQUEST["apellidom"];
  $telefono = $_REQUEST["telefono"];
  $celular = $_REQUEST["celular"];
  $curp = $_REQUEST["curp"];
  $fecha = $_REQUEST["fecha"];
  $correo = $_REQUEST["correo"];
  $contra = $_REQUEST["contra"];
  $direccion = $_REQUEST["direccion"];
  $usuario = $_REQUEST["usuario"];
  $profesor_id = $_REQUEST["profesor_id"];
  require_once("funciones.php");
  $profesor = ConsultarRegistro("select * from Docentes where id=$profesor_id");
  $usuario_id = $profesor["Usuario_id"];
  $editarusuario = Ejecutar("Update Usuarios set Nombre='$usuario',Contrasena='$contra' where id=$usuario_id");
  $editardocente = Ejecutar("update Docentes set Nombre='$nombre',ApellidoP='$apellidop',ApellidoM='$apellidom',Telefono='$telefono',Celular='$celular',Direccion='$direccion',CURP='$curp',FechaNacimiento='$fecha',Correo='$correo' where id=$profesor_id");
  if ($editarusuario && $editardocente) {
    echo "bien";
  } else {
    echo "error";
  }
}
function EditarMateria()
{
  $nombre = $_REQUEST["nombre"];
  $clave = $_REQUEST["clave"];
  $materia_id = $_REQUEST["materia_id"];
  require_once("funciones.php");
  $editarmateria = Ejecutar("Update Materias set Nombre='$nombre',Clave='$clave' where id=$materia_id");
  if ($editarmateria) {
    echo "bien";
  } else {
    echo "error";
  }
}

function GuardarMatricula()
{
  $alumno_id = $_REQUEST["alumno_id"];
  $matricula = $_REQUEST["matricula"];
  require_once("funciones.php");
  $usuario_id = ConsultarValor("Select Usuario_id as valor from Alumnos where id=$alumno_id");
  $editarmatricula = Ejecutar("Update Alumnos set Matricula='$matricula' where id=$alumno_id");
  $editarusuario = Ejecutar("Update Usuarios set Nombre='$matricula' where id=$usuario_id");
  if ($editarmatricula && $editarusuario) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarFolio()
{
  $alumno_id = $_REQUEST["alumno_id"];
  $folio = $_REQUEST["folio"];
  require_once("funciones.php");
  $editarfolio = Ejecutar("Update Alumnos set Folio='$folio' where id=$alumno_id");
  if ($editarfolio) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GenerarNumero()
{
  $alumno_id = $_REQUEST["alumno_id"];
  require_once("funciones.php");
  $carrera_id = ConsultarValor("Select c.id as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id join Periodos p on p.id=h.Periodo_id where a.id=$alumno_id order by p.FechaInicio desc limit 1");
  $num = ConsultarValor("Select a.NCertificado as valor from Historialalumnos h join Grupos g on g.id=h.Grupo_id join Carreras c on c.id=g.Carrera_id join Alumnos a on a.id=h.Alumno_id where c.id=$carrera_id order by a.NCertificado desc limit 1");
  $editarnum = Ejecutar("Update Alumnos set NCertificado='" . ($num + 1) . "' where id=$alumno_id");
  if ($editarnum) {
    echo $num + 1;
  } else {
    echo "0";
  }
}
function GuardarNcertificado()
{
  $alumno_id = $_REQUEST["alumno_id"];
  $ncertificado = $_REQUEST["ncertificado"];
  require_once("funciones.php");
  $guardarncertificado = Ejecutar("Update Alumnos set NCertificado='$ncertificado' where id=$alumno_id");
  if ($guardarncertificado) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarLibro()
{
  $alumno_id = $_REQUEST["alumno_id"];
  $libro = $_REQUEST["libro"];
  require_once("funciones.php");
  $editarlibro = Ejecutar("Update Alumnos set Libro='$libro' where id=$alumno_id");
  if ($editarlibro) {
    echo "bien";
  } else {
    echo "error";
  }
}
function EliminarMovimiento()
{
  $historial_id = $_REQUEST["historial_id"];
  require_once("funciones.php");
  $listamaterias = ConsultarLista("Select * from Historialmateria where Historialalumnos_id=$historial_id");
  while ($materia = mysql_fetch_array($listamaterias)) {
    $materia_id = $materia["id"];
    Ejecutar("Delete from Historialmateria where id=$materia_id");
  }
  $eliminarhistorial = Ejecutar("delete from Historialalumnos where id=$historial_id");
  if ($eliminarhistorial) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarAdministrativo()
{
  $nombre = $_REQUEST["nombre"];
  $apellidop = $_REQUEST["apellidop"];
  $apellidom = $_REQUEST["apellidom"];
  $telefono = $_REQUEST["telefono"];
  $celular = $_REQUEST["celular"];
  $curp = $_REQUEST["curp"];
  $fecha = $_REQUEST["fecha"];
  $correo = $_REQUEST["correo"];
  $contra = $_REQUEST["contra"];
  $direccion = $_REQUEST["direccion"];
  $usuario = $_REQUEST["usuario"];
  require_once("funciones.php");
  $usuario_id = Insertar("Insert into Usuarios values(0,'$usuario','$contra','Escolares')");
  $administrativo_id = Insertar("insert into Administrativos values(0,'$nombre','$apellidop','$apellidom','$telefono','$celular','$direccion','$curp','$fecha','$correo',$usuario_id)");
  if ($usuario_id != null && $administrativo_id != null) {
    echo "bien";
  } else {
    echo "error";
  }
}

function EditarAdministrativo()
{
  $nombre = $_REQUEST["nombre"];
  $apellidop = $_REQUEST["apellidop"];
  $apellidom = $_REQUEST["apellidom"];
  $telefono = $_REQUEST["telefono"];
  $celular = $_REQUEST["celular"];
  $curp = $_REQUEST["curp"];
  $fecha = $_REQUEST["fecha"];
  $correo = $_REQUEST["correo"];
  $contra = $_REQUEST["contra"];
  $direccion = $_REQUEST["direccion"];
  $usuario = $_REQUEST["usuario"];
  $administrativo_id = $_REQUEST["administrativo_id"];
  require_once("funciones.php");
  $administrativo = ConsultarRegistro("select * from Administrativos where id=$administrativo_id");
  $usuario_id = $administrativo["Usuario_id"];
  $editarusuario = Ejecutar("Update Usuarios set Nombre='$usuario',Contrasena='$contra' where id=$usuario_id");
  $editaradministrativo = Ejecutar("update Administrativos set Nombre='$nombre',ApellidoP='$apellidop',ApellidoM='$apellidom',Telefono='$telefono',Celular='$celular',Direccion='$direccion',CURP='$curp',FechaNacimiento='$fecha',Correo='$correo' where id=$administrativo_id");
  if ($editarusuario && $editaradministrativo) {
    echo "bien";
  } else {
    echo "error";
  }
}

function EditarAspirante()
{
  $nombre = $_REQUEST["nombre"];
  $apellidop = $_REQUEST["apellidop"];
  $apellidom = $_REQUEST["apellidom"];
  $telefono = $_REQUEST["telefono"];
  $celular = $_REQUEST["celular"];
  $municipion = $_REQUEST["municipion"];
  $curp = $_REQUEST["curp"];
  $fecha = $_REQUEST["fecha"];
  $correo = $_REQUEST["correo"];
  $calle = $_REQUEST["calle"];
  $colonia = $_REQUEST["colonia"];
  $numero = $_REQUEST["numero"];
  $aspirante_id = $_REQUEST["aspirante_id"];
  require_once("funciones.php");
  $resultado = Ejecutar("update Aspirantes set Nombre='$nombre',ApellidoP='$apellidop',ApellidoM='$apellidom',Telefono='$telefono',Celular='$celular',MunicipioN=$municipion,CURP='$curp',FechaNacimiento='$fecha',Correo='$correo',Calle='$calle',Colonia='$colonia',Numero='$numero' where id=$aspirante_id");
  if ($resultado) {
    echo "bien";
  } else {
    echo "error";
  }
}
function Inscribir()
{
  $aspirante_id = $_REQUEST["aspirante_id"];
  require_once("funciones.php");
  $resultado = Ejecutar("update Aspirantes set Inscrito=1 where id=$aspirante_id");
  $usuario_id = ObtenerUsuario();
  $usuario = Insertar("insert into Usuarios values(0,'','iineed123','Alumno')");
  $alumno = Insertar("insert into Alumnos values(0,'',$usuario,'Regular',$aspirante_id,'','','')");
  if ($resultado && $alumno != null && $usuario != null) {
    echo $alumno;
  } else {
    echo "error";
  }
}
function GuardarHistorialDocente()
{
  $periodo_id = $_REQUEST["periodo_id"];
  $materia_id = $_REQUEST["materia_id"];
  $profesor_id = $_REQUEST["profesor_id"];
  $grupo_id = $_REQUEST["grupo_id"];
  require_once("funciones.php");
  $historialex = ConsultarRegistro("Select * from Historialdocente where Materia_id=$materia_id and Periodo_id = $periodo_id and Grupo_id=$grupo_id");
  $historialex_id = $historialex["id"];
  if ($historialex_id != null) {
    $actualizacion = Ejecutar("update Historialdocente set Docente_id=$profesor_id where id=$historialex_id");
  } else {
    $historial = Insertar("insert into Historialdocente values(0,$profesor_id,$materia_id,$periodo_id,$grupo_id)");
  }
  if ($historial != null || $actualizacion) {
    echo "bien";
  } else {
    echo "error";
  }
}

function CapturarBaja()
{
  $historial_id = $_REQUEST["grupo_id"];
  require_once("funciones.php");
  $historial = ConsultarRegistro("select * from Historialalumnos where id=$historial_id");
  $alumno_id = $historial["Alumno_id"];
  $periodo_id = $historial["Periodo_id"];
  $grupo_id = $historial["Grupo_id"];
  $historialnuevo = Insertar("insert into Historialalumnos values(0,$alumno_id,'Baja',$periodo_id,$grupo_id,now())");
  $baja = Ejecutar("update Alumnos set Estatus='Baja' where id=$alumno_id");
  if ($historial && $historialnuevo != null && $baja) {
    echo "bien";
  } else {
    echo "error";
  }
}

function CargarGrupos()
{
  $periodo_id = $_REQUEST['periodo_id'];
  $carrera_id = $_REQUEST['carrera_id'];
  require_once("funciones.php");
  $rs = ConsultarLista("Select Grupos.*,Grados.Nombre as NombreGrado from Grupos join Grados on Grados.id=Grupos.Grado_id where Carrera_id=$carrera_id and Periodo_id=$periodo_id");
  $combo = "<b> Grupo: </b>";
  $combo = $combo . "<div class='input-control select'>";
  $combo = $combo . "<select id='grupo_inscribir'>";
  $combo = $combo . "<option value='0'>Selecciona un grupo</option>";
  while ($grupo = mysql_fetch_array($rs)) {
    $grupo_id = $grupo["id"];
    $nombre = $grupo["Nombre"] . " " . $grupo["NombreGrado"];
    $combo = $combo . "<option value='" . $grupo_id . "'>" . $nombre . "</option>";
  }
  $combo = $combo . "</select>";
  $combo = $combo . "</div> ";

  echo $combo;
}
function GuardarPeriodoActivo()
{
  require_once("funciones.php");
  $periodo_id = $_REQUEST["periodo_id"];
  $periodoactivo = Ejecutar("update Periodos set Activo=0");
  $periodoactivo2 = Ejecutar("update Periodos set Activo=1 where id=$periodo_id");
  if ($periodoactivo && $periodoactivo2) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarMensaje()
{
  require_once("funciones.php");
  $mensaje = $_REQUEST["mensaje"];
  $nombre = $_REQUEST["nombre"];
  $correo = $_REQUEST["correo"];
  $mensajeinsertado = Insertar("insert into MensajesContacto values(0,'$nombre','$correo','$mensaje')");
  if ($mensajeinsertado != null) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarNuevoPeriodo()
{
  require_once("funciones.php");
  $periodo = $_REQUEST["periodo"];
  $anio = $_REQUEST["anio"];
  $nombre = $periodo . $anio;
  $etapa = 1;
  $fechainicio = "";
  $fechafin = "";
  switch ($periodo) {
    case "ENE-ABR-":
      $etapa = 1;
      $fechainicio = $anio . "/01/01";
      $fechafin = $anio . "/04/30";
      break;
    case "MAY-AGO-":
      $fechainicio = $anio . "/05/01";
      $fechafin = $anio . "/08/31";
      $etapa = 2;
      break;
    case "SEP-DIC-":
      $etapa = 3;
      $fechainicio = $anio . "/09/01";
      $fechafin = $anio . "/12/31";
      break;
  }
  $periodoinsertado = Insertar("insert into Periodos values(0,'$nombre','$etapa','$fechainicio','$fechafin',0)");
  if ($periodoinsertado != null) {
    echo "bien";
  } else {
    echo "error";
  }
}
function EstadoHistorial()
{
  require_once("funciones.php");
  $historial_id = $_REQUEST["historial_id"];
  $historial = ConsultarRegistro("select * from Historialmateria where id=$historial_id");
  $estatus = $historial["Activo"];
  if ($estatus == 1) {
    $regular = Ejecutar("update Historialmateria set Activo=0 where id=$historial_id");
  } else {
    $regular = Ejecutar("update Historialmateria set Activo=1 where id=$historial_id");
  }
  if ($regular) {
    echo "bien";
  }
}
function CerrarPublicacion()
{
  require_once("funciones.php");
  $publicacion_id = $_REQUEST["publicacion_id"];
  $regular = Ejecutar("update Publicaciones set Activo=0 where id=$publicacion_id");
  if ($regular) {
    echo "bien";
  } else {
    echo "error";
  }
}
function ActivarPublicacion()
{
  require_once("funciones.php");
  $publicacion_id = $_REQUEST["publicacion_id"];
  $regular = Ejecutar("update Publicaciones set Activo=1 where id=$publicacion_id");
  if ($regular) {
    echo "bien";
  } else {
    echo "error";
  }
}
function CerrarBanner()
{
  require_once("funciones.php");
  $banner_id = $_REQUEST["banner_id"];
  $regular = Ejecutar("update Banner set Activo=0 where id=$banner_id");
  if ($regular) {
    echo "bien";
  } else {
    echo "error";
  }
}
function ActivarBanner()
{
  require_once("funciones.php");
  $banner_id = $_REQUEST["banner_id"];
  $regular = Ejecutar("update Banner set Activo=1 where id=$banner_id");
  if ($regular) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarCalificacion()
{
  require_once("funciones.php");
  $historial_id = $_REQUEST["historial_id"];
  $calificacion = $_REQUEST["calificacion"];
  $cal = Insertar("insert into Calificaciones values(0,$calificacion,$historial_id)");
  if ($cal != null) {
    echo "bien";
  } else {
    echo "error";
  }
}
function GuardarAsistencia()
{
  require_once("funciones.php");
  $historial_id = $_REQUEST["historial_id"];
  $fecha = $_REQUEST["fecha"];
  $asistencia = $_REQUEST["asistencia"];
  $asi = Insertar("insert into Asistencias values(0,$asistencia,$historial_id,'$fecha')");
  if ($asi != null) {
    echo "bien";
  } else {
    echo "error";
  }
}

function InscribirGrupo()
{
  require_once("funciones.php");
  $grupo_id = $_REQUEST["grupo_id"];
  $alumno_id = $_REQUEST["alumno_id"];
  $carrera_id = $_REQUEST["carrera_id"];
  $periodo_id = $_REQUEST["periodo_id"];
  $grupo = ConsultarRegistro("select * from Grupos where id=$grupo_id");
  $grado_id = $grupo["Grado_id"];
  $listamaterias = ConsultarLista("Select m.id,p.Carrera_id from Planes p join Materias m on m.id=p.Materia_id where Grado_id=$grado_id and Carrera_id=$carrera_id");
  $regular = Ejecutar("update Alumnos set Estatus='Regular' where id=$alumno_id");
  $valid = "bien";
  $historial_id = Insertar("insert into Historialalumnos values(0,$alumno_id,'Inscripción',$periodo_id, $grupo_id,now())");
  if (historial_id == null) {
    $valid = "error";
  }
  while ($plan = mysql_fetch_array($listamaterias)) {
    $materia_id = $plan["id"];
    $correcto = Insertar("insert into Historialmateria values(0,$alumno_id,$materia_id,1, $historial_id)");
    if (correcto == null) {
      $valid = "error";
    }
  }

  echo $valid;
}