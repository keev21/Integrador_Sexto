//TODO: Archivo de javascript para agregar la funcionalidad 
function init() {
  $('#Registro_form').on('submit', (e) => {
    guardayeditarcliente(e);
  })
}

var guardayeditarcliente = (e) => {
  e.preventDefault();
  var url = "";
  var ClienteID = document.getElementById("Registro_form").value;
  if (ClienteID === undefined || ClienteID === "") {
    url = "../../Controllers/cliente.controller.php?op=insertar";
    
  } 
  var form_Data = new FormData($("#Registro_form")[0]);
  $.ajax({
    url: url,
    type: "POST",
    data: form_Data,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      
      if (respuesta == "ok") {
        Swal.fire('Categoria de Clientes', 'Se guardo con exito', 'success');
        limpiar();
      } else {
        Swal.fire('Categoria de Clientes', 'Ocurrio un error', 'danger');
      }
    },
  });
};

  var limpiar = () => {
    $('#ClienteID').val('');
    $('#Ciudad').val('');
    $('#Pais').val('');
    $('#Nombre').val('');
    $('#Correo').val('');
    $('#Contrasena').val('');
    $('#Direccion').val('');
    $('#Telefono').val('');
    
  };

  init();