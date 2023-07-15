$(function () {
  var tabla = null;
  lsitarPinturas();
  var formAgregar = document.querySelectorAll('#form-agregar-pintura');

  // agregar pintura
  Array.prototype.slice.call(formAgregar).forEach(function (form) {
    form.addEventListener(
      'submit',
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add('was-validated');
        } else {
          event.preventDefault();
          var nombre = $('#nombre-pintura').val();
          var autor = $('#autor').val();
          var fecha = $('#fecha').val();
          var descripcion = $('#descripcion').val();
          var category = $('#category').val();
          var imagen =
            'https://source.unsplash.com/640x480/?' + $('#imagen').val();

          //Se crea un objeto que empaqueta la informacion
          var objData = new FormData();
          objData.append('regNombrePintura', nombre);
          objData.append('regAutor', autor);
          objData.append('regFecha', fecha);
          objData.append('regDescripcion', descripcion);
          objData.append('regCategory', category);
          objData.append('regUrl', imagen);

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
              lsitarPinturas();
            });
          
          form.reset();
          $('#mypintura').modal('toggle');
          form.classList.delete('was-validated');
        }
      },
      false
    );
  });

  // listar datos en tabla
  function lsitarPinturas() {
    var objData = new FormData();
    objData.append('listarPinturas', 'OK');

    fetch('control/usuarioControl.php', {
      method: 'POST',
      body: objData,
      // este es para capturar el error
    })
      .then((response) => response.json())
      .catch((error) => {
        console.log('error: ', error);
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
        '<button type="button" id="btnEditar" class="btn btn-dark " idPintura="' +
        item.id +
        '" nombre-pintura="' +
        item.nombre +
        '" autor="' +
        item.autor +
        '" fecha="' +
        item.fechaPublicacion +
        '" descripcion="' +
        item.descripcion +
        '" categoria="' +
        item.nombreCategoria +
        '" url="' +
        item.url +
        '" data-bs-toggle="modal" data-bs-target="#editar-pintura"><i class="icofont-edit"></i>              Editar</button>';
      objBotones +=
        '<button type="button" class="btn btn-danger" id="btnEliminar" idPintura="' +
        item.id +
        '"><i class="icofont-ui-delete"></i>            Eliminar</button>';
      objBotones += '</div>';
      dataSet.push([
        item.nombre,
        item.autor,
        item.fechaPublicacion,
        item.descripcion,
        item.nombreCategoria,
        item.url,
        objBotones,
      ]);
    }

    if (tabla != null) {
      $('#tablaPinturas').dataTable().fnDestroy();
    }

    tabla = $('#tablaPinturas').DataTable({
      data: dataSet,
    });
  }

  // editar datos
  $('#tablaPinturas').on('click', '#btnEditar', function () {
    var nombre = $(this).attr('nombre-pintura');
    var autor = $(this).attr('autor');
    var fecha = $(this).attr('fecha');
    var descripcion = $(this).attr('descripcion');
    var categoria = $(this).attr('categoria');
    var url = $(this).attr('url').slice(37);

    $('#edit-nombre-pintura').val(nombre);
    $('#edit-autor').val(autor);
    $('#edit-fecha').val(fecha);
    $('#edit-descripcion').val(descripcion);
    $('#edit-categoria').val(categoria);
    $('#edit-imagen').val(url);

    var idPintura = $(this).attr('idPintura');
    $('#btnEditarPintura').attr('idPintura', idPintura);
  });

  // eliminar datos
  $('#tablaPinturas').on('click', '#btnEliminar', function () {
    var idPintura = $(this).attr('idPintura');

    var objData = new FormData();
    objData.append('idPintura', idPintura);

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
        lsitarPinturas();
      });
  });

  var formEditar = document.querySelectorAll('#form-editar-pintura');
  Array.prototype.slice.call(formEditar).forEach(function (form) {
    form.addEventListener(
      'submit',
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
          form.classList.add('was-validated');
        } else {
          event.preventDefault();
          var idPintura = $(this).attr('idPintura');
          var nombre = $('#edit-nombre-pintura').val();
          var autor = $('#edit-autor').val();
          var fecha = $('#edit-fecha').val();
          var descripcion = $('#edit-descripcion').val();
          var category = $('#edit-category').val();
          var imagen =
            'https://source.unsplash.com/640x480/?' + $('#edit-imagen').val();

          //Se crea un objeto que empaqueta la informacion
          var objData = new FormData();
          objData.append('idPintura', idPintura);
          objData.append('edit-nombre', nombre);
          objData.append('edit-autor', autor);
          objData.append('edit-fecha', fecha);
          objData.append('edit-descripcion', descripcion);
          objData.append('edit-categoria', category);
          objData.append('edit-url', imagen);

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
              lsitarPinturas();
            });

          form.reset();
          $('#editar-pintura').modal('toggle');
          form.classList.delete('was-validated');
        }
      },
      false
    );
  });
});
