<div class="container mt-4">
    <h1 class="mb-3">Administrador</h1>

    <button type="button" class="btn btn-dark me-3" id="categorias-btn">Categorias</button>
    <button type="button" class="btn btn-dark" id="pinturas-btn">Pinturas</button>
    
    <div class="container" id="tabla-categorias-container">
        <div class="container mt-3">
            <h2 class="mb-3">Categorias</h2>
            <button type="button" class="btn btn-dark">Nuevo</button>
            <table id="tabla-categorias" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="container d-none" id="tabla-pinturas-container">
            <div class="container mt-3">
                <h2 class="mb-3">Nuevo</h2>
                <button type="button" class="btn btn-dark">Pinturas</button>
            <table id="tabla-pinturas" class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Autor</th>
                        <th>Fecha de publicación</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>


</div>