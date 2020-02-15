<?php
class database{
    public static function connect(){
        $db = new mysqli('160.153.153.136', 'gustavo', '1234567', 'tienda');
        $db-> query("SET NAMES 'utf8'");
        return $db;
    }
}
