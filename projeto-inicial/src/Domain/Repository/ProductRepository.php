<?php

interface productRepository{
   public function allProducts(): array;
   public function insertProduct(Produto $produto): bool;
   public function removeProduc(Produto $produto): bool;
   public function saveProduct(Produto $produto): bool;


}