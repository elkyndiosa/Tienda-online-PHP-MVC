<?php

class Pedidos {

    private $id;
    private $usuario_id;
    private $departamento;
    private $municipio;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct() {
        $this->db = database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    function setMunicipio($municipio) {
        $this->municipio = $municipio;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function request() {
//        var_dump($id_user); die();
        $sql = " INSERT INTO pedidos VALUES (NULL, {$this->getUsuario_id()}, '{$this->getDepartamento()}', '{$this->municipio}', '{$this->direccion}', {$this->getCoste()}, 'confirmed', CURDATE(), CURTIME()) ;";
        $guardar = $this->db->query($sql);
        $result = false;
        if ($guardar) {
            $result = TRUE;
        }
        return $result;
    }

    function saveLineaPedido() {
        $sql = " SELECT LAST_INSERT_ID() AS pedido; ";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "INSERT INTO linea_pedidos VALUES (NULL, {$pedido_id}, {$producto->id}, {$elemento['unidades']});";
//            var_dump($insert);
            $save = $this->db->query($insert);
            $update = "UPDATE productos SET stock = stock - {$elemento['unidades']} WHERE id = {$producto->id};";
//            var_dump($update);die();
            $up = $this->db->query($update);
        }
//            var_dump($r);
        $result = false;
        if ($save) {
            $result = TRUE;
        }
        return $result;
    }

    function getIdLastPedido() {
        $sql = " SELECT LAST_INSERT_ID() AS pedido; ";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        return $pedido_id;
    }

    function getByUser() {
        $sql = " SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1; ";
        $pedido = $this->db->query($sql);
        $pedido = $pedido->fetch_object();
        return $pedido;
    }

    function getAllByUser() {
        $sql = " SELECT * FROM pedidos WHERE usuario_id = {$this->getUsuario_id()} ORDER BY id DESC ; ";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    function getOne() {
        $sql = " SELECT * FROM pedidos WHERE id = {$this->getId()}; ";
        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    function getProductosByPedido() {
        $sql = " SELECT pr.*, lp.unidades FROM productos pr "
                . "INNER JOIN linea_pedidos lp ON pr.id = lp.producto_id "
                . "WHERE lp.pedido_id = {$this->getId()}; ";
        $productoPedido = $this->db->query($sql);
        $r = $productoPedido;
//        var_dump($sql);
//        var_dump($this->db->error);
//        die();
        return $r;
//        var_dump($r); die();
    }

    function getAll() {
        $sql = " SELECT * FROM pedidos; ";
        $pedido = $this->db->query($sql);
        $r = $pedido;
        return $r;
//        var_dump($r); die();
    }

    public function edit() {
        $sql = "UPDATE pedidos SET estado = '{$this->getEstado()}' ";
        $sql .=" WHERE id = {$this->getId()};";
//        var_dump($sql);die();
        $editar = $this->db->query($sql);
        $result = FALSE;
        if ($editar) {
            $result = TRUE;
        }
//        var_dump($this->db->error);die();
        return $result;
//        var_dump($sql); die();
    }

    public function downStock() {
        $sql = " UPDATE productos SET stock = ";
    }

}
