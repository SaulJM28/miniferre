<section id="page-content-wrapper" class=" page-content-wrapper container-fluid">
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?= $title; ?> producto</h3>
                    <hr class="border  border-2 opacity-50">
                    <div class="alert alert-warning" role="alert">
                        <strong>¡Alerta!</strong> Los campos con <span class="text-danger">*</span> son de caracter
                        obligatorio
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <form action="<?= $action ?>" method="POST" id="form">
                        <div class="row gap-3">
                            <?php  if(isset($product)) : ?>
                            <input type="text" name="product" id = "product" value="<?= isset($product) ? $product->id : '' ; ?>">
                            <?php endif; ?>
                            <div class="col-md-2">
                                <label for="txtCode" class="label-control">Código</label>
                                <input type="text" name="txtCode" id="txtCode" class="form-control form-control-sm" value="<?= isset($product) ? $product->code : '' ; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="" class="label-control">Nombre</label>
                                <input type="text" name="txtName" id="txtName" class="form-control form-control-sm" value="<?= isset($product) ? $product->name : '' ; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="txtCategory" class="label-control">Categoria</label>
                                <input type="text" name="txtCategory" id="txtCategory" class="form-control form-control-sm" value="<?= isset($product) ? $product->category : '' ; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="txtBrand" class="label-control">Marca</label>
                                <input type="text" name="txtBrand" id="txtBrand" class="form-control form-control-sm" value="<?= isset($product) ? $product->brand : '' ; ?>">
                            </div>
                        </div>
                        <div class="row gap-3">
                            <div class="col-md-6">
                                <label for="txtDescription" class="label-control">Descripción</label>
                                <textarea class="form-control form-control-sm" name="txtDescription" id="txtDescription" rows="3" ><?= isset($product) ? $product->description : '' ; ?></textarea>
                            </div>
                        </div>
                       
                        <div class="row mt-3">
                            <div class="col-md-12 d-flex justify-content-end gap-3">
                                <a href="<?= base_url('productos') ?>" class="btn btn-sm btn-danger">Cancelar</a>
                                <button class="btn btn-sm btn-success">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>