<?php if (isset($_SESSION['admin'])): ?>
    <h3 class="w-100">Gestionar pedidos</h3>
<?php else: ?>
    <h3 class="w-100">Mis pedidos</h3>
<?php endif; ?>

<?php if ($pedidos->num_rows != 0): ?>

    <table class="table">
        <tr class="table-header">
            <th>Id pedido</th>
            <th>Costo</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
        <?php while ($ped = $pedidos->fetch_object()): ?>

            <tr class="table-body">
                <td><a href="<?= base_url ?>pedidos/detalles&id=<?= $ped->id ?>"><?= $ped->id ?> </a></td>
                <td><a href="<?= base_url ?>pedidos/detalles&id=<?= $ped->id ?>"><?= $ped->costo ?> $</a></td>
                <td><a href="<?= base_url ?>pedidos/detalles&id=<?= $ped->id ?>"><?= $ped->fecha ?></a></td>
                <td><a href="<?= base_url ?>pedidos/detalles&id=<?= $ped->id ?>"><?= Utils::showEstado($ped->estado) ?></a></td>
            </tr>

        <?php endwhile; ?>
    </table>

<?php else: ?>
    <p>No tienes historial de pedidos</p>
<?php endif; ?>