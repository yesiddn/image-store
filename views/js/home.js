$(function () {
  var objData = new FormData();
  objData.append('getCategories', 'OK');
  const selecCategory = document.getElementById('select-category');

  //este es para el envio de datos
  fetch('control/usuarioControl.php', {
    method: 'POST',
    body: objData,
  })
    .then((response) => response.json())
    .catch((error) => {
      console.log('error: ', error);
    })
    .then((response) => {
      listarCategoria(response);
    });

  function listarCategoria(response) {
    response.forEach((item) => {
      selecCategory.innerHTML += `<option value="${item.id}">${item.nombre}</option>`;
    });
  }

  // traer las imagenes de la categoria seleccionada
  function getPictures(idCategory) {
    var objData = new FormData();
    objData.append('getPictures', idCategory);

    fetch('control/usuarioControl.php', {
      method: 'POST',
      body: objData,
    })
      .then((response) => response.json())
      .catch((error) => {
        console.log('error: ', error);
      })
      .then((response) => {
        console.log(response);
        showPictures(response);
      });
  }

  function showPictures(response) {
    const containerHome = document.getElementById('home');
    const row = document.createElement('div');
    row.classList.add('row');


    response.forEach((item, index) => {
      if (index % 4 == 0) {
        containerHome.appendChild(row);
        row.innerHTML = '';
      }

      row.innerHTML += `
        <div class="col-md-3 mb-4">
          <div class="card pt-3 px-3">
            <img class="card-img-top rounded-3" src="${item.pictureUrl}" alt="${item.pictureName}">
            <div class="card-body px-0">
              <h5 class="card-title">${item.pictureName}</h5>
              <p class="card-text">Autor: ${item.pictureAuthor}</p>
              <p class="card-text">Fecha publicación: ${item.pictureDate}</p>
              <p class="card-text">${item.pictureDescription}</p>
            </div>
          </div>
        </div>
      `;
    });
  }

  selecCategory.addEventListener('change', (event) => {
    getPictures(event.target.value);
  });
});
