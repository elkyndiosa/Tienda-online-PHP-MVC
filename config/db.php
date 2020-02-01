<?php
class database{
    public static function connect()
                $ db = new mysqli ( 'localhost' , 'gustavo' , 'vieja321' , 'tienda' ); 
        $db-> query("SET NAMES 'utf8');
        return $db;
    
}
