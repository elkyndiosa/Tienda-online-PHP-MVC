<?php if (isset($_GET['id'])): ?>
    <h3 class="w-100 mb-3">Editar producto <?= $pro->nombre ?></h3>
    <?php $url_action = base_url . 'Productos/save&id=' . $pro->id ?>
<?php else: ?>
    <h3 class="w-100 mb-3">Agregar nuevo producto</h3>
    <?php $url_action = base_url . 'Productos/save' ?>
<?php endif; ?>
<form action="<?= $url_action ?>" enctype="multipart/form-data" method="post" class="row d-flex justify-content-around">
    <div class="form-group col-6">
        <label for="nombre" class="w-100">Nombre de producto</label>
        <input type="text" name="nombre" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : '' ?>" placeholder="Ingrese nombre" required class="form-control ">
    </div>
    <div class="form-group col-6">
        <label for="categoria" class="w-100">Selecione categoria</label>
        <select name="categoria" class="form-control ">
            <?php $categoriaSelect = Utils::showCategorias() ?>
            <?php while ($cat = $categoriaSelect->fetch_object()): ?>
                <option  value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ?>><?= $cat->nombre ?></option>
                <?php var_dump($cat->id, $pro->id) ?>
            <?php endwhile; ?> 
        </select>
    </div>
    <div class="form-group col-6">
        <label for="descripcion" class="w-100">Describa el producto</label>
        <textarea type="text" name="descripcion" placeholder="Describe aqui" required class="form-control "><?= isset($pro) && is_object($pro) ? $pro->descripcion : '' ?></textarea>
    </div>
    <div class="form-group col-6">
        <label for="precio" class="w-100">Precio</label>
        <input type="number" value="<?= isset($pro) && is_object($pro) ? $pro->precio : '' ?>" name="precio" step="0.01" placeholder="Ingrese precio" required class="form-control ">
    </div>
    <div class="form-group col-6">
        <label for="stock" class="w-100">Cantidad</label>
        <input type="number" value="<?= isset($pro) && is_object($pro) ? $pro->stock : '' ?>" name="cantidad" placeholder="Ingrese cantidad" required class="form-control ">
    </div>
    <div class="form-group col-6">
        <label for="oferta" class="w-100">Oferta</label>
        <input type="text" value="<?= isset($pro) && is_object($pro) ? $pro->oferta : '' ?>" name="oferta"  class="form-control ">
    </div>
    <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
        <div class="w-100">
            <img src="<?= base_url ?>uploads/images/<?= $pro->imagen ?>" alt="" width="100">
        </div>
    <?php endif; ?>
    <div class="form-group col-6">
        <label for="foto" class="w-100">Ingresar una imagen</label>
        <input type="file" name="foto"  class="form-control ">
    </div>
    <input type="submit" value="Guarcar" class="btn btn-success col-8">
</form>