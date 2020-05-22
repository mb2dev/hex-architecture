<?php

namespace hex\Domain\Catalog\Gateway;

use hex\Domain\Catalog\Entity\Product;

interface ProductGateway
{

    /**
     * @param Product $product
     */
    public function create(Product $product): void;

    /**
     * @param $id
     */
    public function findProductById($id);

}