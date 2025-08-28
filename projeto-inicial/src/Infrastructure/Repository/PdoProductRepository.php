<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\ProductRepository;
use PDO;
use PDOStatement;
use App\Domain\Model\Produto;
use RuntimeException;

class PdoProductRepository implements ProductRepository {
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allProducts(): array {

        $selectQuery = "SELECT * FROM produtos ORDER BY preco";

        $statement = $this->connection->query($selectQuery);

        return $this->hydrateProductsList($statement);
    }

    public function productsByType(string $tipo): array {
        $selectQuery = "SELECT * FROM produtos WHERE tipo like :tipo ORDER BY preco";
        $statement = $this->connection->prepare($selectQuery);
        $statement->bindValue(':tipo', "%$tipo%",  PDO::PARAM_STR);
        $statement->execute();

        return $this->hydrateProductsList($statement);
    }

    private function hydrateProductsList(PDOStatement $statement): array
    {
        $productDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $productList =[];

        foreach($productDataList as $productData) {
            $productList[] = new Produto(
                $productData['id'],
                $productData['nome'],
                $productData['descricao'],
                $productData['imagem'],
                $productData['preco']
            );
        }

        return $productList;
    }

    public function saveProduct(Produto $produto): bool
    {
        if($produto->getId() === null) {
            return $this->insertProduct($produto);
        }

        return $this->updateProduct($produto);
    }

    public function insertProduct(Produto $produto): bool
    {
        $insertQuert = "INSERT INTO produtos(nome, descricao, imagem,preco) VALUES (:nome, :descricao, :imagem, :preco)";
        $statement = $this->connection->prepare($insertQuert);
        
        if($statement == false) {
            throw new RuntimeException("Erro na query do banco");
        }

        $sucess = $statement->execute([
            ':nome' => $produto->getNome(),
            ':descricao' => $produto->getDescricao(),
            ':imagem' => $produto->getImagem(),
            'preco' => $produto->getPreco(),
        ]);

        if($sucess) {
            $produto->defineId($this->connection->lastInsertId());
        }

        return $sucess;
    }

    public function updateProduct(Produto $produto): bool
    {
        $updateQuery = "UPDATE produtos 
                        SET NOME = :nome, 
                        descricao = :descricao, 
                        imagem = :imagem, 
                        preco = :preco 
                        WHERE id = :id";

        $statement = $this->connection->prepare($updateQuery);
        $statement->bindValue(':name', $produto->getNome());
        $statement->bindValue(':descricao', $produto->getDescricao());
        $statement->bindValue(':imagem', $produto->getImagem());
        $statement->bindValue(':preco', $produto->getPreco());
        $statement->bindValue(':id' , $produto->getId());

        return $statement->execute();
    }

    public function removeProduct(Produto $produto): bool
    {
        $deleteQuery = "DELETE from produtos where id = ?";
        $statement = $this->connection->prepare($deleteQuery);
        $statement->bindColumn(1, $produto->getId(), PDO::PARAM_INT);
        return $statement->execute();
    }


}