<?php

require_once __DIR__ . '/vendor/autoload.php'; 
use App\Domain\Model\Produto;
use App\Infrastructure\Repository\PdoProductRepository;
use App\Infrastructure\Persistence\ConnectionCreator;

use PDO;


$pdo = ConnectionCreator::createConnection();

$repository = new PdoProductRepository($pdo);

$repository->removeProductById($_POST['id']);

header("Location: admin.php");