<h3 class="w-100">Cerar categoria</h3>
<form action="<?= base_url ?>Categorias/save" method="post">
    <div class="form-group">
        <label for="nombre" class="w-100">Nombre de categoria</label>
        <input type="text" name="nombre" placeholder="Ingrese nombre" required class="form-control ">
    </div>
    <input type="submit" value="Guarcar" class="btn btn-success">
</form>