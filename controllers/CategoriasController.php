<?php
require_once 'models/CategoriasModels.php';
require_once 'models/ProductosModels.php';

class CategoriasController {
    public function index() {
        Utils::isAdmin();
        $categoria = new CategoriasModels;
        $categorias = $categoria->getAll();
        require_once 'views/categorias/categorias.php';
    }
    public function crear() {
        Utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }
    public function save() {
        $crear = new CategoriasModels;
        $crear->save();
//        var_dump($crear->save());die();
header("location: " . base_url . "Categorias/index");
    }
     public function ver() {
        if(isset($_GET['id'])){
            //consigueindo categoria
            $id = $_GET['id'];
            $categoria = new CategoriasModels();
            $categoria->setId($id);
            $cate = $categoria->getOne();
            //consiguiendo productos
            $productos = new ProductosModels();
            $productos->setCategoria_id($id);
            $productos = $productos->getAllCategory();
           
        }
        require_once 'views/categorias/ver.php';
    }
}