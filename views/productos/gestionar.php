<h1 class="w-100 mb-4">Gestionar productos3</h1>
<div class="w-100">
    <a href="<?= base_url ?>Productos/crear" class="btn btn-success w-25">Crear Producto</a>
</div>
<div class="w-100 mt-3 ">
    <?php if (isset($_SESSION['producto'])): ?>
        <?php if ($_SESSION['producto'] == "complete"): ?>
            <span class="mt-1 btn-success p-2 rounded">Producto registrado correctamente </span>
        <?php elseif ($_SESSION['producto'] == "failed"): ?>
            <span class="mt-1 btn-danger p-2 rounded">Producto no se pudo registrar </span>
        <?php endif; ?>
        <?php Utils::DeleteSession('producto'); ?>  
    <?php endif; ?>

</div>
<div class="w-100 mt-3 ">
    <?php if (isset($_SESSION['delete'])): ?>
        <?php if ($_SESSION['delete'] == "delete"): ?>
            <span class="mt-1 btn-success p-2 rounded">Producto eliminado correctamente </span>
        <?php elseif ($_SESSION['delete'] == "notDelete"): ?>
            <span class="mt-1 btn-danger p-2 rounded">Producto no se pudo eliminar </span>
        <?php endif; ?>
        <?php Utils::DeleteSession('delete'); ?>  
    <?php endif; ?>

</div>
<div class="w-100 d-flex justify-content-center ">
    <table class="table mt-3 w-75 border">
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php while ($pro = $productos->fetch_object()): ?>
            <tr>
                <td><?= $pro->id ?></td>
                <td><?= $pro->nombre ?></td>
                <td><?= $pro->precio ?></td>
                <td><?= $pro->stock ?></td>
                <td>
                    <a href="<?= base_url ?>Productos/edit&id=<?= $pro->id ?>" class="btn btn-success w-100 ">Editar</a>
                    <a href="<?= base_url ?>Productos/eliminar&id=<?= $pro->id ?>" class="btn btn-danger w-100 mt-1">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>