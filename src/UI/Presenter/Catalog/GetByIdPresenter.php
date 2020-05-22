<?php


namespace App\UI\Presenter\Catalog;


use App\Application\Query\Catalog\GetByIdResponse;
use App\UI\DTO\Catalog\ProductDTO;

class GetByIdPresenter
{
    /**
     * @param GetByIdResponse $response
     * @return ProductDTO
     */
    public function present(GetByIdResponse $response)
    {
        $productDTO = new ProductDTO();
        $productDTO->setId($response->getId());
        $productDTO->setName($response->getName());
        $productDTO->setDescription($response->getDescription());
        $productDTO->setPrice($response->getPrice());

        return $productDTO;
    }

}