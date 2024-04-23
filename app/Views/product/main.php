<section id="page-content-wrapper" class=" page-content-wrapper container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Productos</h3>
                    <hr class="border  border-2 opacity-50">
                    <p class="card-text">Bienvenido al módulo de gestión de productos, diseñado para facilitar la
                        administración de productos: Crear, Leer, Actualizar y Eliminar información sobre tus productos.
                        Con esta herramienta, podrás mantener un registro organizado y actualizado de todos tus
                        productos, optimizando así la gestión de tu inventario. Simplifica tus tareas diarias y toma
                        decisiones informadas con nuestro módulo de gestión de productos.</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button class="btn btn-sm btn-primary">Agregar</button>
                        </div>
                    </div>
                    <div class="row table-responsive">
                        <?= view("product/table"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>