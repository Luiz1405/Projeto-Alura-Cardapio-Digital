<?php
namespace App\Infrastructure\Persistence;

use PDO;
use PDOException;

class ConnectionCreator {

    public static function createConnection(): ?PDO
    {
       try{
        $connection = new PDO('mysql:host=localhost;dbname=Serenatto', 'root', 'admin');
        return $connection;

       } catch (PDOException $e) {
        error_log("Erro de conexão: " . $e->getMessage());
        return null;
       }
    }
}