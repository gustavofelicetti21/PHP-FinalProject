<?php

class ConexaoBD{
    
    public static function conectar() {
        return new PDO("mysql:host=localhost;dbname=geeksshopping", 'root', 'Batman');
    }
}
?>