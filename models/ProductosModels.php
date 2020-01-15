<?php

class ProductosModels{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    
    function __construct() {
        $this->db = database::connect();
    }
            
    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll(){
        $sql = "SELECT * FROM productos ORDER BY id DESC; ";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getAllCategory(){
        $sql = "SELECT p.*, c.nombre AS catNombre FROM productos p "
                . "INNER JOIN categorias c ON c.id = p.categoria_id "
                . "WHERE p.categoria_id = {$this->getCategoria_id()} "
                . "ORDER BY RAND(); ";
//        var_dump($sql);
        $result = $this->db->query($sql);
//        var_dump($this->db->error);
        return $result;
    }
    public function getRandom($limit){
        $sql = "SELECT * FROM productos WHERE stock > 0 ORDER BY RAND() LIMIT {$limit}; ";
        $result = $this->db->query($sql);
        return $result;
    }
    public function getOne(){
        $sql = "SELECT * FROM productos WHERE id = {$this->getId()}; ";
        $result = $this->db->query($sql);
        return $result->fetch_object();
    }
    public function save(){
        $sql = "INSERT INTO productos VALUES (null, {$this->getCategoria_id()}, '{$this->getNombre()}', '{$this->getDescripcion()}', {$this->getPrecio()} , {$this->getStock()}, null, CURDATE(), '{$this->getImagen()}');";
//        var_dump($sql);die();
        $guardar = $this->db->query($sql);
        $result = FALSE;
        if($guardar){
            $result = TRUE;
        }
        return $result;
    }
    public function eliminar() {
        $sql = "DELETE FROM productos WHERE id = {$this->getId()} ;";
        $eliminar = $this->db->query($sql);
        
        $result = FALSE;
        if($eliminar){
            $result = TRUE;
        }
        return $result;
    }
    public function edit() {
        $stock = $this->getStock();
        if($stock == '0'){
            $stock = 0;
        }
//        var_dump($stock);die();
        $sql = "UPDATE productos SET nombre = '{$this->getNombre()}', descripcion = '{$this->getDescripcion()}', precio = {$this->getPrecio()} , stock = {$stock}, categoria_id = {$this->getCategoria_id()} ";
        if($this->getImagen() != NULL){
            $sql .= ", imagen = '{$this->getImagen()}'";
        }
        $sql .=" WHERE id = {$this->getId()};";
//        var_dump($sql);
        $editar = $this->db->query($sql);
        $result = FALSE;
        if($editar){
            $result= TRUE;
        }
//        var_dump($this->db->error);die();
        return $result;
//        var_dump($sql); die();
        }
}
