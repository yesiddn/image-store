$(function () {
  var tabla = null;
  listarUsuario();

  // este se usa para encontrar el form por medio del id
  ('use strict');
  var forms = document.querySelectorAll('#formRegistro');

  // Toma input por input y valida el dato
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      'submit',
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add('was-validated');
        } else {
          // Evita que se recargue el navegador y eso ahce que pueda sacar informacion del formulario
          event.preventDefault();

          var documento = $('#documento').val();
          var nombres = $('#nombre').val();
          var apellidos = $('#apellidos').val();
          var direccion = $('#direccion').val();
          var telefono = $('#telefono').val();
          var email =
            'https://source.unsplash.com/640x480/?running-shoes' +
            $('#imagen').val();

          //Se crea un objeto que empaqueta la informacion
          var objData = new FormData();
          objData.append('regDocumento', documento);
          objData.append('regNombre', nombres);
          objData.append('regApellido', apellidos);
          objData.append('regDireccion', direccion);
          objData.append('regTelefono', telefono);
          objData.append('regEmail', email);

          //este es para el envio de datos
          fetch('control/usuarioControl.php', {
            method: 'POST',
            body: objData,
            // este es para capturar el error
          })
            .then((response) => response.json())
            .catch((error) => {
              console.log('error: ', error);
              // este  captura la respuesta si es positiva
            })
            .then((response) => {
              listarUsuario();
              alert(response['mensaje']);
            });
          form.reset();
          $('#myModal').modal('toggle');
          form.classList.delete('was-validated');
        }
      },
      false
    );
  });

  //editar usuario
  // este se usa para encontrar el form por medio del id

  var formEditar = document.querySelectorAll('#formEditar');

  // Toma input por input y valida el dato
  Array.prototype.slice.call(formEditar).forEach(function (form) {
    form.addEventListener(
      'submit',
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        } else {
          // Evita que se recargue el navegador y eso ahce que pueda sacar informacion del formulario
          event.preventDefault();

          var idPrestamo = $('#btnEditarRegistro').attr('idprestamo');
          var documento = $('#editdocumento').val();
          var nombres = $('#editnombre').val();
          var apellidos = $('#editapellidos').val();
          var direccion = $('#editdireccion').val();
          var telefono = $('#edittelefono').val();
          var email = $('#editemail').val();

          //Se crea un objeto que empaqueta la informacion
          var objData = new FormData();
          objData.append('editUsuario', idPrestamo);
          objData.append('editDocumento', documento);
          objData.append('editNombre', nombres);
          objData.append('editApellido', apellidos);
          objData.append('editDireccion', direccion);
          objData.append('editTelefono', telefono);
          objData.append('editEmail', email);

          //este es para el envio de datos
          fetch('control/usuarioControl.php', {
            method: 'POST',
            body: objData,
            // este es para capturar el error
          })
            .then((response) => response.json())
            .catch((error) => {
              console.log('error: ', error);
              // este  captura la respuesta si es positiva
            })
            .then((response) => {
              listarUsuario();
              alert(response['mensaje']);
            });
        }
      },
      false
    );
  });

  // conexion de la tabla
  function listarUsuario() {
    // se crea la peticion para consultar la informacion
    var objData = new FormData();
    objData.append('listarUsuario', 'OK');

    fetch('control/usuarioControl.php', {
      method: 'POST',
      body: objData,
      // este es para capturar el error
    })
      .then((response) => response.json())
      .catch((error) => {
        console.log('error: ', error);
        // este  captura la respuesta si es positiva
      })
      .then((response) => {
        cargarDatos(response);
      });
  }

  function cargarDatos(response) {
    var dataSet = [];
    response.forEach(listarDatos);
    function listarDatos(item, index) {
      var objBotones = '<div class="btn-group">';
      objBotones +=
        '<button type="button" id="btnEditar" class="btn btn-primary" idprestamo="' +
        item.idPrestamo +
        '" documento="' +
        item.documento +
        '" nombres="' +
        item.nombres +
        '" apellidos="' +
        item.apellidos +
        '" direccion="' +
        item.direccion +
        '" telefono="' +
        item.telefono +
        '" email="' +
        item.email +
        '" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>';
      objBotones +=
        '<button type="button" class="btn btn-danger" id="btnEliminar" idprestamo="' +
        item.idPrestamo +
        '">Eliminar</button>';
      objBotones += '</div>';
      dataSet.push([
        item.documento,
        item.nombres,
        item.apellidos,
        item.direccion,
        item.telefono,
        item.email,
        objBotones,
      ]);
    }
    if (tabla != null) {
      $('#tablaUsuarios').dataTable().fnDestroy();
    }
    tabla = $('#tablaUsuarios').DataTable({
      data: dataSet,
    });
  }
  $('#tablaUsuarios').on('click', '#btnEditar', function () {
    var documento = $(this).attr('documento');
    $('#editdocumento').val(documento);
    var nombres = $(this).attr('nombres');
    $('#editnombre').val(nombres);
    var apellidos = $(this).attr('apellidos');
    $('#editapellidos').val(apellidos);
    var direccion = $(this).attr('direccion');
    $('#editdireccion').val(direccion);
    var telefono = $(this).attr('telefono');
    $('#edittelefono').val(telefono);
    var email = $(this).attr('email');
    $('#editemail').val(email);

    var idPrestamo = $(this).attr('idprestamo');
    $('#btnEditarRegistro').attr('idprestamo', idPrestamo);
  });

  $('#tablaUsuarios').on('click', '#btnEliminar', function () {
    var idPrestamo = $(this).attr('idprestamo');

    var objData = new FormData();
    objData.append('idUsuario', idPrestamo);

    fetch('control/usuarioControl.php', {
      method: 'POST',
      body: objData,
      // este es para capturar el error
    })
      .then((response) => response.json())
      .catch((error) => {
        console.log('error: ', error);
        // este  captura la respuesta si es positiva
      })
      .then((response) => {
        alert(response['mensaje']);
      });

    listarUsuario();
  });
});
