<?php
class CategoriasModels {
    private $nombre;
    private $id;
    private $db;
    public function __construct() {
        $this->db = database::connect();
    }
    function getNombre() {
        return $this->nombre;
    }
    function getId() {
        return $this->id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setId($id) {
        $this->id = $id;
    }
    
    public function save() {
        if (isset($_POST) && isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
            $sql = "INSERT INTO categorias VALUES (NULL, '$nombre'); ";
            $guardar =$this->db->query($sql);
            $result = FALSE;
            if($guardar){
                $result = TRUE;
            }
             return $result;
        }
    }
    public function getAll() {
        $sql = "SELECT * FROM categorias ORDER BY id ASC;";
        
        $buscar = $this->db->query($sql);
        return $buscar;
    }
    public function getOne() {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()};";
        
        $categoria = $this->db->query($sql);
        return $categoria->fetch_object();
    }
}