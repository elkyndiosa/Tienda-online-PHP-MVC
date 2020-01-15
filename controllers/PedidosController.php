<?php

require_once 'models/pedidosModels.php';
require_once 'models/productosModels.php';

class PedidosController {

    public function hacer() {
        require_once 'views/pedidos/hacer.php';
    }

    public function save() {
        if (isset($_POST) && isset($_SESSION['carrito'])) {
            $usuario_id = $_SESSION['identity']->id;
            $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : FALSE;
            $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : FALSE;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : FALSE;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($departamento && $municipio && $direccion) {
                $pedido = new Pedidos();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setDepartamento($departamento);
                $pedido->setMunicipio($municipio);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                $pedidoSave = $pedido->request();
                $id_pedido = $pedido->getIdLastPedido();
                $lineaPedidoSave = $pedido->saveLineaPedido();


                if ($pedidoSave && $lineaPedidoSave) {
                    $_SESSION['pedido'] = 'confirmet';
                    if (isset($_SESSION['carrito'])) {
                        unset($_SESSION['carrito']);
                    }
                    header('location: ' . base_url . 'Pedidos/confirmet&id=' . $id_pedido);
                } else {
                    $_SESSION['pedido'] = 'failet';
                }
            } else {
                $_SESSION['pedido'] = 'failet';
            }
        } else {
            $_SESSION['errores']['general'];
            header('location: ' . base_url . 'Pedidos/hacer');
        }
    }

    public function confirmet() {
        if (isset($_SESSION['identity'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $usuario_id = $_SESSION['identity']->id;
                $pedido = new Pedidos();
                $pedido->setUsuario_id($usuario_id);
                $pedido = $pedido->getByUser();

                $linea_pedido = new Pedidos();
                $linea_pedido->setId($id);
                $producto = $linea_pedido->getProductosByPedido();
//                var_dump($producto->fetch_object());
//                var_dump($pedido);
//                die();
                require_once 'views/pedidos/confirmet.php';
            }
        }
    }

    public function detalles() {
        if (isset($_GET['id'])) {
            //sacamos el pedido
            $id = $_GET['id'];
            $pedido = new Pedidos();
            $pedido->setId($id);
            $pedido = $pedido->getOne();
//            var_dump($pedido);
            //sacamos los productos por cada pedido

            $linea_pedido = new Pedidos();
            $linea_pedido->setId($id);
            $producto = $linea_pedido->getProductosByPedido();
            require_once 'views/pedidos/detalles.php';
        }
    }

    public function mis_pedidos() {
        if (isset($_SESSION['identity'])) {
            $usuario_id = $_SESSION['identity']->id;
            $pedidos = new Pedidos();
            $pedidos->setUsuario_id($usuario_id);
            $pedidos = $pedidos->getAllByUser();
//            var_dump($pedidos);
            require_once 'views/pedidos/mis_pedidos.php';
        } else {
            header('location' . base_url);
        }
    }

    public function gestionar_pedidos() {
        Utils::isAdmin();
        $pedido = new Pedidos();
        $pedidos = $pedido->getAll();
        require_once 'views/pedidos/mis_pedidos.php';
    }

    public function edit() {
        Utils::isAdmin();

        if (isset($_POST['id']) && isset($_POST['estado'])) {
            //recogemos los datos del formulario
            $id = $_POST['id'];
            $estado = $_POST['estado'];
            //creamos y ejecutamos las funciones
            $pedido = new Pedidos();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();
            header('location: ' . base_url . 'pedidos/detalles&id=' . $id);
        }
        header('location: ' . base_url . 'pedidos/detalles&id=' . $id);
    }

}
