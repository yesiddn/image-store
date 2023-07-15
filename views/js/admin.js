$(function () {
  $('#categorias-btn').click(function () {
    const tablaCategorias = document.querySelector(
      '#tabla-categorias-container'
    );
    const tablaPinturas = document.querySelector('#tabla-pinturas-container');

    if (tablaCategorias.classList.contains('d-none')) {
      tablaCategorias.classList.toggle('d-none');
      tablaPinturas.classList.toggle('d-none');
    }
  });

  $('#pinturas-btn').click(function () {
    const tablaCategorias = document.querySelector(
      '#tabla-categorias-container'
    );
    const tablaPinturas = document.querySelector('#tabla-pinturas-container');

    if (tablaPinturas.classList.contains('d-none')) {
      tablaCategorias.classList.toggle('d-none');
      tablaPinturas.classList.toggle('d-none');
    }
  });

  $('#btn-agregar-pintura').click(function () {
    const selecCategory = document.getElementById('category');
    const editCategory = document.getElementById('edit-category');
    selectCategory(selecCategory);
    selectCategory(editCategory);
  });

  function selectCategory(element) {
    console.log('selectCategory')
    var objData = new FormData();
    objData.append('getCategories', 'OK');
    fetch('control/usuarioControl.php', {
      method: 'POST',
      body: objData,
    })
      .then((response) => response.json())
      .catch((error) => {
        console.log('error: ', error);
      })
      .then((response) => {
        listarCategoriaInForm(response, element);
      });
  }

  function listarCategoriaInForm(response, element) {
    response.forEach((item) => {
      element.innerHTML += `<option value="${item.id}">${item.nombre}</option>`;
    });
  }
});
