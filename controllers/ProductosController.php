<?php

require_once 'models/ProductosModels.php';

class ProductosController {

    public function index() {
        $productos = new ProductosModels();
        $producto = $productos->getRandom(6);
        require_once 'views/productos/productosDestacados.php';
    }

    public function gestionar() {
        $producto = new ProductosModels();
        $productos = $producto->getAll();
        require_once 'views/productos/gestionar.php';
    }

    public function crear() {

        require_once 'views/productos/crear.php';
    }
   public function ver() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new ProductosModels();
            $producto->setId($id);
            $produc = $producto->getOne();
//            var_dump($produc); die(); 
            require_once 'views/productos/ver.php';
        } 
    }
    public function save() {
//        die();
        if ($_POST) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : FALSE;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : FALSE;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : FALSE;
            $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : FALSE;
            $oferta = isset($_POST['oferta']) ? $_POST['oferta'] : FALSE;
            
            if ($nombre && $categoria && $descripcion && $precio && $cantidad) {
                $producto = new ProductosModels();
                $producto->setNombre($nombre);
                $producto->setCategoria_id($categoria);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($cantidad);
                $producto->setOferta($oferta);

                if (isset($_FILES)) {
                    $file = $_FILES['foto'];
                    $filename = $file['name'];
                    $filetype = $file['type'];
//                var_dump($file);                die();
                    if ($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/jpg" || $filetype == "image/tiff" || $filetype == "image/gif") {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }
//                var_dump($file);die();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
//                    var_dump($save); die();                    
                } else {
                    $save = $producto->save();
                }
                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        header("location: " . base_url . "Productos/gestionar");
    }

    public function edit() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new ProductosModels();
            $producto->setId($id);
            $pro = $producto->getOne();
//            var_dump($pro); die(); 
            require_once 'views/productos/crear.php';
        } else {
            header("location : " . base_url . "Productos/gestion");
        }
    }

    public function eliminar() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
//            var_dump($id); die();
            $producto = new ProductosModels();
            $producto->setId($id);
            $delete = $producto->eliminar();
            if ($delete) {
                $_SESSION['delete'] = 'delete';
            } else {
                $_SESSION['delete'] = 'notDelete';
            }
        } else {
            $_SESSION['delete'] = 'notDelete';
        }
        header("location: " . base_url . "Productos/gestionar");
    }

}
