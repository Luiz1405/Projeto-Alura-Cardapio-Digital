<?php 
require_once __DIR__ . '/vendor/autoload.php';
use App\Domain\Produto;
use App\Infrastructure\Repository\PdoProductRepository;
use App\Infrastructure\Persistence\ConnectionCreator;

use PDO;

$pdo = ConnectionCreator::createConnection();

$repository = new PdoProductRepository($pdo);
$todoProdutos = $repository->allProducts();
?>

<style>
    table{
        width: 90%;
        margin: auto 0;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
    }
</style>

<table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($todoProdutos as $produto): ?>
      <tr>
        <td><?= $produto->getNome() ?></td>
        <td><?= $produto->getTipo() ?></td>
        <td><?= $produto->getDescricao() ?></td>
        <td><?= $produto->getPrecoFormatado() ?></td>
        <td><a class="botao-editar" href="editar-produto.php?id=<?= $produto->getId() ?>">Editar</a></td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>