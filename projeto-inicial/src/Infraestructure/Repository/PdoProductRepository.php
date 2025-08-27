<?php

class PdoProductRepository implements productRepository {
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function allProduct(): array {

        $selectQuery = "SELECT * FROM produtos";

        $statement = $this->connection->query($selectQuery);

        return $this->hydrateProductsList($statement);
    }

    private function hydrateProductsList(PDOStatement $statement): array
    {
        $productDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $productList =[];

        foreach($productDataList as $productData) {
            $producList[] = new Produto(
                $productData['$id'],
                $productData['nome'],
                $productData['descricao'],
                $productData['imagem'],
                $productData['preco']
            );
        }

        return $producList;
    }


}