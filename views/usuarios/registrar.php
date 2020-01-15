<h2 class="w-100">Registrarse</h2>
<?php
if (isset($_SESSION['register'])):
    if ($_SESSION['register'] == 'complete'):
        ?>
        <span class="mt-3 btn-success p-2 rounded">Usuario registrado correctamente </span>
    <?php elseif ($_SESSION['register'] == 'failed'): ?>
        <span class="mt-3 btn-danger p-2 rounded">Usuario no se pudo registrar </span>
        <?php
    endif;
endif;
?>
<?php Utils::DeleteSession('register') ?>
<form action="<?= base_url ?>usuarios/save" method="post" class="d-flex justify-content-around flex-wrap text-left mt-5">
    <div class="form-group mx-2 col-5">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" placeholder="Nombre" required class="form-control" >
<?php echo isset($_SESSION['errores']) ? Utils::ShowError('nombre') : '' ?>
    </div>
    <div class="form-group mx-2 col-5">
        <label for="apellido">Apellido: </label>
        <input type="text" name="apellido" placeholder="Apellido" required class="form-control" >
<?php echo isset($_SESSION['errores']) ? Utils::ShowError('apellido') : '' ?>

    </div>
    <div class="form-group mx-2 col-5">
        <label for="correo">Correo: </label>
        <input type="email" name="correo" placeholder="Correo" required class="form-control" >
<?php echo isset($_SESSION['errores']) ? Utils::ShowError('correo') : '' ?>

    </div>
    <div class="form-group mx-2 col-5">
        <label for="contraseña">Contraseña: </label>
        <input type="password" name="contraseña" placeholder="contraseña" required class="form-control" >
<?php echo isset($_SESSION['errores']) ? Utils::ShowError('contraseña') : '' ?>

    </div>
    <input type="submit" value="Guardar " class="btn btn-success col-6">
    <?php Utils::DeleteSession('errores')?>
</form>