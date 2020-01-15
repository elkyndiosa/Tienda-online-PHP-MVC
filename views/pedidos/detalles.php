<h3 class="w-100">Detalles de pedido</h3>
<?php if (isset($_SESSION['admin'])): ?>
    <h4 class="w-100">Cambiar estado del pedido</h4>
    <div class="w-100 ">
        <form action="<?= base_url ?>Pedidos/edit" method="post" class=" row d-flex justify-content-center">
            <input type="hidden" name="id" value="<?= $pedido->id ?>" >
            <div class="form-group col-7">
                <select name="estado" id="" class="form-control w-100">
                    <option value="confirmed" <?=$pedido->estado == "confirmed" ? 'selected' : ''?>>Pendiente</option>
                    <option value="preparation" <?=$pedido->estado == "preparation" ? 'selected' : ''?>>En proceso</option>
                    <option value="ready" <?=$pedido->estado == "ready" ? 'selected' : ''?>>Listo para enviar</option>
                    <option value="sended" <?=$pedido->estado == "sended" ? 'selected' : ''?>>Enviado</option>
                </select>
            </div>

            <input type="submit" value="Cambiar estado" class="btn btn-success col-6">
        </form>
    </div>
<?php endif; ?>

<h4 class="w-100">Informacion del envio</h4>
<p class="w-100 text-left font-weight-bold">Departamento: <span class="font-weight-normal"><?= $pedido->departamento ?></span></p>
<p class="w-100 text-left font-weight-bold">Ciudad: <span class="font-weight-normal"><?= $pedido->municipio ?></span> </p>
<p class="w-100 text-left font-weight-bold">Direccion: <span class="font-weight-normal"><?= $pedido->direccion ?></span> </p>
<h4>Informacion del pedido</h4>
<p class="w-100 text-left font-weight-bold">Estado: <span class="font-weight-normal"><?= Utils::showEstado($pedido->estado)?></span></p>
<p class="w-100 text-left font-weight-bold">Id pedido: <span class="font-weight-normal"><?= $pedido->id ?></span></p>
<p class="w-100 text-left font-weight-bold">Total a pagar: <span class="font-weight-normal"><?= $pedido->costo ?> $</span></p>
<p class="w-100 text-left font-weight-bold">Productos:  </p>

<table class="table">
    <tr class="table-header">
        <th>imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php
    while ($productosPedido = $producto->fetch_object()) :?>
        <tr class="table-body">
            <?php if ($productosPedido->imagen != NULL): ?>
                <td><img  src="<?= base_url ?>uploads/images/<?= $productosPedido->imagen ?>" width="80" alt=""></td>
            <?php else: ?>
                <td><img class="" width="80" src="<?= base_url ?>assets/img/camiseta.png" /></td>
            <?php endif; ?>
    <!--        <td><img src="<?= base_url ?>uploads/images/<?= $productosPedido->imagen ?>" alt="" width="80"</td>-->
            <td> <a href="<?= base_url ?>Productos/ver&id=<?= $productosPedido->id ?>"> <?= $productosPedido->nombre ?></a></td>
            <td><?= $productosPedido->precio ?></td>
            <td><?= $productosPedido->precio ?></td>
        </tr>
    <?php endwhile; ?>
</table>