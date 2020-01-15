<div class="row" >
    <?php if ($produc->imagen != NULL): ?>
        <div class="col-6">
            <img  src="<?= base_url ?>uploads/images/<?= $produc->imagen ?>" class="w-100" alt="">
        </div>
    <?php else: ?>
        <img class="" width="450" src="<?= base_url ?>assets/img/camiseta.png" />
    <?php endif; ?>
    <div class="col-6   ">
        <div class="row">
            <h5 class="col-12 text-left"><?= $produc->nombre ?></h5>
            <p class="col-12 text-left"><?= $produc->descripcion ?></p>
            <p class="col-12 text-left">Disponibilidad: <?= $produc->stock ?></p>
            <p class="col-12 text-left">$ <?= $produc->precio ?></p>
            <a href="<?=base_url?>Carrito/add&id=<?=$produc->id?>" class="btn btn-success w-50">Comprar</a>
        </div>
    </div>
</div>