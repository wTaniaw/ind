function ConvertirMayusculas(nombre) {
    $(nombre).keyup(function () {
        $(nombre).val($(nombre).val().toUpperCase());
    }).focusout(function () {
        $(nombre).val($(nombre).val().toUpperCase());
    });
}
function TablaDinamicaDefault(nombre) {
    $(nombre).dataTable({
        "aLengthMenu": [[10, 50, 100, 250, 500, -1], [10, 50, 100, 250, 500, "Todos"]],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Ningún registro encontrado",
            "info": "Mostrando _START_ hasta _END_ de _TOTAL_ registros",
            "infoEmpty": "Ningún registro encontrado",
            "infoFiltered": "(Filtrado de _MAX_ registros en total)",
            "search":         "Buscar:",
            "paginate": {
              "first":      "Primera",
              "last":       "Última",
              "next":       "Siguiente",
              "previous":   "Anterior"
              }
        }
    });
}

function ValidarGuardado(mensaje,bien,mal)
{
  if(mensaje=="bien")
  {
    MensajeB(bien);
  }
  else
    {
      MensajeE(mal);
    }
  }


function CerrarVentana()
{
hideMetroDialog("#VentanaGeneral");
$("html, body").animate({ scrollTop: 0 }, 600);
}
function CerrarLoader()
{
hideMetroDialog("#Loader");
}
function MensajeB(mensaje)
{
  $.Notify({
  caption: 'Correcto',
          content: mensaje,
          type: 'success'
        });
      }
      function MensajeE(mensaje)
      {
        $.Notify({
          caption: 'Error',
          content: mensaje,
          type: 'alert'
        });
      }
      function Abrir(liga)
      {
        Cargando();
        $("#ContenidoGeneral").load(liga,function(){
          CerrarLoader();
          $("html, body").animate({ scrollTop: 0 }, 600);
        });
      }
      function Ventana(liga){
        Cargando();
        $.get(liga,function(data){
          $("#VentanaGeneral").html(data);
          $("#VentanaGeneral").append("<span class='dialog-close-button' onclick='javascript:CerrarVentana()'></span>");
          var dialog = $("#VentanaGeneral").data('dialog');
          dialog.open();
CerrarLoader();
        });
      }
      function Cargando(){
          $("#Loader").html('<center><span class="mif-spinner5 mif-ani-pulse" style="color: #DF7401;font-size:150px"></span></center>');
          var dialog = $("#Loader").data('dialog');
          dialog.open();
      }
      function VerificarInput(nombre) {
        var elem = $(nombre);
          if (elem.val() === "" || elem.val() === " ") {
            EstadoError(nombre);
            elem.attr("placeholder", "Llena este campo");
            return false;
        } else {
            EstadoBien(nombre);
            return true;
        }
    }
    function VerificarCorreo(nombre) {
        var campo = $(nombre);
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        if (filter.test(campo.val())) {
            EstadoBien(nombre);
            return true;
        }
        else {
            EstadoError(nombre);
            campo.attr("placeholder", "Llena este campo");
            return false;
        }
    }
    function VerificarSelect(nombre) {
        var elem = $(nombre + " option:selected").val();
        if ((elem !== "0" || elem != 0) && elem != undefined) {
            EstadoBien(nombre);
            return true;
        }
        else {
            EstadoError(nombre);
            return false;
        }
    }
    function VerificarNumLetras(nombre, num) {
        var elem = $(nombre);

        if (elem.val() === "" || elem.val() === " " || elem.val().length < num) {
            EstadoError(nombre);
            elem.attr("placeholder", num+" caracteres");
            return false;
        } else {
            EstadoBien(nombre);
            return true;
        }
    }
    function VerificarCantidad(nombre, cant) {
        var elem = $(nombre);
           BorrarTipo(nombre);
        if (elem.val() === "" || (elem.val() * 1) < cant) {
            EstadoError(nombre);
            elem.attr("placeholder", "El valor mínimo es "+cant);
            MensajeE("El valor mínimo es "+cant);
            return false;
        } else {
            EstadoBien(nombre);
            return true;
        }
    }
    function VerificarCantidadMaximo(nombre, cant) {
        var elem = $(nombre);
        BorrarTipo(nombre);
        if (elem.val() === "" || (elem.val() * 1) > cant) {
            EstadoError(nombre);
            elem.attr("placeholder", "El valor máximo es "+cant);
            MensajeE("El valor máximo es "+cant);
            return false;
        } else {
            EstadoBien(nombre);
            return true;
        }
    }
    function EstadoError(nombre) {
        BorrarTipo(nombre);
        $(nombre).parent().addClass("error");
    }
    function EstadoBien(nombre) {
        BorrarTipo(nombre);
        $(nombre).parent().addClass("success");
    }
    function BorrarTipo(nombre) {
        $(nombre).parent().removeClass("success");
        $(nombre).parent().removeClass("error");
        $(nombre).parent().removeClass("warning");
        $(nombre).parent().removeClass("info");
        $(nombre).attr("placeholder", "");
    }
