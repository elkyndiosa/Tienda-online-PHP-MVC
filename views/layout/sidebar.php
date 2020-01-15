<div class="d-flex ">

    <aside class="w-25 bg-light mt-3 p-3 shadow" >
        <?php if (!isset($_SESSION['identity'])): ?>
            <form action="<?= base_url ?>Usuarios/login" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Ingrese email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Ingrese password" name="password">
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100">Entrar</button>
                <a href="<?= base_url ?>usuarios/registrar" class="btn btn-warning text-dark mt-1 mb-3 w-100">Registrarse</a>

            </form>
        <?php else : ?>
            <h4 class="border-bottom mb-3 pb-3"> Hola, <?= $_SESSION['identity']->nombre ?> <?= $_SESSION['identity']->apellido ?></h4>
        <?php endif; ?>
        <div class="mt-3">
            <h3>Mi carrito</h3>
            <?php $stats = Utils::statsCarrito() ?>
            
            <a href="<?= base_url ?>Carrito/index" class="btn btn-outline-info text-dark w-100 mt-1">Productos (<?=$stats['cantidad']?>)</a>
            <a href="<?= base_url ?>Carrito/index" class="btn btn-outline-info text-dark w-100 mt-1">Total: <?=$stats['total']?><a>
            <a href="<?= base_url ?>Carrito/index" class="btn btn-outline-info text-dark w-100 mt-1">Ver mi carrito</a>
        </div>
        <div class="mt-3">
            
            <?php if (isset($_SESSION['admin'])): ?>
            <h3>Mis opciones</h3>
                <a href="<?= base_url ?>categorias/index" class="btn btn-outline-success text-dark w-100 mt-1">Gestionar categorias</a>
                <a href="<?= base_url ?>productos/gestionar" class="btn btn-outline-success text-dark w-100 my-1">Gestionar productos</a>
                <a href="<?=base_url?>Pedidos/gestionar_pedidos" class="btn btn-outline-success text-dark w-100 my-1">Gestionar pedidos</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])): ?>
                <h3>Mis opciones</h3>
                <a href="<?=base_url?>Pedidos/mis_pedidos" class="btn btn-outline-success text-dark w-100 my-1">Mis pedidos</a>
                <a href="<?= base_url ?>usuarios/logout" class="btn btn-outline-success text-dark w-100 my-1">Cerrar sesion</a>
            <?php endif; ?>

        </div>
    </aside>
    <div class="w-75 bg-light mt-3 p-3 pl-4 border-left shadow">
        <div class="row d-flex justify-content-around text-center">