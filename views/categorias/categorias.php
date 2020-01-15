<h3 class="w-100">Gestionar categorias</h3>
<div class="w-100">
    <a href="<?= base_url ?>Categorias/crear" class="btn btn-success w-25">Crear categoria</a>
</div>
<table class="table mt-3 w-50">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?PHP while ($cat = $categorias->fetch_object()): ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td><?= $cat->nombre; ?></td>
        </tr>
    <?php endwhile; ?>
</table>