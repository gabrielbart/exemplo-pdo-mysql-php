<?php
namespace ExemploPDOMySQL;
class MySQLConnection extends \PDO{
    public function_construct() {
        parent::_construct('mysql:host=localhost;dbname=biblioteca', 'root', '')
    }
}