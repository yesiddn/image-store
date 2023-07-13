$(function () {

  $("#categorias-btn").click(function () {
    const tablaCategorias = document.querySelector('#tabla-categorias-container');
    const tablaPinturas = document.querySelector('#tabla-pinturas-container');

    if (tablaCategorias.classList.contains('d-none')) {
      tablaCategorias.classList.toggle('d-none');
      tablaPinturas.classList.toggle('d-none');
    }
  });

  $("#pinturas-btn").click(function () {
    const tablaCategorias = document.querySelector('#tabla-categorias-container');
    const tablaPinturas = document.querySelector('#tabla-pinturas-container');

    if (tablaPinturas.classList.contains('d-none')) {
      tablaCategorias.classList.toggle('d-none');
      tablaPinturas.classList.toggle('d-none');
    }
  });
})


