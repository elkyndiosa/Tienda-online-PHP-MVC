<?php

require_once 'models/ProductosModels.php';

class CarritoController {

    public function index() {
        require_once 'views/carrito/ver.php';
    }

    public function add() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            header('location: ' . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
//                var_dump($elemento);
                if ($elemento['id_producto'] == $id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
//                    var_dump($_SESSION['carrito']);
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            $producto = new ProductosModels();
            $producto->setId($id);
            $producto = $producto->getOne();
            if (isset($producto) && is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    'precio' => $producto->precio,
                    'unidades' => 1,
                    'producto' => $producto
                );
//                var_dump($_SESSION['carrito']);
            }
        }
        header('location: ' . base_url . 'Carrito/index');
    }

    public function remove() {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];

            unset($_SESSION['carrito'][$index]);
            header('location: ' . base_url . 'Carrito/index');
        }
    }
    public function up() {
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;
            header('location: ' . base_url . 'Carrito/index');
        }
    }
    public function down() {
        if(isset($_GET['index'])){
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;
            if($_SESSION['carrito'][$index]['unidades'] == 0){
                unset($_SESSION['carrito'][$index]);
            }
            header('location: ' . base_url . 'Carrito/index');
        }
    }

    public function delete() {
        unset($_SESSION['carrito']);
        header('location: ' . base_url . 'Carrito/index');
    }

}
