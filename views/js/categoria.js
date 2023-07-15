$(function () {
  // Categoria
  var tabla = null;
  listarCategoria();
  var forms = document.querySelectorAll('#form-registro-categoria');

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

          var nombre = $('#nombre').val();

          //Se crea un objeto que empaqueta la informacion
          var objData = new FormData();
          objData.append('regNombre', nombre);

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
              alert(response['mensaje']);
              listarCategoria();
            });
          form.reset();
          $('#mycategoria').modal('toggle');
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

          var idCategoria = $('#btnEditarCategoria').attr('idCategoria');
          var nombre = $('#editnombre').val();

          //Se crea un objeto que empaqueta la informacion
          var objData = new FormData();
          objData.append('editCategoria', idCategoria);
          objData.append('editNombre', nombre);

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
              listarCategoria();
              alert(response['mensaje']);
            });

          form.reset();
          $('#editar').modal('toggle');
          form.classList.delete('was-validated');
        }
      },
      false
    );
  });

  function listarCategoria() {
    // se crea la peticion para consultar la informacion
    var objData = new FormData();
    objData.append('listarCategoria', 'OK');

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
        '<button type="button" id="btnEditar" class="btn btn-dark " idCategoria="' +
        item.id +
        '" nombre="' +
        item.nombre +
        '"data-bs-toggle="modal" data-bs-target="#editar"><i class="icofont-edit"></i>              Editar</button>';
      objBotones +=
        '<button type="button" class="btn btn-danger" id="btnEliminar" idCategoria="' +
        item.id +
        '"><i class="icofont-ui-delete"></i>            Eliminar</button>';
      objBotones += '</div>';
      dataSet.push([item.nombre, objBotones]);
    }
    if (tabla != null) {
      $('#tablaCategorias').dataTable().fnDestroy();
    }
    tabla = $('#tablaCategorias').DataTable({
      data: dataSet,
    });
  }

  $('#tablaCategorias').on('click', '#btnEditar', function () {
    var nombre = $(this).attr('nombre');
    $('#editnombre').val(nombre);

    var idCategoria = $(this).attr('idCategoria');
    $('#btnEditarCategoria').attr('idCategoria', idCategoria);
  });

  $('#tablaCategorias').on('click', '#btnEliminar', function () {
    var idCategoria = $(this).attr('idCategoria');

    var objData = new FormData();
    objData.append('idCategoria', idCategoria);

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
        listarCategoria();
      });
  });

});
