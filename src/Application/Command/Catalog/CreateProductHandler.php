<?php

namespace App\Application\Command\Catalog;

use hex\Domain\Catalog\Entity\Product;
use hex\Domain\Catalog\Gateway\ProductGateway;

class CreateProductHandler
{
    /**
     * @var ProductGateway
     */
    private ProductGateway $productGateway;


    private $identifier;

    /**
     * CreateProductHandler constructor.
     * @param ProductGateway $productGateway
     */
    public function __construct(ProductGateway $productGateway)
    {
        $this->productGateway = $productGateway;

    }

    /**
     * @param CreateProductCommand $command
     * @return void
     */
    public function handle(CreateProductCommand $command): void
    {

        $product = new Product(
            uuid_create(UUID_TYPE_RANDOM),
            $command->name,
            $command->description,
            $command->price
        );

        $this->setIdentifier($product->getId());

        $this->productGateway->create($product);
    }

    /**
     * @return mixed
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param mixed $identifier
     */
    public function setIdentifier($identifier): void
    {
        $this->identifier = $identifier;
    }

}