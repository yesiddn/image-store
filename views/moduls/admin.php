<div class="container mt-4">
  <h1 class="mb-3">Administrador</h1>

  <button type="button" class="btn btn-dark me-3" id="categorias-btn">Categorias</button>
  <button type="button" class="btn btn-dark" id="pinturas-btn">Pinturas</button>

  <div class="container" id="tabla-categorias-container">
    <div class="container mt-3">
      <h2 class="mb-3">Categorias</h2>

      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#mycategoria">Agregar categoria</button>

      <table id="tablaCategorias" class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

  <div class="container d-none" id="tabla-pinturas-container">
    <div class="container mt-3">
      <h2 class="mb-3" style="font-family: 'Cinzel', serif;">Pinturas</h2>
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#mypintura">Agregar pintura</button>
      <table id="tablaPinturas" class="table table-striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Fecha de publicación</th>
            <th>Descripción</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal registro categoria-->
  <div class="modal" id="mycategoria">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Agregar categoria</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form id="formRegistro" action="" method="post" class="needs-validation" novalidate>
            <div class="mb-3 mt-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre de la categria" name="nombre" required>
              <div class="valid-feedback">Campo válido.</div>
              <div class="invalid-feedback">Por favor llene este campo.</div>
            </div>

            <button type="submit" class="btn btn-primary">Agregar categoria</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit categoria-->

<div class="modal" id="editar">

  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar categoria</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="formEditar" action="" method="post" class="needs-validation" novalidate>

          <div class="mb-3 mt-3">
            <label for="editnombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="editnombre" placeholder="Ingrese el nombre de la categoria" name="editnombre" required>
            <div class="valid-feedback">Campo valido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>
          </div>

          <button type="submit" id="btnEditarCategoria" idCategoria="" class="btn btn-primary">Cambiar categoria</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal registro pintura-->
<div class="modal" id="mypintura">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar pintura</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="formRegistro" action="" method="post" class="needs-validation" novalidate>
          <div class="mb-3 mt-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese " name="nombre" required>
            <div class="valid-feedback">Campo válido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>
          </div>
          <div class="mb-3">
            <label for="autor" class="form-label">Autor:</label>
            <input type="text" class="form-control" id="autor" placeholder="Ingrese el autor" name="autor" required>
            <div class="valid-feedback">Campo válido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>
          </div>
          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" class="form-control" id="fecha" placeholder="Ingrese su fecha" name="fecha" required>
            <div class="valid-feedback">Campo válido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" placeholder="Ingrese la descripcion de la pintura" name="descripcion" required>
            <div class="valid-feedback">Campo válido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>categoria
          </div>
          <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" class="form-control" id="categoria" placeholder="Ingrese la categoria" name="categoria" required>
            <div class="valid-feedback">Campo válido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>
          </div>
          <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (tema):</label>
            <input type="text" class="form-control" id="imagen" placeholder="Ingrese una palabra referente a la imagen" name="imagen" required>
            <div class="valid-feedback">Campo válido.</div>
            <div class="invalid-feedback">Por favor llene este campo.</div>
          </div>
          
          <button type="submit" class="btn btn-primary">Registrar usuario</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>