<?php


namespace App\Application\Query\Catalog;


use hex\Domain\Catalog\Gateway\ProductGateway;

class FindByIdHandler
{
    /**
     * @var ProductGateway
     */
    private ProductGateway $productGateway;

    public function __construct(ProductGateway $productGateway)
    {
        $this->productGateway = $productGateway;
    }


    /**
     * @param FindByIDQuery $query
     * @return GetByIdResponse
     */
    public function execute(FindByIDQuery $query) : ?GetByIdResponse
    {
        $result = $this->productGateway->findProductById($query->id);

        if(null === $result){
            return null;
        }

        return new GetByIdResponse($result);
    }

}