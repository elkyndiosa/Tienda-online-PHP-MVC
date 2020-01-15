<?php if (isset($_SESSION['identity'])): ?>
    <?php if (isset($_SESSION['carrito'])): ?>

        <h3 class="w-100"> Finalizar pedido</h3>
        <?php echo isset($_SESSION['errores']) ? Utils::ShowError('general') : '' ?>
        <form action="<?= base_url ?>Pedidos/save" method="post" class="d-flex justify-content-around flex-wrap text-left mt-5">
            <div class="form-group mx-2 col-5">
                <label for="departamento">Departamento: </label>
                <input type="text" name="departamento" placeholder="Departamento" required class="form-control" >
                <?php echo isset($_SESSION['errores']) ? Utils::ShowError('departamento') : '' ?>
            </div>
            <div class="form-group mx-2 col-5">
                <label for="municipio">Municipio: </label>
                <input type="text" name="municipio" placeholder="Municipio" required class="form-control" >
                <?php echo isset($_SESSION['errores']) ? Utils::ShowError('municipio') : '' ?>

            </div>
            <div class="form-group mx-2 col-8">
                <label for="direccion">Direccion: </label>
                <input type="text" name="direccion" placeholder="Direccion" required class="form-control" >
                <?php echo isset($_SESSION['errores']) ? Utils::ShowError('direccion') : '' ?>

            </div>

            <input type="submit" value="Confirmar " class="btn btn-success col-4">
            <?php Utils::DeleteSession('errores') ?>
        </form>
        <a  class="w-100" href="<?= base_url ?>Carrito/index">Ver informacion del pedido completo</a>
    <?php else: ?>
        <h3 class="w-100"> Debes agregar algun producto al carrito</h3>
        <p class="w-100">Ve al inicio de la pagina y agrega algun producto al carrito <a href="<?= base_url ?>">aqui</a></p>
    <?php endif; ?>
<?php else: ?>
    <h3 class="w-100"> Debes registrarte para finalizar pedido</h3>
    <p class="w-100">Regitrate y termnina tu pedido </p>
    <p class="w-100">Registrate <a href="<?= base_url ?>Usuarios/registrar">aqui</a></p>
<?php endif; ?>
