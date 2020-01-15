<?php if (isset($cate)): ?>
    <h3 class="w-100 my-5"><?= $cate->nombre ?></h3>
    <?php if ($productos->num_rows == 0): ?>
        <p>No existen productos en esta categoria</p>
    <?Php else: ?>
        <?php while ($produc = $productos->fetch_object()): ?>
        <a href="<?= base_url ?>Productos/ver&id=<?= $produc->id ?>" class="decoration">
                <div class="card col-4 p-3 bg-light border-light" >
                    <?php if ($produc->imagen != NULL): ?>
                        <img class="" height="150" src="<?= base_url ?>uploads/images/<?= $produc->imagen ?>" class="card-img-top w-50 p-3 mx-auto" alt="">
                    <?php else: ?>
                        <img class="" height="150" src="<?= base_url ?>assets/img/camiseta.png" />
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $produc->nombre ?></h5>
                        <p class="card-text"><?= $produc->precio ?></p>
                        <?php $descripcion = $produc->descripcion ?>
                        <p class="card-text  text-dark"><?= substr($descripcion, 0, 60) ?>...</p>
                    </div>
                    <a href="#" class="btn btn-success">Comprar</a>
                </div>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else: ?>
    <h3>Categoria no existe</h3>
<?php endif; ?>
