<h3 class="w-100">Carrito</h3>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>
    <table class="table">
        <tr class="table-header">
            <th>imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>opciones</th>
        </tr>
        <?php
        foreach ($_SESSION['carrito'] as $indice => $elemento) : {
                $producto = $elemento['producto'];
            }
            ?>
            <tr class="table-body">
                <?php if ($producto->imagen != NULL): ?>
                    <td><img  src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" width="80" alt=""></td>
                <?php else: ?>
                    <td><img class="" width="80" src="<?= base_url ?>assets/img/camiseta.png" /></td>
                <?php endif; ?>
        <!--        <td><img src="<?= base_url ?>uploads/images/<?= $producto->imagen ?>" alt="" width="80"</td>-->
                <td> <a href="<?= base_url ?>Productos/ver&id=<?= $producto->id ?>"> <?= $producto->nombre ?></a></td>
                <td><?= $producto->precio ?></td>
                <td>
                    <p class="w-100"><?= $elemento['unidades'] ?></p>
                    <a href="<?= base_url ?>Carrito/up&index=<?=$indice?>"  class="btn btn-success w-25">+</a>
                    <a href="<?= base_url ?>Carrito/down&index=<?=$indice?>"  class="btn btn-success w-25">-</a>

                </td>
                <td> <a href="<?= base_url ?>Carrito/remove&index=<?=$indice?>" class="btn btn-danger">Eliminar</a></td>

            </tr>
        <?php endforeach; ?>
    </table>
    <?php $stats = Utils::statsCarrito() ?>
    <div class="row">
        <div class="w-100 col-6 d-flex flex-wrap justify-content-start mt-5">
            <a href="<?= base_url ?>Carrito/delete" class="col-6 btn btn-outline-danger h-50"><p class="mb-2"> Eliminar carrito</p></a>
        </div>
        <div class="w-100 col-6 d-flex flex-wrap justify-content-end">
            <h3 class="col-12 ">Total de compra: <?= $stats['total'] ?></h3>
            <a href="<?= base_url ?>Pedidos/hacer" class="col-12 btn btn-outline-primary ">Hacer pedido</a>
        </div>
    </div>
<?php else: ?>
    <p>No tienes productos en el carrito</p>
<?php endif; ?>